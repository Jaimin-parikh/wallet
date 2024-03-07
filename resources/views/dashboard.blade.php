<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    {{-- Nav bar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('dashboard')}}">GGWallet</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @if (session()->has('username'))
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{route('wallet_show')}}">Mywallet</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('credit')}}">Add Funds</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('debit')}}">Withdraw Funds</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('transfer')}}">Transfer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">register</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
    <div style="color: red">
        @if (!empty($error))
            {{ $error }}
        @endif 
    </div>
</body>

</html>
