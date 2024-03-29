<?php
declare(strict_types=1);

namespace App\Interfaces;

use App\Http\Resources\BankAccountResource;
use App\Http\Resources\ErrorResponse;
use Illuminate\Http\Request;

interface BankAccountServiceInterface
{
    /**
     * @param int $customerId
     * @param Request $request
     * @return BankAccountResource|ErrorResponse
     */
    public function create(int $customerId, Request $request): BankAccountResource|ErrorResponse;

    /**
     * @param int $accountId
     * @return float
     */
    public function getBalance(int $accountId): float;
}
