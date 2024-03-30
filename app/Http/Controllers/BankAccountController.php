<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountCreateRequest;
use App\Http\Resources\BalanceResource;
use App\Http\Resources\BankAccountResource;
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
     * @return BankAccountResource
     */
    public function create(BankAccountCreateRequest $request, int $customerId): BankAccountResource
    {
        $body = $request->only([
            'account_number',
            'deposit'
        ]);

        return new BankAccountResource(
            $this->bankAccountService->createBankAccountForCustomer($customerId, $body)
        );
    }

    public function history(Request $request, int $accountId)
    {
        return ["bank_account_id" => $accountId, "history" => 1];
    }

    /**
     * @param Request $request
     * @param int $accountId
     * @return BalanceResource
     */
    public function balance(Request $request, int $accountId): BalanceResource
    {
        return new BalanceResource(
            $this->bankAccountService->getBankAccount($accountId)
        );
    }
}
