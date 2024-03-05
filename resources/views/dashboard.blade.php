{{-- @if (session()->has('id'))
    
<button><a href='{{route('logout')}}' style='text-decoration:none'>Logout</a></button>
@else
You are Logged out
@endif --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DashBoard</title>
</head>

<body bgcolor="black">
    <table bgcolor = "white" width = '1200px' cellpadding='10px'>

        <tr><td>
            @if (App\Models\Account::where('user_id', session()->get('id'))->count() == 0)
                <button><a href="{{ route('wallet.create') }}" style="text-decoration: none">
                            create A wallet</a>
                    </button>
            @else
            <button><a href="{{ route('wallet_show') }}" style="text-decoration: none">
                My Wallet</a>
        </button>
            @endif</td>
            <td>
               @if (!empty($error))
               {{$error}}
               @endif 
                   
            </td>
        </tr>
    </table>
</body>

</html>
