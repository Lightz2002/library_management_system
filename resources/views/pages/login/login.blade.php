
@extends('layouts.login')



@section('form')
        @if(session()->has('success') || session()->has('logoutSuccess'))
            <div class="alert text-center py-1 text-sm font-bold bg-green-100 text-green-600 mb-3">
                {{ session('success') ?? session('logoutSuccess') }}
            </div>
        @endif

        @if(session()->has('loginError'))
            <div class="alert text-center py-1 text-sm font-bold bg-red-100 text-red-600 mb-3">
                {{ session('loginError') }}
            </div>
        @endif
        
        <div class="form-group flex flex-col mb-3">
            <label for="email" class="mb-3">Email</label>
            <input type="text" id="email" name="email"  class="rounded-sm px-3 py-1 border border-slate-400 @error('email') border-2 border-red-600  focus:outline-red-600 @enderror" autofocus required value="{{ old('email') }}">
            @error('email')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group flex flex-col mb-3">
            <label for="password" class="mb-3">Password</label>
            <input type="password" id="password" name="password" class="rounded-sm px-3 py-1 border autofocus border-slate-400 @error('password') border-2 border-red-600 focus:outline-red-600 @enderror" required>
            @error('password')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>
@endsection