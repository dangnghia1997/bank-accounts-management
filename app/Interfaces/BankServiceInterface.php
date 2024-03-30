<?php
declare(strict_types=1);

namespace App\Interfaces;

interface BankServiceInterface
{
    /**
     * @param string $from
     * @param string $to
     * @param $amount
     * @return bool
     */
    public function transfer(string $from, string $to, $amount): bool;
}
