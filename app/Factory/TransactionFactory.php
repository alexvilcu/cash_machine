<?php

namespace App\Factory;

use Illuminate\Http\Request;
use App\Interfaces\TransactionInterface;

class TransactionFactory
{
    public static function make($className, Request $request): TransactionInterface
    {
        return new $className($request);
    }
}