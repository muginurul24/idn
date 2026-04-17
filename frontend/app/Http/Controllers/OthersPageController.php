<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Carousel;
use App\Models\Provider;
use App\Models\Transaction;
use App\Services\Justqiu;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Auth;

class OthersPageController extends Controller
{
    public $agent;

    public function __construct()
    {
        $this->agent = app('agent')->deviceType() == 'phone' ? 'Mobile.' : 'Desktop.';
    }

    public function contact()
    {
        $contact = Contact::first();

        return view($this->agent . 'Others.ContactUs', [
            'contact' => $contact
        ]);
    }

    public function rtp()
    {
        $providers = Provider::where('type', 'slot')->get();
        $games = Game::whereNotIn('provider_id', [25,26])->get();
        $contact = Contact::first();
        $carousels = Carousel::where('sequence', 1)->get();

        return view('welcome', [
            'providers' => $providers,
            'games' => $games,
            'contact' => $contact,
            'carousels' => $carousels
        ]);
    }

    public function createTicket(Request $request)
    {
        $allowed = true;
        $checkTicket = false;

        if (Auth::check()) {
            $checkTicket = Ticket::where('category', '=', 'pengaduan')->where('user_id', '=', Auth::user()->id)->where('is_active', '=', 1)->first();
        } else {
            $checkTicket = Ticket::where('ip_address', '=', $request->ip())->where('is_active', '=', 1)->first();
        }

        if ($checkTicket) {
            $allowed = false;
        }

        return view('Desktop.Others.CreateTicket', [
            'allowed' => $allowed
        ]);
    }

    public function postTicket(Request $request)
    {
        $credentials = $request->validate([
            'category' => 'required|regex:/^[A-Za-z0-9\+ ]+$/',
            'website' => 'required|url',
            'userid' => 'required|exists:users,username',
            'email' => 'required|string|max:100',
            'comment' => 'required|string|max:1000'
        ]);

        $category = Purifier::clean(trim($credentials['category']));
        $userData = User::where('username', '=', $credentials['userid'])->first();
        $userId = $userData->id;
        $email = Purifier::clean($credentials['email']);
        $description = Purifier::clean($credentials['comment']);

        Ticket::create([
            'user_id' => $userId,
            'category' => 'pengaduan',
            'title' => $category,
            'description' => 'Kontak: ' . $email . ' ' . $description,
            'ip_address' => $request->ip()
        ]);

        return redirect()->back();
    }

    public function mybonus()
    {
        $point = Auth::user()->point;

        if ($point->level == 'copper') {
            $valueMax = 1000000;
        } elseif ($point->level == 'bronze') {
            $valueMax = 2000000;
        } elseif ($point->level == 'silver') {
            $valueMax = 4000000;
        } elseif ($point->level == 'gold') {
            $valueMax = 8000000;
        } elseif ($point->level == 'diamond') {
            $valueMax = 16000000;
        } elseif ($point->level == 'platinum') {
            $valueMax = 32000000;
        } elseif ($point->level == 'vip') {
            $valueMax = 64000000;
        }

        return view($this->agent . 'Auth.MyBonus', [
            'point' => $point,
            'valueMax' => $valueMax
        ]);
    }

    public function viewQr()
    {
        $qris = Payment::where('bank_type', '=', 'qris')->first();
        $pending = Transaction::where('user_id', '=', Auth::user()->id)
            ->where('status', '=', 'pending')->where('type', '=', 'deposit')
            ->where('payment_id', '=', $qris->id)
            ->latest()
            ->first();

        abort_unless($qris !== null && $pending !== null, 404);

        $note = $this->parseQrisNote($pending->note);
        $qrisData = $this->hasActiveQrisPayload($note)
            ? $note['qris_data']
            : null;

        if (! filled($qrisData)) {
            $justqiu = new Justqiu();
            $generate = $justqiu->generate(
                Auth::user()->username,
                (int) $pending->amount,
                300,
                $this->buildQrisCustomRef($pending),
            );

            if ($justqiu->isSuccessful($generate) && filled($generate['data'] ?? null) && filled($generate['trx_id'] ?? null)) {
                $note = array_filter([
                    'customer_note' => $note['customer_note'] ?? null,
                    'purpose' => 'qris_deposit',
                    'trx_id' => $generate['trx_id'],
                    'qris_data' => $generate['data'],
                    'expired_at' => $generate['expired_at'] ?? null,
                ], fn(mixed $value): bool => $value !== null && $value !== '');

                $pending->note = json_encode($note, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                $pending->save();

                $qrisData = $generate['data'];
            }
        }

        $imgQr = filled($qrisData)
            ? 'https://api.qrserver.com/v1/create-qr-code/?data='.urlencode($qrisData).'&size=512x512'
            : "/storage/$qris->account_name";

        return view('Desktop.Others.QrisFrame', [
            'qris' => $imgQr,
            'pending' => $pending,
            'expiresAt' => $this->resolveQrisExpiry($note, $pending),
        ]);
    }

    private function parseQrisNote(?string $note): array
    {
        if (! filled($note)) {
            return [];
        }

        $decoded = json_decode($note, true);
        if (is_array($decoded)) {
            return $decoded;
        }

        return [
            'customer_note' => $note,
        ];
    }

    private function hasActiveQrisPayload(array $note): bool
    {
        if (! filled($note['qris_data'] ?? null)) {
            return false;
        }

        if (! isset($note['expired_at']) || ! is_numeric($note['expired_at'])) {
            return true;
        }

        return Carbon::now()->lt(Carbon::createFromTimestamp((int) $note['expired_at']));
    }

    private function resolveQrisExpiry(array $note, Transaction $transaction): string
    {
        if (isset($note['expired_at']) && is_numeric($note['expired_at'])) {
            return Carbon::createFromTimestamp((int) $note['expired_at'])->format('Y-m-d H:i:s');
        }

        return $transaction->created_at->copy()->addMinutes(5)->format('Y-m-d H:i:s');
    }

    private function buildQrisCustomRef(Transaction $transaction): string
    {
        return substr(hash('sha256', implode('|', [
            $transaction->id,
            $transaction->user_id,
            $transaction->created_at?->timestamp,
        ])), 0, 36);
    }
}
