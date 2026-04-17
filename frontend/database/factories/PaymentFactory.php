<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bankName = fake()->unique()->randomElement([
            'BCA', 'BRI', 'Mandiri', 'CIMB', 'JAGO', 'SEABANK', 'Permata', 'BSI', 'NEOBANK',
            'Dana', 'OVO', 'Gopay', 'LinkAja', 'ShopeePay', 'Sakuku',
            'Telkomsel', 'XL', 'Indosat',
            'QRIS'
        ]);

        if (in_array($bankName, ['Telkomsel', 'XL', 'Indosat'])) {
            $bankType = 'pulsa';
        } elseif (in_array($bankName, ['Dana', 'OVO', 'Gopay', 'LinkAja', 'ShopeePay', 'Sakuku'])) {
            $bankType = 'wallet';
        } elseif (in_array($bankName, ['BCA', 'BRI', 'Mandiri', 'CIMB', 'JAGO', 'SEABANK', 'Permata', 'BSI', 'NEOBANK',])) {
            $bankType = 'bank';
        } else {
            $bankType = 'qris';
        }

        return [
            'bank_type' => $bankType,
            'bank_name' => $bankName,
            'account_name' => fake()->name(),
            'account_number' => fake()->unique()->creditCardNumber(),
        ];
    }
}
