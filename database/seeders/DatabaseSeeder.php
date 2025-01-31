<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\Customer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Customer::factory(10)->create();

        BankAccount::factory(1)->create([
            'account_number' => '429629606'
        ]);

        BankAccount::factory(1)->create([
            'account_number' => '767236615'
        ]);

        BankAccount::factory(10)->create();


//        User::factory(10)->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $this->call([
            TransactionSeeder::class
        ]);
    }
}
