<?php

namespace App\Models;

use App\Interfaces\Data\TransactionLogInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model implements TransactionLogInterface
{
    use HasFactory;
}
