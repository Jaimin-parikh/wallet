    @extends('layouts.app')
    @section('title', 'transfer')
    @section('content')
        <br>
        <br>
        <div class="bg-gray-700 text-white rounded p-5 ml-80 mt-10  w-[400px]">

            <p class="m-2 text-white">{{ session('error') }}</p>

            {{-- <p class="m-2 text-white">Your Current Balance is : {{ $balance }}</p> --}}

            <p class="m-2">How much Money You want to Transfer?</p>
            <form action="{{ route('transfer') }}" method="POST">
                @csrf
                <table class="p-3">
                    <div class="mb-3">
                        <tr>
                            <td class="p-1"><label for="From" class="form-label">Sender's Number</td>
                            <td class="p-1">:</td></label>
                            <td class="p-1">
                                <input type="text" name="From" class="outline-none rounded p-1 text-white " disabled
                                    value="{{ session('id') }}">
                            </td>
                        </tr>
                    </div>
                    <div class="mb-3">
                        <tr>
                            <td class="p-1"><label for="username" class="form-label">Sender's Number</td>
                            <td class="p-1">:</td></label>
                            <td class="p-1">
                                <input type="text" name="fromusername" class="outline-none rounded p-1 text-white "
                                    disabled value="{{ session('username') }}">
                            </td>
                        </tr>
                    </div>

                    <div class="mb-3">
                        <tr>
                            <td class="p-1"><label for="amount" class="form-label">Amount</td>
                            <td class="p-1">:</td></label>
                            <td class="p-1">
                                <input type="text" name="amount" class="outline-none rounded p-1 text-black "
                                    placeholder="Enter Amount">
                            </td>

                        </tr>
                        <div style="color:red"> @error('amount')
                            *{{ $message }}
                            @enderror 
                            @error('receivername')
                            <br>*{{ $message }}
                            @enderror
                            @error('receiveracc')
                            <br>*{{ $message }}
                            @enderror

                        </div>
                    </div>

                    <div class="mb-3">
                        <tr>
                            <td class="p-1"><label for="receiveraccno" class="form-label">Receiver's Number</td>
                            <td class="p-1">:</td></label>
                            <td class="p-1">
                                <input type="text" name="receiveracc" class="outline-none rounded p-1 text-black "
                                    placeholder="Account Number">
                            </td>
                        </tr>
                    </div>
                    <div class="mb-3">
                        <tr>
                            <td class="p-1"><label for="receivername" class="form-label">Receiver's Name</td>
                            <td class="p-1">:</td></label>
                            <td class="p-1">
                                <input type="text" name="receivername" class="outline-none rounded p-1 text-black "
                                    placeholder="Name">
                            </td>
                        </tr>
                    </div>

                </table>
                <input type="submit" value="Submit" class="bg-white text-black rounded-full p-2">
            </form>
        </div>
    @endsection
