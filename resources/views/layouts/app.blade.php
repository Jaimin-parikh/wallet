<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">
    <nav class="bg-gray-800 flex p-2">
        <div class="flex text-white ">
            <a href="{{ route('dashboard') }}" class="p-2">GGWallet</a>
        </div>
        <div class="flex text-white p-2">
            @if (session()->has('username'))
                <div>
                    <a href="{{ route('wallet_show') }}" class="p-2">Mywallet</a>
                </div>

                <div>
                    <a href="{{ route('credit') }}"class="p-2">Add Funds</a>
                </div>
                <div>
                    <a href="{{ route('debit') }}"class="p-2">Withdraw Funds</a>
                </div>
                <div>
                    <a href="{{ route('transfer') }}"class="p-2">Transfer</a>
                </div>
                <div>
                    <a href="{{ route('logout') }}"class="p-2">Logout</a>
                </div>
            @else
                <div>
                    <a
                        href="{{ route('login') }}"class="p-2 {{ Route::current()->uri == 'login' ? ' bg-white text-black rounded' : 'bg-gray-800' }}">Login</a>
                </div>
                <div>
                    <a href="{{ route('register') }}"class="p-2 {{Route::current()->uri == 'register' ? 'bg-white text-black rounded' : 'bg-gray-800'}}">Register</a>
                </div>
            @endif
        </div>
    </nav>

    @yield('content')
</body>

</html>
