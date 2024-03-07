<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <br><br>
    @if ($todo == 'credit')
        <form action="{{ route('credit') }}" method="POST">

    @else
        <form action="{{ route('debit') }}" method="POST"> 
    @endif

     @csrf
    <div class="mb-3">
        <label for="amount" class="form-label">Amount :</label>
        <input type="text" name="amount" class="form-control">
    </div>
    <div style="color: red">
        @error('amount')
            {{ $message }}
        @enderror

    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>

</html>
