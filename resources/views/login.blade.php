@extends('layouts.app')
@section('title', 'login')
@section('content')
    <br>
    <br>
    <div class="bg-gray-700 text-white rounded p-5 ml-80 mt-10  w-[400px]">

        <p class="m-2 ">Login Here!!</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <table class="p-3">
                    <div style="color:red"> @error('amount')
                        *{{ $message }}
                        @enderror 
                        @error('username')
                        <br>*{{ $message }}
                        @enderror
                        @error('password')
                        <br>*{{ $message }}
                        @enderror

                    </div>
                </div>

                <div class="mb-3">
                    <tr>
                        <td class="p-1"><label for="username" class="form-label">Username</td>
                        <td class="p-1">:</td></label>
                        <td class="p-1">
                            <input type="text" name="username" class="outline-none rounded p-1 text-black "
                                placeholder="Do not enter your Email">
                        </td>
                    </tr>
                </div>
                <div class="mb-3">
                    <tr>
                        <td class="p-1"><label for="password" class="form-label">Password</td>
                        <td class="p-1">:</td></label>
                        <td class="p-1">
                            <input type="password" name="password" class="outline-none rounded p-1 text-black "
                                placeholder="Password">
                        </td>
                    </tr>
                </div>

            </table>
            <input type="submit" value="Submit" class="bg-white text-black rounded-full p-2">
        </form>
    </div>
@endsection
