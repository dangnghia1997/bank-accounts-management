<?php
declare(strict_types=1);

namespace App\Interfaces\Data;

interface TransactionLogInterface
{
    const string ID = "id";
    const string TRANSACTION_HASH = "transaction_hash";
    const string ACTION = "action";
    const string AMOUNT = "amount";
    const string FROM = "from";
    const string TO = "to";
}
