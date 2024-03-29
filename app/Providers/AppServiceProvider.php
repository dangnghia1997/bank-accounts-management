<?php

namespace App\Providers;

use App\Interfaces\BankAccountRepositoryInterface;
use App\Interfaces\BankAccountServiceInterface;
use App\Repositories\BankAccountRepository;
use App\Services\BankAccountService;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
