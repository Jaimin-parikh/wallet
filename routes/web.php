<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//-----basic routes--------------------//
Route::get('/', function () {
    return redirect('index');
});

Route::get('index', [BaseController::class, 'index'])->name('home');

Route::fallback(function () {
    return redirect('index');
});
//-------------------------------------------//


//-----------------user Registration-----------------------//
Route::get('register', function () {
    return view('register');
});
Route::post('register', [BaseController::class, 'create_user'])->name('register');
//--------------------------------------------------------//

//-------------------Login---------------------------------//
Route::get('login', function () {
    return view('login');
});

Route::post('login', [BaseController::class, 'login_user'])->name('login');
//----------------------------------------------------//

//--------------------UserLogout--------------------------------//
Route::get('logout', [BaseController::class, 'logout'])->name('logout');

//----------------------------------------------------//


//---------------------dashboard-------------------------------//
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['login']], function () {

    //---------------------Wallet-------------------------------//
    Route::resource('wallet', WalletController::class)->only('create');

    //------------------------Getting Transaction page-------------------------------//
    Route::get('credit', function () {
        return view('lenden', ['todo' => 'credit']);
    });
    Route::get('debit', function () {
        return view('lenden', ['todo' => 'debit']);
    });
    Route::get('transfer', function () {
        return view('transferForm');
    });
    //-------------------------------------------------------------------------//

    Route::group(['middleware' => ['amount']], function () {

        //----------------------Credit-----------------------//
        Route::post('credit', [WalletController::class, 'credit'])->name('credit');

        //----------------------debit-----------------------//


        Route::post('debit', [WalletController::class, 'debit'])->name('debit');

        //------------------------Transfer-------------------------//

        Route::post('transfer', [WalletController::class, 'transfer'])->name('transfer')->middleware('transfer');
    });

    //--------------------display-------------------------------------------//
    Route::get('wallet_show', [WalletController::class, 'show'])->name('wallet_show');
});
