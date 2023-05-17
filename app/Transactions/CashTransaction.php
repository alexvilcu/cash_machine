<?php

namespace App\Transactions;

use App\Interfaces\TransactionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as Validation;

class CashTransaction implements TransactionInterface
{
    const CASH_LIMIT = 10000;
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

    public function validate(): Validation
    {
        //validation rules
        $rules = [
            'one_banknote' => 'required|numeric|gt:0',
            'five_banknote' => 'required|numeric|gt:0',
            'ten_banknote' => 'required|numeric|gt:0',
            'fifty_banknote' => 'required|numeric|gt:0',
            'one_hundred_banknote' => 'required|numeric|gt:0',
        ];

        //run validation
        $validator = Validator::make($this->request->all(), $rules);

        //check to see if the total amount of cash doesn't exceed 10.000
        $validator->after(function ($validator){
            if ($this->cashLimitExceeded($validator->validated())) {
                $validator->errors()->add(
                    'cash_limit', 'Cash limit of 10.000 exceeded.'
                );
            }
        });

        //if validation passes, assign the amount and inputs to the transaction
        if (!$validator->fails()) {
            $this->amount = $this->calculateTotalAmount($validator->validated());
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
     * Check to see if the total
     * input amount exceeds 10.000
     */

    private function cashLimitExceeded(array $validatedInputs): bool
    {
        $total = $this->calculateTotalAmount($validatedInputs);

        if ($total > self::CASH_LIMIT) {
            return true;
        }

        return false;
    }

    private function calculateTotalAmount(array $validatedInputs): int
    {
        $total = 0;

        $one_banknote_qty = $validatedInputs['one_banknote'];
        $five_banknote_qty = $validatedInputs['five_banknote'];
        $ten_banknote_qty = $validatedInputs['ten_banknote'];
        $fity_banknote_qty = $validatedInputs['fifty_banknote'];
        $one_hundred_banknote_qty = $validatedInputs['one_hundred_banknote'];

        $total = ($one_hundred_banknote_qty * 1) + ($five_banknote_qty * 5) + ($ten_banknote_qty * 10) + ($fity_banknote_qty * 50) + ($one_hundred_banknote_qty * 100);

        return $total;
    }
}