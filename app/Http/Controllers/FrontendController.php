<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class FrontendController extends Controller
{
    /**
     * returns the cash transaction form
     */

    public function cash()
    {
        return view('cashForm');
    }

    /**
     * returns the card transaction form
     */

    public function card()
    {
        return view('cardForm');
    }

    /**
     * returns the bank transaction form
     */

     public function bank()
     {
         return view('bankForm');
     }

    public function showTransaction(Transaction $transaction)
    {
        return view('transactionCreated', ['transaction' => [
            'amount' => $transaction->total_amount,
            'inputs' => json_decode($transaction->inputs)
        ]]);
    }
}
