<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountCreateRequest;
use App\Http\Resources\BankAccountResource;
use App\Http\Resources\ErrorResponse;
use App\Interfaces\BankAccountServiceInterface;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function __construct(
        private BankAccountServiceInterface $bankAccountService
    ) {}

    /**
     * @param BankAccountCreateRequest $request
     * @param int $accountId
     * @return BankAccountResource|ErrorResponse
     */
    public function create(BankAccountCreateRequest $request, int $accountId): BankAccountResource|ErrorResponse
    {
        return $this->bankAccountService->create($accountId, $request);
    }

    public function history(Request $request, int $accountId)
    {
        return ["bank_account_id" => $accountId, "history" => 1];
    }

    public function balances(Request $request)
    {
        return ["amount" => 922];
    }
}
