<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Interfaces\TransactionInterface;
use App\Factory\TransactionFactory;
use App\Transactions\CashTransaction;
use App\Transactions\CardTransaction;
use App\Transactions\BankTransaction;
use App\CashMachine\CashMachine;

class TransactionController extends Controller
{
    private $cashMachine;

    public function __construct(CashMachine $cashMachine)
    {
        $this->cashMachine = $cashMachine;
    }

    /**
     * initialize the cash transaction
     */
    
    public function storeCashTransaction(Request $request): RedirectResponse
    {
        return $this->storeTransaction(CashTransaction::class, $request);
    }

    /**
     * initialize card transaction
     */

    public function storeCardTransaction(Request $request): RedirectResponse
    {
        return $this->storeTransaction(CardTransaction::class, $request); 
    }

    /**
     * initialize bank transaction
     */

     public function storeBankTransaction(Request $request): RedirectResponse
     {
         return $this->storeTransaction(BankTransaction::class, $request); 
     }

    /**
     * Build transaction and validated it
     */

    private function storeTransaction(string $transactionClass, Request $request): RedirectResponse
    {
        $transaction = TransactionFactory::make($transactionClass, $request);
        $transactionValidation = $transaction->validate();
        
        if ($transactionValidation->fails()) {
            return redirect()->back()
                ->withErrors($transactionValidation)
                ->withInput();
        } else {
            return $this->cashMachine->store($transaction); 
        }
    }
}
