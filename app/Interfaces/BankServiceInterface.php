<?php
declare(strict_types=1);

namespace App\Interfaces;

interface BankServiceInterface
{
    public function transfer(string $from, string $to, $amount);
}
