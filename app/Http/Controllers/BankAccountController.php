<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountCreateRequest;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function create(BankAccountCreateRequest $request, int $userId): array
    {
        return ["user_id"=>  $userId, "deposit" => $request->get('deposit')];
    }

    public function history(Request $request, int $userId)
    {
        return ["user_id" => $userId, "history" => 1];
    }

    public function balances(Request $request)
    {
        return ["amount" => 922];
    }
}
