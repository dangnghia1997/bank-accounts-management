<?php
declare(strict_types=1);

namespace App\Interfaces;

use App\Http\Resources\BankAccountResource;
use App\Http\Resources\ErrorResponse;
use Illuminate\Http\Request;

interface BankAccountServiceInterface
{
    /**
     * @param int $userId
     * @param Request $request
     * @return BankAccountResource|ErrorResponse
     */
    public function create(int $userId, Request $request): BankAccountResource|ErrorResponse;
}
