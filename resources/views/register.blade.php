<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username :</label>
            <input type="text" name="username" class="form-control" aria-describedby="emailHelp">
        </div>
        <div style="color: red">

            @error('username')
                *{{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div style="color: red">

            @error('password')
                *{{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="adhar" class="form-label">Adhar:</label>
            <input type="text" name="adhar" class="form-control" id="exampleInputPassword1">
        </div>
        <div style="color: red">
            @error('adhar')
                *{{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" name="email" class="form-control" id="exampleInputPassword1">
        </div>
        <div style="color: red">
            @error('email')
                *{{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="contact_number" class="form-label">Contact Number:</label>
            <input type="text" name="contact_number" class="form-control" id="exampleInputPassword1">
        </div>
        <div style="color: red">
            @error('contact_number')
                *{{ $message }}
            @enderror
        </div>
        <div class="mb-3">Already have an account?
            <a href="{{ route('login') }}">Login Here</a>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
