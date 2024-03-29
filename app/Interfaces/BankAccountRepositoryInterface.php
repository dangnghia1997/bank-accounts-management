<?php
declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface BankAccountRepositoryInterface
{
    /**
     * @param int $customerId
     * @param array $payload
     * @return Model|Builder
     */
    public function create(int $customerId, array $payload): Model|Builder;

    /**
     * @param int $accountId
     * @return Model|Builder|null
     */
    public function get(int $accountId): Model|Builder|null;
}
