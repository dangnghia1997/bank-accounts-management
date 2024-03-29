<?php
declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankAccount>
 */
class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $accountNumber = fake()->unique()->randomNumber(9);
        $balanceDigit = $accountNumber % 2 === 0 ? 2 : 3;
        return [
            'customer_id' => fake()->numberBetween(1,10),
            'account_number' => fake()->unique()->randomNumber(9),
            'balance' => fake()->randomNumber($balanceDigit)
        ];
    }
}
