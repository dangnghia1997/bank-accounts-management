<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function __construct(
        private Transaction $transactionModel,
        private TransactionDetail $transactionDetailModel
    ) {}

    /**
     * @return Builder
     */
    private function getTransactionDetailModel(): Builder
    {
        return $this->transactionDetailModel->newQuery();
    }

    /**
     * @return Builder
     */
    private function getTransactionModel(): Builder
    {
        return $this->transactionModel->newQuery();
    }

    /**
     * @param string $accountNumber
     * @return Collection|array
     */
    public function getAllTransactionDetailByAccount(string $accountNumber): Collection|array
    {
        return $this->getTransactionDetailModel()
            ->where('account_number', '=', $accountNumber)
            ->get();
    }
}
