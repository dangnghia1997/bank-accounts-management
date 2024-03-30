<?php
declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface TransactionRepositoryInterface
{
    /**
     * @param string $accountNumber
     * @return Collection|array
     */
    public function getAllTransactionDetailByAccount(string $accountNumber): Collection|array;

    /**
     * @param string $from
     * @param string $to
     * @param float $amount
     * @return void
     */
    public function createTransaction(string $from, string $to, float $amount): void;
}
