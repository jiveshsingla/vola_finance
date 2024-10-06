<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BalanceController extends Controller
{
    public function calculateUserClosingBalance($userId)
    {
        // Initial balance assumption
        $initialBalance = 5.00; // Starting balance for each user

        // Get today's date
        $today = Carbon::now();
        $ninetyDaysAgo = $today->copy()->subDays(90);
        $thirtyDaysAgo = $today->copy()->subDays(30);
        $sixtyDaysAgo = $today->copy()->subDays(60);

        // Get transactions for the last 90 days, ordered by date
        $transactions = Transaction::where('trans_user_id', $userId)
            ->whereBetween('trans_date', [$ninetyDaysAgo, $today])
            ->orderBy('trans_date', 'asc')
            ->get();

        $dailyBalances = [];
        $currentBalance = $initialBalance;
        $totalBalanceSum = 0;

        $first30DaysSum = 0;
        $last30DaysSum = 0;

        // Process transactions to get daily closing balances
        foreach ($transactions as $transaction) {
            $date = $transaction->trans_date;
            if ($transaction->type === 'credit') {
                $currentBalance += $transaction->amount;
            } elseif ($transaction->type === 'debit') {
                $currentBalance -= $transaction->amount;
            }

            // Store daily balance
            $dailyBalances[$date] = $currentBalance;

            // Track sum for first and last 30 days
            if ($date >= $ninetyDaysAgo && $date <= $ninetyDaysAgo->copy()->addDays(30)) {
                $first30DaysSum += $currentBalance;
            } elseif ($date >= $sixtyDaysAgo && $date <= $today) {
                $last30DaysSum += $currentBalance;
            }

            // Track total balance for average calculation
            $totalBalanceSum += $currentBalance;
        }

        // Calculate average balances
        $average90DaysBalance = $totalBalanceSum / 90;
        $averageFirst30DaysBalance = $first30DaysSum / 30;
        $averageLast30DaysBalance = $last30DaysSum / 30;

        // Transactions for the last 30 days for income and debit stats
        $last30DaysTransactions = Transaction::where('trans_user_id', $userId)
            ->whereBetween('trans_date', [$thirtyDaysAgo, $today])
            ->get();

        $last30DaysIncome = 0;
        $debitTransactionCount = 0;
        $weekendDebitSum = 0;
        $highIncomeSum = 0;

        foreach ($last30DaysTransactions as $transaction) {
            if ($transaction->type === 'credit' && $transaction->category_id !== '18020004') {
                $last30DaysIncome += $transaction->amount;
            }

            if ($transaction->type === 'debit') {
                $debitTransactionCount++;

                // Check if transaction happened on Friday, Saturday, or Sunday
                $dayOfWeek = Carbon::parse($transaction->trans_date)->dayOfWeek;
                if (in_array($dayOfWeek, [Carbon::FRIDAY, Carbon::SATURDAY, Carbon::SUNDAY])) {
                    $weekendDebitSum += $transaction->amount;
                }
            }

            if ($transaction->type === 'credit' && $transaction->amount > 15) {
                $highIncomeSum += $transaction->amount;
            }
        }

        // Prepare response
        return response()->json([
            'daily_closing_balances' => $dailyBalances,
            'average_90_days_balance' => $average90DaysBalance,
            'average_first_30_days_balance' => $averageFirst30DaysBalance,
            'average_last_30_days_balance' => $averageLast30DaysBalance,
            'last_30_days_income' => $last30DaysIncome,
            'debit_transaction_count_30_days' => $debitTransactionCount,
            'weekend_debit_sum' => $weekendDebitSum,
            'high_income_sum' => $highIncomeSum,
        ]);
    }
}
