<?php
declare(strict_types=1);

namespace App\Services;

use App\Exceptions\NotEnoughMoneyException;
use App\Interfaces\BankAccountRepositoryInterface;
use App\Interfaces\BankServiceInterface;
use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class BankService implements BankServiceInterface
{
    public function __construct(
        private BankAccountRepositoryInterface $bankAccountRepository,
        private TransactionRepositoryInterface $transactionRepository
    ) {}

    /**
     * @param string $from
     * @param string $to
     * @param $amount
     * @return bool
     */
    public function transfer(string $from, string $to, $amount): bool
    {
        Log::info("START transfer process");
        DB::beginTransaction();
        try {
            $bankAccounts = $this->bankAccountRepository->getBankAccountsIn([$from, $to]);
            foreach ($bankAccounts as $account) {
                $balance = $account->balance;
                if ($account->account_number === $from) {
                    if ($account->balance < $amount) {
                        throw new NotEnoughMoneyException();
                    }
                    $account->balance = $balance + (-$amount);
                } else {
                    $account->balance = $balance + $amount;
                }
                $account->save();
            }
            $this->transactionRepository->createTransaction($from, $to, $amount);
            DB::commit();
            Log::info("END transfer process");
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Processing Transaction from:$from - to:$to with amount=$amount was fail!");
            return false;
        }
    }
}
