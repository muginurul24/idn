<?php

namespace Database\Seeders;

use App\Models\Provider;
use App\Services\Justqiu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $justqiu = new Justqiu();
        $getProviders = $justqiu->providers();

        if (! $justqiu->isSuccessful($getProviders)) {
            $this->command?->error($justqiu->message($getProviders, 'Failed to fetch provider list from JustQiu.'));

            return;
        }

        foreach ($getProviders['providers'] ?? [] as $provider) {
            $code = (string) ($provider['code'] ?? '');
            if ($code === '') {
                continue;
            }

            $metadata = $this->providerMetadata($code);

            Provider::updateOrCreate(
                ['code' => $code],
                [
                    'name' => $provider['name'] ?? $code,
                    'slug' => Str::slug($provider['name'] ?? $code),
                    'type' => $metadata['type'],
                    'logo' => $metadata['logo'],
                    'short_name' => $metadata['short_name'],
                    'is_maintenance' => ($provider['status'] ?? 0) == 1 ? 0 : 1,
                ]
            );
        }
    }

    /**
     * @return array{type: string, logo: string, short_name: string}
     */
    private function providerMetadata(string $code): array
    {
        return match ($code) {
            'PRAGMATIC' => ['type' => 'slot', 'logo' => 'pragmatic', 'short_name' => 'PP'],
            'PRAGMATICLIVE' => ['type' => 'casino', 'logo' => 'pragmatic', 'short_name' => 'PP'],
            'HABANERO' => ['type' => 'slot', 'logo' => 'hbn', 'short_name' => 'HB'],
            'BOOONGO' => ['type' => 'slot', 'logo' => 'btg', 'short_name' => 'BTG'],
            'PLAYSON' => ['type' => 'slot', 'logo' => 'playstar', 'short_name' => 'PS'],
            'CQ9' => ['type' => 'slot', 'logo' => 'cq9', 'short_name' => 'CQ9'],
            'EVOPLAY' => ['type' => 'slot', 'logo' => 'reevo', 'short_name' => 'RVO'],
            'TOPTREND' => ['type' => 'slot', 'logo' => 'ttg', 'short_name' => 'TTG'],
            'DREAMTECH' => ['type' => 'slot', 'logo' => 'simpleplay', 'short_name' => 'SP'],
            'PGSOFT' => ['type' => 'slot', 'logo' => 'pg', 'short_name' => 'PG'],
            'REELKINGDOM' => ['type' => 'slot', 'logo' => 'gameplay', 'short_name' => 'GMP'],
            default => [
                'type' => str_contains($code, 'LIVE') ? 'casino' : 'slot',
                'logo' => Str::lower($code),
                'short_name' => Str::upper(Str::substr($code, 0, 3)),
            ],
        };
    }
}
