<?php
declare(strict_types=1);

namespace App\Services;

use App\Exceptions\NotEnoughMoneyException;
use App\Interfaces\BankAccountRepositoryInterface;
use App\Interfaces\BankServiceInterface;
use App\Interfaces\TransactionRepositoryInterface;

class BankService implements BankServiceInterface
{
    public function __construct(
        private BankAccountRepositoryInterface $bankAccountRepository,
        private TransactionRepositoryInterface $transactionRepository
    ) {}

    public function transfer(string $from, string $to, $amount)
    {
        // TODO: Start DB transaction

        try {
            $bankAccounts = $this->bankAccountRepository->getBankAccountsIn([$from, $to]);
            foreach ($bankAccounts as $account) {
                $balance = $account->balance;
                if ($account->account_number === $from) {
                    if ($account->balance < $account) {
                        throw new NotEnoughMoneyException();
                    }
                    $account->balance = $balance + (-$amount);
                } else {
                    $account->balance = $balance + $amount;
                }
                $account->save();
            }

            // TODO: Commit DB transaction
        } catch (\Exception $e) {

            // Rollback DB transaction
        }
    }
}
