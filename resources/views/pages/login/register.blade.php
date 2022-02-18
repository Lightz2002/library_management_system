@extends('layouts.login')



@section('form')

        <div class="form-group flex flex-col mb-3">
            <label for="name" class="mb-3">Name</label>
            <input type="text" id="name" name="name"  class="rounded-sm p-3 py-1 border border-slate-400 
            @error('name') border-2 border-red-600 @enderror" autofocus required value="{{ old('name') }}">
         
            @error('name')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group flex flex-col mb-3">
            <label for="email" class="mb-3">Email</label>
            <input type="email" id="email" name="email"  class="rounded-sm p-3 py-1 border border-slate-400 @error('name') border-2 border-red-600 @enderror" required value="{{ old('email') }} ">
            @error('email')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group flex flex-col mb-3">
            <label for="password" class="mb-3">Password</label>
            <input type="password" id="password" name="password" class="rounded-sm p-3 py-1 border border-slate-400 @error('password') border-2 border-red-600 @enderror" required>
            @error('password')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>
@endsection