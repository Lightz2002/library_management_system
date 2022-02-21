
@extends('layouts.main')


@section('content')
    @if ($books->count())          
        <div class="  grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($books as $book)
                <div class="flex flex-col book-datas shadow-sm hover:shadow-lg card py-5 rounded-sm shadow-md shadow-slate-200 bg-white px-4">
                        <a href="/books/{{ $book->slug }}" class="" >
                            <div class="card-img w-full h-40 m-auto mb-3 hover:pointer">
                                <img src="/storage/{{ $book->cover }}" alt="" class="w-full h-full object-center object-contain">
                            </div>
                        </a>
                        <h2 >{{ $book->title }}</h2>
                        <h4 class="text-slate-500 text-sm">
                            by 
                            <a href="/books?author={{ $book->author->slug }}" class="text-blue-500">
                                {{ $book->author->firstname }}
                            </a>
                        </h4>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-3xl">No Books Found.</p>
    @endif

    <div class="pagination mt-3">
            {{ $books->links() }}
    </div>
    
@endsection
