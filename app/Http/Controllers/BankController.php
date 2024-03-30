<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BankTransferRequest;
use App\Interfaces\BankServiceInterface;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function __construct(private BankServiceInterface $bankService)
    {}

    public function transfer(BankTransferRequest $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $amount = $request->get('amount');
        return ["from" => $from, "to" => $to, "amount" => $amount];
    }
}
