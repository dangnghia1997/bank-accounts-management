<?php
declare(strict_types=1);

namespace App\Services;

use App\Http\Resources\BankAccountResource;
use App\Http\Resources\ErrorResponse;
use App\Interfaces\BankAccountRepositoryInterface;
use App\Interfaces\BankAccountServiceInterface;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;

class BankAccountService implements BankAccountServiceInterface
{
    public function __construct(
        private BankAccountRepositoryInterface $bankAccountRepository
    ) {}

    public function create(int $userId, Request $request): BankAccountResource|ErrorResponse
    {
        $body = $request->only([
            'account_number',
            'deposit'
        ]);

        try {
            $bankAccount = $this->bankAccountRepository->create($userId, [
                'account_number' => $body['account_number'],
                'balance' => $body['deposit']
            ]);
            return new BankAccountResource($bankAccount);
        } catch (UniqueConstraintViolationException $exception) {
            return new ErrorResponse(
                null,
                "account_number should be unique"
            );
        }
    }
}
