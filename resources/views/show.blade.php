<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyWallet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <br><br>
    <table class="table" style="width:auto" align="center">
        <tr>
            <td>Name</td>
            <td>:</td>
            <td>{{ session('username') }}</td>
        </tr>
        <tr class="table-secondary">
            <td>Balance</td>
            <td>:</td>
            <td>
                {{ $balance }}
            </td>
        </tr>
        <tr>
            <td>Add</td>
            <td>:</td>
            <td><button class="btn btn-outline-dark"><a href="{{ route('credit') }}"
                        style="text-decoration: none">Credit</a></button></td>
        </tr>
        <tr class="table-secondary">
            <td>Withdraw</td>
            <td>:</td>
            <td><button class="btn btn-outline-dark"><a href="{{ route('debit') }}"
                        style="text-decoration: none">Dedit</a></button></td>
        </tr>
        <tr>
            <td>Dashboard</td>
            <td>:</td>
            <td><button class="btn btn-outline-dark"><a href="{{ route('dashboard') }}"
                        style="text-decoration: none">Dashboard</a></button></td>
        </tr>
    </table>
</body>

</html>
