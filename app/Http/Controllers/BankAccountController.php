<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountCreateRequest;
use App\Http\Resources\BalanceResource;
use App\Http\Resources\BankAccountResource;
use App\Http\Resources\TransactionDetailCollection;
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

    /**
     * @param Request $request
     * @param int $accountId
     * @return TransactionDetailCollection
     */
    public function history(Request $request, int $accountId): TransactionDetailCollection
    {
        return new TransactionDetailCollection(
            $this->bankAccountService->getAllTransactionsByAccount($accountId)
        );
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
