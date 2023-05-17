<?php

namespace App\CashMachine;

use Illuminate\Support\Facades\View;
use App\Models\Transaction;
use App\Interfaces\TransactionInterface;
use Illuminate\Http\RedirectResponse;

class CashMachine
{
    public function store(TransactionInterface $transaction): RedirectResponse
    {
        $transactionsCurrentTotal = Transaction::sum('total_amount');

        //check if the total amount doesn't exceed 20.000 when the current transaction amount is added
        if ($transactionsCurrentTotal + $transaction->amount() > 20000) {
            return redirect()->back()
                ->withErrors(['Transaction error' => 'Maximum of 20.000 reached.Please insert a lower value']);
        }

        //if it doesn't exceed, proceed with the transaction creation
        $newTransaction = Transaction::create([
            'total_amount' => $transaction->amount(),
            'inputs' => json_encode($transaction->inputs())
        ]);

        //if the transaction was created return to a new page with transaction data
        //else redirect back
        if ($newTransaction) {
            return redirect()->route('show-transaction', ['transaction' => $newTransaction]);
        }
           
        return redirect()->back()
                ->withErrors(['Transaction error' => 'Could not create transaction.']);
        
    }
}