<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\BankAccountRepositoryInterface;
use App\Models\BankAccount;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BankAccountRepository implements BankAccountRepositoryInterface
{
    public function __construct(
        private BankAccount $model
    ) {}

    /**
     * @return Builder
     */
    private function getModel(): Builder
    {
        return $this->model->newQuery();
    }

    /**
     * @param int $userId
     * @param array $payload
     * @return Model|Builder
     */
    public function create(int $userId, array $payload): Model|Builder
    {
        $data = array_merge($payload, ['user_id' => $userId]);
        return $this->getModel()->create($data);
    }

    /**
     * @param int $accountId
     * @return Model|Builder|null
     */
    public function get(int $accountId): Model|Builder|null
    {
        return $this->getModel()
            ->where('id', '=', $accountId)
            ->first();
    }
}
