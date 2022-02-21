@extends('layouts.main')

@section('content')
            <div class="flex w-4/5 m-auto card py-5 rounded-2xl shadow-slate-400 bg-white px-4">
                <div class="card-img w-1/5 h-40 mb-3">
                   <img src="/storage/{{ $book->cover }}" alt="" class="w-full h-full object-center object-contain">
                </div>
                <div class="card-body flex flex-col justify-evenly">
                    <div class="main-desc">
                        <h2 class="text-xl font-bold">{{ $book->title }}</h2>
                        <h2 class="text-md text-slate-600">
                            Written by 
                            <a href="/books?author={{ $book->author->slug }}" class="text-blue-500">    
                                {{ strtolower($book->author->firstname) }}
                            </a>
                        </h2>
                       
                    </div>
                    <div class="detail-desc">
                        <h2 class="text-md text-slate-500">Published by 
                            <a href="/books?publisher={{ $book->publisher->slug }}" class="text-blue-500">    
                                {{ $book->publisher->name }}
                            </a>
                            at {{ $book->publish_year }}
                        </h2>
                        <h2 class="text-md text-slate-500">Total pages: {{ $book->pages }}</h2>
                    </div>
                </div>
            </div>
@endsection

