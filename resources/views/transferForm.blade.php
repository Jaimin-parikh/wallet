<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <br><br>
    <form action="{{ route('transfer') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="From" class="form-label">Sender's Number:</label>
            <input type="text" name="fromaccno" class="form-control" disabled value="{{ session('id') }}">
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Sender's Name:</label>
            <input type="text" name="fromusername" class="form-control" disabled value="{{ session('username') }}">
        </div>

        <div class="mb-3">
            <label for="receiveraccno" class="form-label">Receiver's Number:</label>
            <input type="text" name="receiveracc" class="form-control">
        </div>
        <div style="color: red">

            @error('receiveracc')
                *{{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="receivername" class="form-label">Receiver's Name:</label>
            <input type="text" name="receivername" class="form-control">
        </div>
        <div style="color: red">

            @error('receivername')
                *{{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount:</label>
            <input type="text" name="amount" class="form-control">
        </div>
        <div style="color: red">

            @error('amount')
                *{{ $message }}
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
