@extends('layouts.app')
@section('title', 'mywallet')
@section('content')
    <br><br>
    <div class="bg-white rounded w-[250px] p-3 ml-[500px]">
        @if (!empty($error))
            <div>{{ $error }}</div>
        @endif
        <table>
            <tr>
                <td class="p-2">username</td>
                <td class="p-2"> :</td>
                <td class="p-2">{{ session('username') }}</td>
            </tr>
            <tr>
                <td class="p-2">Balance</td>
                <td class="p-2"> :</td>
                <td class="p-2">{{ $balance }}</td>
            </tr>
            <tr>
                <td class="p-2">AddMoney</td>
                <td class="p-2"> :</td>
                <td class="p-2"><a class="ml-5 cursor-pointer bg-gray-800 p-2 text-white rounded-full"
                        href="{{ route('credit') }}">Add </a></td>
            </tr>
            <tr>
                <td class="p-2">Withdraw</td>
                <td class="p-2"> :</td>
                <td class="p-2"><a class="cursor-pointer bg-gray-800 p-2 text-white rounded-full"
                        href="{{ route('debit') }}">Withdraw </a></td>
            </tr>
        </table>
    </div>
@endsection
