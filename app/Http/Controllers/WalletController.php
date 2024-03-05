<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Wallet;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Double;

use function Pest\Laravel\get;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = session()->get('id');

        if (Account::where('user_id', $id)->count() > 0)
            echo "U already have wallet";
        else
            Account::create(['user_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('show');
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $toAdd = $request['amount'];
        $id = session()->get('id');
        $current_balance = Account::where('user_id', $id)->first('balance');
        $current_balance = $current_balance['balance'];
        $toAdd = bcadd($toAdd, $current_balance);

        $record = Account::where(['user_id' => $id])->first();
        $record->update(['balance' => $toAdd]);

        session()->put('balance', Account::where('user_id', $id)->first());
        return view('dashboard');
    }

    public function credit(Request $request)
    {
        $toWithdraw = $request['amount'];
        $id = session()->get('id');
        $current_balance = Account::where('user_id', $id)->first('balance');
        $current_balance = $current_balance['balance'];
        if($current_balance>=$toWithdraw)
        $toWithdraw = bcsub($current_balance,$toWithdraw);
    else
    return view('dashboard',['error'=>"insufficient balance, Available Balance : $current_balance"]);

        $record = Account::where(['user_id' => $id])->first();
        $record->update(['balance' => $toWithdraw]);

        session()->put('balance', Account::where('user_id', $id)->first());
        return view('dashboard');
    }
}
