<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function calculateUserBalance($userId)
    {
        $initialBalance = 5.00; // Each user starts with $5

        // Fetch all transactions for the user ordered by date
        $transactions = Transaction::where('trans_user_id', $userId)
            ->orderBy('trans_date', 'asc')
            ->get();

        // Start with the initial balance
        $currentBalance = $initialBalance;
        $transactionDetails = [];

        foreach ($transactions as $transaction) {
            if ($transaction->type === 'credit') {
                $currentBalance += $transaction->amount;
            } elseif ($transaction->type === 'debit') {
                $currentBalance -= $transaction->amount;
            }

            // Push transaction details with calculated balance after transaction
            $transactionDetails[] = [
                'date' => $transaction->trans_date,
                'amount' => $transaction->amount,
                'type' => $transaction->type,
                'balance_after' => $currentBalance,
            ];
        }

        // Return the transaction details with the calculated balance
        return response()->json($transactionDetails);
    }
}