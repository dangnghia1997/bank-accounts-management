<?php
declare(strict_types=1);

namespace App\Providers;

use App\Interfaces\BankAccountRepositoryInterface;
use App\Interfaces\BankAccountServiceInterface;
use App\Interfaces\BankServiceInterface;
use App\Interfaces\TransactionRepositoryInterface;
use App\Repositories\BankAccountRepository;
use App\Repositories\TransactionRepository;
use App\Services\BankAccountService;
use App\Services\BankService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BankAccountRepositoryInterface::class, BankAccountRepository::class);
        $this->app->bind(BankAccountServiceInterface::class, BankAccountService::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(BankServiceInterface::class, BankService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
