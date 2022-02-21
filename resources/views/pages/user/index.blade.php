@extends('layouts.main')


@if (session()->has('unauthorized'))
@section('content')
    
<div class="alert text-center py-1 text-sm font-bold bg-red-100 text-red-600 mb-3">
    {{ session('unauthorized') }}
</div>
@endsection
@endif