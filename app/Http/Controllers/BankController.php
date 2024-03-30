<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BankTransferRequest;
use App\Http\Resources\SuccessResponse;
use App\Interfaces\BankServiceInterface;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function __construct(private BankServiceInterface $bankService)
    {}

    /**
     * @param BankTransferRequest $request
     * @return SuccessResponse
     */
    public function transfer(BankTransferRequest $request): SuccessResponse
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $amount = $request->get('amount');
        return new SuccessResponse(null, [
            'success' => $this->bankService->transfer($from, $to, $amount)
        ]);
    }
}
