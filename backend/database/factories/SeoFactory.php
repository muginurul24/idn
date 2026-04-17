<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seo>
 */
class SeoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'web_name' => config('app.name'),
            'main_url' => Str::replace('dash.', '', config('app.url')),
            'cdn_url' => 'https://classbet97x.space',
            'desktop_logo' => 'd-' . Str::slug(config('app.name')) . '.webp',
            'mobile_logo' => 'm-' . Str::slug(config('app.name')) . '.webp',
            'favicon' => Str::slug(config('app.name')) . '.ico',
            'card_image' => 'c-' . Str::slug(config('app.name')) . '.webp',
            'title' => 'Situs Slot Online dan Casino Online Terbesar juga Terpercaya di Indonesia',
            'keyword' => config('app.name') . ', Gambling Aware, Judi Bertanggung Jawab, Situs Judi Terbesar Indonesia, Bocoran Slot Gacor, Agen Slot Terpercaya, Slot Online Gacor, Live Casino Terbaik, Taruhan Bola Resmi, Judi Online, Responsible Gambling, Cara Berjudi Bijak, Batasan Deposit Judi, Fitur Self-Exclusion, Situs Slot Fair Play, RTP Slot Tertinggi, Game Casino Menguntungkan, Situs Judi Paling Aman',
            'description' => 'Situs Judi Online Terbesar & Terpercaya di Indonesia | Komitmen Kami terhadap Gambling Aware. Mainkan taruhan online dengan bijak! Tips berjudi bertanggung jawab, batasan deposit, dan layanan dukungan untuk mencegah kecanduan. Nikmati permainan fair & aman di platform terbaik!',
            'g_analytic' => '5SXMXH4M3D'
        ];
    }
}
