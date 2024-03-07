<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Wallet;

class BaseController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function create_user(RegisterRequest $request)
    {
        if (Wallet::create(
            [
                'username' => $request['username'],
                'password' => $request['password'],
                'email' => $request['email'],
                'adhar' => $request['adhar'],
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
            // dd(session('username'));
            
            session()->flush();
            session()->put('id',$data['id']);
            session()->put('username',$data['username']);
            return redirect(route('dashboard'));
        } else
            return redirect('/login')->withErrors(['password' => 'Invalid password.']);
    }
    public function logout()
    {
        session()->flush();
        return redirect('home');
    }
}
