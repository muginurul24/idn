<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Provider;
use App\Services\Justqiu;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $justqiu = new Justqiu();
        $providers = Provider::all();

        foreach ($providers as $provider) {
            $getGames = $justqiu->games($provider->code);
            if (! $justqiu->isSuccessful($getGames)) {
                $this->command?->warn("Skip games for {$provider->code}: ".$justqiu->message($getGames, 'request failed'));

                continue;
            }

            foreach ($getGames['games'] ?? [] as $game) {
                $gameCode = (string) ($game['game_code'] ?? '');
                if ($gameCode === '') {
                    continue;
                }

                Game::updateOrCreate(
                    [
                        'provider_id' => $provider->id,
                        'code' => $gameCode,
                    ],
                    [
                        'name' => $game['game_name'] ?? $gameCode,
                        'banner' => $game['banner'] ?? '',
                        'is_maintenance' => ($game['status'] ?? 0) == 1 ? 0 : 1,
                    ]
                );
            }
        }
    }
}
