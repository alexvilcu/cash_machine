<?php

namespace App\Transactions;

use App\Interfaces\TransactionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as Validation;
use Carbon\Carbon;

class bankTransaction implements TransactionInterface
{
    private $request;
    private $amount = 0;
    private $inputs = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Validate the request inputs
     */

    public function validate()
    {
        //validation rules
        $rules = [
            'transfer_date' => 'required|date|after_or_equal:today',
            'customer_name' => 'required|string',
            'account_number' => 'required|alpha_num|size:6',
            'amount' => 'required|numeric|gt:0',
        ];
        
        //run validation
        $validator = Validator::make($this->request->all(), $rules);

        //if validation passes assign the amount and inputs to the transaction
        if (!$validator->fails()) {
            $this->amount = $validator->validated()['amount'];
            $this->inputs = $validator->validated();
        }

        return $validator;

    }

    /**
     * return the transaction amount
     */

    public function amount(): int
    {
        return $this->amount;
    }

    /**
     * return the transaction inputs
     */

    public function inputs(): array
    {
        return $this->inputs;
    }

    /**
     * Check to see if the expiration date can be formated to a date
     */

    private function tryFormatDate(string $inputExpirationDate): bool
    {
        try {
            $formatedDate = Carbon::createFromFormat('m/Y', $inputExpirationDate)->format('m/y');
        } catch (\Throwable $th) {
            return false;
        }

        return true;
    }

    /**
     * Check if expiration month is at least 2 months bigger than current month
     */

    private function isExpiringInTwoMonths(string $inputExpirationDate): bool
    {
        $inputDateMonthStart = $formatedDate = Carbon::createFromFormat('m/Y', $inputExpirationDate)->startOfMonth();
        $currentDateMonthStart =  Carbon::now()->startOfMonth();
        
        return !$inputDateMonthStart->greaterThan($currentDateMonthStart->addMonths(2));
    }

}