<?php
declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BankAccountServiceInterface
{
    /**
     * @param int $customerId
     * @param array $body
     * @return Model|Builder
     */
    public function createBankAccountForCustomer(int $customerId, array $body): Model|Builder;

    /**
     * @param int $accountId
     * @return float
     */
    public function getBalance(int $accountId): float;

    /**
     * @param int $accountId
     * @return Model|Builder|null
     */
    public function getBankAccount(int $accountId): Model|Builder|null;

    /**
     * @param int $accountId
     * @return Collection|array
     */
    public function getAllTransactionsByAccount(int $accountId): Collection|array;
}
