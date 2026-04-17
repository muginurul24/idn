<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bankName = fake()->randomElement([
            'BCA', 'BRI', 'Mandiri', 'CIMB', 'JAGO', 'SEABANK', 'Permata', 'BSI', 'NEOBANK',
            'Dana', 'OVO', 'Gopay', 'LinkAja', 'ShopeePay', 'Sakuku',
        ]);

        if (in_array($bankName, ['Dana', 'OVO', 'Gopay', 'LinkAja', 'ShopeePay', 'Sakuku'])) {
            $bankType = 'wallet';
        } else {
            $bankType = 'bank';
        }

        return [
            'user_id' => User::factory(),
            'bank_type' => $bankType,
            'bank_name' => $bankName,
            'account_name' => fake()->name(),
            'account_number' => fake()->unique()->creditCardNumber(),
        ];
    }
}
