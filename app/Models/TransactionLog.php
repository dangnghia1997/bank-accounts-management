<?php
declare(strict_types=1);

namespace App\Models;

use App\Interfaces\Data\TransactionLogInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model implements TransactionLogInterface
{
    use HasFactory;
}
