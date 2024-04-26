<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Http\Requests\TransferRequest;
use App\Models\Wallet;

class WalletController extends Controller
{
    //defining a function that will retrive balance
    protected function get_balance($id)
    {
        $current_balance = Wallet::where('id', $id)->first('balance');
        $current_balance = $current_balance['balance'];
        return (float)$current_balance;
    }

    //To update  the balance
    protected function update_balance($id, $amount)
    {
        $record = Wallet::where(['id' => $id])->first();
        $record->update(['balance' => $amount]);
    }

    public function show()
    {
        $bal = $this->get_balance(session('id'));
        return view('show', ['balance' => $bal]);
    }

    //Function that will Get values From request and from database
    public function get_values($request)
    {
        //GEtting Amount to add
        $amount = (float)$request['amount'];

        // //GEtting Current Amount
        $id = session()->get('id');
        $current_balance = $this->get_balance($id);
        return ['amount' => $amount, 'current_balance' => $current_balance];
    }

    //To add money(Credit)
    public function credit(TransactionRequest $request)
    {
        $temp = $this->get_values($request);
        //Adding..
        $toAdd = bcadd($temp['amount'], $temp['current_balance']);

        //Updating balance in database
        $this->update_balance(session('id'), $toAdd);

        return view('show', ['balance' => $this->get_balance(session('id'))]);
    }

    //To add money(debit)
    public function debit(TransactionRequest $request)
    {

        $temp = $this->get_values($request);
        $current_balance = $temp['current_balance'];
        $toWithdraw = $temp['amount'];

        //check if user has enough money
        if ($current_balance >= $toWithdraw)
            $toWithdraw = bcsub($current_balance, $toWithdraw);
        else {
            session()->flash('error', "insufficient balance!!");
            return view(
                'lenden',
                [
                    'todo' => 'debit',
                    'balance' => $current_balance
                ]
            );
        }

        //Updating balance in database
        $this->update_balance(session('id'), $toWithdraw);

        return view('show', ['balance' => $this->get_balance(session('id'))]);
    }

    //TO transfer Money
    public function transfer(TransferRequest $request)
    {
        dd('hi');
        //Debit money from Sender's Account
        $id = session('id');
        $amount = bcsub($this->get_balance($id), $request['amount']);
        $this->update_balance($id, $amount);

        //Credit into Receiver's account
        $id = $request['receiveracc'];
        $amount = bcadd($this->get_balance($id), $request['amount']);
        $this->update_balance($id, $amount);

        return view('dashboard', ['error' => "Successfully Transfered {$request['amount']} into {$request['receivername']}'s account"]);
    }

    //returning views
    public function credit_view()
    {
        return view('lenden', ['todo' => 'credit', 'balance' => $this->get_balance(session('id'))]);
    }
    public function debit_view()
    {
        session()->flash('error', '');
        return view('lenden', ['todo' => 'debit', 'balance' => $this->get_balance(session('id'))]);
    }
}
