<?php

namespace App\Http\Middleware;

use App\Models\Wallet;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransferMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (is_numeric($request['receiveracc'])) {
            if (is_numeric($request['amount']) && $request['amount']>0) {
                if (session('id') != $request['receiveracc']) {
                    $name = Wallet::where('id', $request['receiveracc'])->first();
                    if ($name['username'] == $request['receivername']) {
                        $name = Wallet::where('id', session('id'))->first();
                        if ($name['balance'] >= $request['amount']) {
                            return $next($request);
                        } else
                            return Response()->view('dashboard', ['error' => "Amount {$request['amount']} acceds Your current balance {$name['balance']}"]);
                    } else
                        return Response()->view('dashboard', ['error' => "Receiver's Account number and Name doe not match"]);
                } else
                    return Response()->view('dashboard', ['error' => "Sender and Receiver are the same"]);
            } else
                return Response()->view('dashboard', ['error' => "Amount must be numeric and greater than 0"]);
        } else {
            return Response()->view('dashboard', ['error' => "Receiver's Account number and Name doe not match"]);
        }
    }
}
