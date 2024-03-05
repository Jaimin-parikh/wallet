<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
</head>

<body style="background-color: black;">

    <div style="margin: 30vh; margin-left:25vw ;background-color: white ;width:fit-content;padding:10px;border-radius:2px;">
        <div style="color: black; text-align:center;font-size:x-large">Login Here!</div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <table style="border-radius:2px; font-size:x-large;padding:10px" cellpadding='10px'>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td>:</td>
                    <td><input type="text" name="username"></td>
                    <td style="color: red; font-size:small">
                        @error('username')
                            *{{ $message }}
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td>:</td>
                    <td><input type="password" name="password"></td>
                    <td style="color: red; font-size:small">
                        @error('password')
                            *{{ $message }}
                        @enderror
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="3"><input type="submit" value="Login" style="cursor: pointer">&nbsp&nbsp&nbsp&nbsp<a href="{{route('register')}}" style="text-decoration: none"> Not a member yet?</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
