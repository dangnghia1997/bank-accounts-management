<?php
declare(strict_types=1);

namespace App\Services;

use App\Interfaces\BankAccountRepositoryInterface;
use App\Interfaces\BankAccountServiceInterface;
use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BankAccountService implements BankAccountServiceInterface
{
    public function __construct(
        private BankAccountRepositoryInterface $bankAccountRepository,
        private TransactionRepositoryInterface $transactionRepository
    ) {}

    /**
     * @param int $customerId
     * @param array $body
     * @return Model|Builder
     */
    public function createBankAccountForCustomer(int $customerId, array $body): Model|Builder
    {
        return $this->bankAccountRepository->create($customerId, [
            'account_number' => $body['account_number'],
            'balance' => $body['deposit']
        ]);
    }

    /**
     * @param int $accountId
     * @return float
     */
    public function getBalance(int $accountId): float
    {
        $bankAccount = $this->bankAccountRepository->get($accountId);
        return $bankAccount?->balance ? (float)$bankAccount?->balance : 0.0;
    }

    /**
     * @param int $accountId
     * @return Model|Builder|null
     */
    public function getBankAccount(int $accountId): Model|Builder|null
    {
        return $this->bankAccountRepository->get($accountId);
    }

    /**
     * @param int $accountId
     * @return Collection|array
     */
    public function getAllTransactionsByAccount(int $accountId): Collection|array
    {
        $bankAccount = $this->getBankAccount($accountId);
        return $this->transactionRepository->getAllTransactionDetailByAccount($bankAccount->account_number);
    }
}
