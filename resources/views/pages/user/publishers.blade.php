
@extends('layouts.admin')

@section('content')
    <div class="publisher-datas flex flex-col w-2/4 m-auto">
        @foreach ($publishers as $publisher)
        <a href="/books?publisher={{ $publisher->name }}" class="mb-3">
            <div class="flex items-center card py-5 rounded-2xl shadow-lg shadow-slate-200 bg-white px-4">
                <div class="card-img w-1/5 mr-3 mb-3">
                    <img src="/image/{{ $publisher->logo }}" alt="" class="w-full h-full object-center object-contain">
                 </div>
                <h2 class="text-slate-500">{{ $publisher->firstname }}</h2>
            </div>
        </a>
        @endforeach
    </div>
@endsection