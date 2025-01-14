<?php
declare(strict_types=1);

namespace App\Models;

use App\Interfaces\Data\BankAccountInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model implements BankAccountInterface
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'account_number',
        'balance'
    ];

    public $timestamps = false;
}
