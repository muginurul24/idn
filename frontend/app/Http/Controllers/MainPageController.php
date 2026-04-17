<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Provider;

class MainPageController extends Controller
{
    public $agent;

    public function __construct()
    {
        $this->agent = app('agent')->deviceType() == 'phone' ? 'Mobile.' : 'Desktop.';
    }

    public function index(Request $request)
    {
        if ($request->has('ref')) {
            $checkReferral = User::where('username', '=', Str::lower($request->get('ref')))->first();
            if ($checkReferral) {
                session(['referral' => $request->get('ref')]);
            }
        }

        return view($this->agent . 'Index');
    }

    public function sportsbook()
    {
        return view($this->agent . 'Sportsbook');
    }

    public function casino()
    {
        $firstLoop = Game::where('provider_id', '=', 25)->latest()->take(4)->get();
        $secondLoop = Game::where('provider_id', '=', 25)->take(4)->get();
        $thirdLoop = Game::where('provider_id', '=', 26)->latest()->take(4)->get();
        $fourthLoop = Game::where('provider_id', '=', 26)->take(4)->get();

        return view($this->agent . 'LiveCasino', [
            'loop_1' => $firstLoop,
            'loop_2' => $secondLoop,
            'loop_3' => $thirdLoop,
            'loop_4' => $fourthLoop,
        ]);
    }

    public function idnpoker()
    {
        return view($this->agent . 'IdnPoker');
    }

    public function slots()
    {
        $gamesPragmatic = Game::where('provider_id', 1)->inRandomOrder()->take(20)->get();
        $gamesPgsoft = Game::where('provider_id', 10)->inRandomOrder()->take(20)->get();

        $games = $gamesPragmatic->merge($gamesPgsoft)->shuffle();

        return view($this->agent . 'Slots', [
            'games' => $games,
        ]);
    }

    public function slotBySlug(Provider $provider)
    {
        return view($this->agent . 'Slots', [
            'games' => Game::where('provider_id', $provider->id)->latest()->get(),
        ]);
    }

    public function newSlots()
    {
        $gamesPragmatic = Game::where('provider_id', 1)->latest()->take(50)->get();
        $gamesPgsoft = Game::where('provider_id', 10)->latest()->take(50)->get();

        $games = $gamesPragmatic->merge($gamesPgsoft)->shuffle();

        return view($this->agent . 'Slots', [
            'games' => $games,
        ]);
    }

    public function exclusiveSlots()
    {
        $gamesPragmatic = Game::where('provider_id', 1)->inRandomOrder()->take(50)->get();
        $gamesPgsoft = Game::where('provider_id', 10)->inRandomOrder()->take(50)->get();

        $games = $gamesPragmatic->merge($gamesPgsoft)->shuffle();

        return view($this->agent . 'Slots', [
            'games' => $games,
        ]);
    }

    public function idnlive()
    {
        $casinos = Game::where('provider_id', 26)->latest()->get();

        return view($this->agent . 'IdnLive', [
            'casinos' => $casinos
        ]);
    }

    public function arcade()
    {
        $gamesPragmatic = Game::where('provider_id', 1)->inRandomOrder()->take(50)->get();
        $gamesPgsoft = Game::where('provider_id', 10)->inRandomOrder()->take(50)->get();

        $games = $gamesPragmatic->merge($gamesPgsoft)->shuffle();

        return view($this->agent . 'Arcade', [
            'games' => $games
        ]);
    }

    public function arcadeBySlug(Provider $provider)
    {
        return view($this->agent . 'Arcade', [
            'games' => Game::where('provider_id', $provider->id)->latest()->get(),
        ]);
    }

    public function table()
    {
        return view($this->agent . 'Table');
    }

    public function idnraffle()
    {
        return view($this->agent . 'IdnRaffle');
    }

    public function lottery()
    {
        return view($this->agent . 'Lottery');
    }

    public function promotion()
    {
        $newMemberEvents = Event::where('label' , '=', 'new')->latest()->get();
        $limitedEvents = Event::where('label' , '=', 'limited')->latest()->get();

        return view($this->agent . 'Promosi', [
            'newMemberEvents' => $newMemberEvents,
            'limitedEvents' => $limitedEvents
        ]);
    }

    public function referrals()
    {
        return view($this->agent . 'Referral');
    }
}
