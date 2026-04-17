<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'web_name' => 'Bola788',
            'main_url' => 'https://bola788.online',
            'cdn_url' => 'https://classbet97x.space',
            'desktop_logo' => 'd-bola788.webp',
            'mobile_logo' => 'm-bola788.webp',
            'favicon' => 'bola788.ico',
            'card_image' => 'c-bola788.webp',
            'title' => 'Test Title Here',
            'keyword' => 'Test Keyword Here',
            'description' => 'Test Description Here'
        ];
    }
}
