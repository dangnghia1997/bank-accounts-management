<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountCreateRequest;
use App\Http\Resources\BankAccountResource;
use App\Http\Resources\ErrorResponse;
use App\Http\Resources\SuccessResponse;
use App\Interfaces\BankAccountServiceInterface;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function __construct(
        private BankAccountServiceInterface $bankAccountService
    ) {}

    /**
     * @param BankAccountCreateRequest $request
     * @param int $customerId
     * @return BankAccountResource|ErrorResponse
     */
    public function create(BankAccountCreateRequest $request, int $customerId): BankAccountResource|ErrorResponse
    {
        return $this->bankAccountService->create($customerId, $request);
    }

    public function history(Request $request, int $accountId)
    {
        return ["bank_account_id" => $accountId, "history" => 1];
    }

    /**
     * @param Request $request
     * @param int $accountId
     * @return SuccessResponse
     */
    public function balance(Request $request, int $accountId): SuccessResponse
    {
        return new SuccessResponse(null, [
            'balance' => $this->bankAccountService->getBalance($accountId)
        ]);
    }
}
