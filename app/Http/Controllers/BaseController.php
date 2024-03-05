<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Account;
use App\Models\Wallet;

class BaseController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function create_user(RegisterRequest $request)
    {
        if (Wallet::create(
            [
                'username' => $request['username'],
                'password' => $request['password'],
                'email' => $request['email'],
                'adhar' => $request['adhar'],
                'vpa' => $request['vpa'],
                'contact_number' => $request['contact_number']
            ]
        )) {
            return view('login');
        } else
            echo "There's something wrong on our side!";
    }
    public function login_user(LoginRequest $request)
    {
        $data = Wallet::where(['username' => $request['username']])->first();

        if (password_verify($request['password'], $data['password'])) {
            session()->put('username',$data['username']);
            // dd(session('username'));
            session()->put('id',$data['id']);
            return view('dashboard');
        } else
            return redirect('/login')->withErrors(['password' => 'Invalid password.']);
    }
    public function logout()
    {
        session()->flush();
        
        return redirect('home');
    }
}
