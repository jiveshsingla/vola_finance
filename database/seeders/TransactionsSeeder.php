<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionsSeeder extends Seeder
{
    public function run()
    {
        // Load transaction data from 'transaction.php' file
        $transactions = include(base_path('transaction.php'));
        foreach ($transactions as $transaction) {
            DB::table('transactions')->insert([
                'trans_user_id' => $transaction['trans_user_id'],
                'trans_date' => $transaction['trans_plaid_date'],
                'amount' => $transaction['trans_plaid_amount'],
                'type' => $transaction['type'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
