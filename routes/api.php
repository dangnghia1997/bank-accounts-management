<?php
declare(strict_types=1);

use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Route;


Route::prefix("users")->group(function () {
    // Create bank accounts for user
    Route::post('/{userId}/accounts', [BankAccountController::class, 'create']);
    Route::get('/{userId}/transaction_history', [BankAccountController::class, 'history']);
    Route::get('/{userId}/balances', [BankAccountController::class, 'balances']);

});


// transfer money
Route::post('/banks/transfer', [BankController::class, 'transfer']);
