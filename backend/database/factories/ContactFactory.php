<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->companyEmail(),
            'whatsapp' => fake()->phoneNumber(),
            'telegram' => fake()->company(),
            'facebook' => fake()->randomNumber(9),
            'livechat' => '67f8afe925ed18190f67c571/1iohmuar9',
        ];
    }
}
