<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Game;
use App\Models\Provider;
use App\Services\Justqiu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LaunchGameController extends Controller
{
    public function pragmatic(Request $request)
    {
        $gameCode = $request->has('symbol') ? $request->get('symbol') : '';
        if ($request->has('mgckey')) {
            preg_match('/SESSION@([a-f0-9\-]+)([A-Za-z0-9=+\/]+)~/', $request->get('mgckey') . '~', $matches);
            $base64 = $matches[2];
            $decoded = base64_decode($base64, true);
        }

        $game = Game::where('code', $gameCode)->first();
        $provider = Provider::where('id', $game->provider_id)->first();
        $providerCode = $provider->code;
        $justqiu = new Justqiu();
        $user = User::find($decoded);
        $getUrl = $justqiu->launch($user->username, $providerCode, $gameCode, 'id', retryIfMissing: true);

        if ($justqiu->isSuccessful($getUrl) && filled($getUrl['launch_url'] ?? null)) {
            return view('Iframe.Game', [
                'url' => $getUrl['launch_url'],
                'g_name' => $game->name,
            ]);
        } else {
            return redirect()->back()->withErrors($justqiu->message($getUrl, 'Game\'s Under Maintenance'));
        }
    }

    public function pgsoft(Game $game, Request $request)
    {
        $userId = Str::of($request->or)->afterLast('%');
        $user = User::find(base64_decode($userId));
        $justqiu = new Justqiu();
        $getUrl = $justqiu->launch($user->username, $game->provider->code, $game->code, 'en', retryIfMissing: true);

        if ($justqiu->isSuccessful($getUrl) && filled($getUrl['launch_url'] ?? null)) {
            return view('Iframe.Game', [
                'url' => $getUrl['launch_url'],
                'g_name' => $game->name,
            ]);
        } else {
            return redirect()->back()->withErrors($justqiu->message($getUrl, 'Game\'s Under Maintenance'));
        }
    }
}
