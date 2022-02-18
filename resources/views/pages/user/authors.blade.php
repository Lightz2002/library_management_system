
@extends('layouts.admin')

@section('content')
    <div class="author-datas flex flex-col w-2/4 m-auto">
        @foreach ($authors as $author)
        <a href="/books?author={{ $author->slug }}" class="mb-3">
            <div class="flex items-center card py-5 rounded-2xl shadow-lg shadow-slate-200 bg-white px-4">
                <div class="card-img w-1/5 mr-3 mb-3">
                   <img src="/image/{{ $author->image }}" alt="" class="w-full h-full object-center object-contain">
                </div>
                <h2 class="text-slate-500">{{ $author->firstname }}</h2>
            </div>
        </a>
        @endforeach
    </div>
@endsection