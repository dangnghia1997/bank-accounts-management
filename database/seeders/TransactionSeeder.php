<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;


class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transIdx = DB::table('transactions')->insertGetId([
            'from' => '429629606',
            'to' => '767236615'
        ]);

        //
        DB::table('transaction_details')->insert([
            'uuid' => (string) Uuid::uuid4(),
            'parent_id' => $transIdx,
            'account_number' => '429629606',
            'amount' => -2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('transaction_details')->insert([
            'uuid' => (string) Uuid::uuid4(),
            'parent_id' => $transIdx,
            'account_number' => '767236615',
            'amount' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $transIdx = DB::table('transactions')->insertGetId([
            'from' => '767236615',
            'to' => '429629606',
        ]);

        DB::table('transaction_details')->insert([
            'uuid' => (string) Uuid::uuid4(),
            'parent_id' => $transIdx,
            'account_number' => '429629606',
            'amount' => 22,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('transaction_details')->insert([
            'uuid' => (string) Uuid::uuid4(),
            'parent_id' => $transIdx,
            'account_number' => '767236615',
            'amount' => -22,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
