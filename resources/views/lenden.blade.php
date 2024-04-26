@extends('layouts.app')
@section('content')
    <br><br>
    <div class="bg-gray-700 text-white rounded p-5 ml-80 mt-10  w-[400px]">
        
        <p class="m-2 text-white">{{ session('error') }}</p>
        
        <p class="m-2 text-white">Your Current Balance is : {{ $balance }}</p>
        @if ($todo == 'credit')
            <p class="m-2">How much Money You want to add?</p>
            <form action="{{ route('credit') }}" method="POST">
            @else
                <p class="m-2">How much Money You want to withdraw?</p>
                <form action="{{ route('debit') }}" method="POST">
        @endif

        @csrf
        <div class="mb-3">
            <label for="amount" class="form-label">Amount :</label>
            <input type="text" name="amount" class="outline-none rounded p-1 text-black " placeholder="Enter Amount">
        </div>
        <div style="color: red">
            @error('amount')
                {{ $message }}
            @enderror

        </div>
        <button type="submit" class="bg-white text-black rounded-full p-2">Submit</button>
        </form>
    </div>
@endsection
