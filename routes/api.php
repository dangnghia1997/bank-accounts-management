<?php
declare(strict_types=1);

use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Route;


Route::prefix("users")->group(function () {
    // Create bank accounts for user
    Route::post('/{userId}/accounts', [BankAccountController::class, 'create']);
});

Route::prefix("bank_accounts")->group(function () {
    Route::get('/{accountId}/transaction_history', [BankAccountController::class, 'history']);
    Route::get('/{accountId}/balances', [BankAccountController::class, 'balances']);
});

Route::prefix("banks")->group(function () {
    // transfer money
    Route::post('/transfer', [BankController::class, 'transfer']);
});
