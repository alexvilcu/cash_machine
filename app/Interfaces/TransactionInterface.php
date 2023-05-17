<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

interface TransactionInterface
{
    /**
     * Validates the request data
     */

    public function validate();

    /**
     * Returns transaction amount
     */

    public function amount(): int;

    /**
     * Returns inputs of the transaction
     */

    public function inputs(): array;
}