{{-- @dd($books) --}}

@extends('layouts.admin')



@section('content')
    <button class="btn-create-book inline-block py-2 rounded-md px-4 mb-5 text-white bg-blue-600 hover:bg-blue-700">
        + Create
    </button>
    @if($books->count())
        <table class="bg-white table table-auto border-2 border-collapse w-full">
            <thead class="border-2 border-collapse text-left font-bold">
                <th class="p-4  ">Image</th>
                <th class="p-4">Title</th>
                <th class="p-4">Pages</th>
                <th class="p-4">Author</th>
                <th class="p-4">Publish Year</th>
                <th class="p-4">Publisher</th>
                <th class="p-4">Actions</th>
            </thead>
            <tbody>
               
                @foreach ($books as $book)
                  
                    <tr class="border-2 border-collapse">
                       
                        <td class="p-4 ">
                            <img src="/storage/{{ $book->cover }}" alt="{{ $book->title }}" width="100">

                        </td>
                        <td class="p-4">{{ $book->pages }}</td>
                        <td class="p-4">{{ $book->title }}</td>
                        <td class="p-4">{{ $book->author->firstname }}</td>
                        <td class="p-4">{{ $book->publish_year }}</td>
                        <td class="p-4">{{ $book->publisher->name }}</td>
                        <td class="p-4">
                            <div class="button-container flex  flex-col ">
                                <a href="/dashboard/books/{{ $book->slug }}" class="bg-orange-500 mb-4 text-white p-4 flex content-center text-sm">
                                    <i class="fi fi-rr-pencil mr-3"></i> 
                                    <span>Update</span>
                                </a>
                                <a href="/dashboard/books/{{ $book->slug }}" class="bg-red-500 text-white p-4 flex content-center text-sm">
                                    <i class="fi fi-rr-trash mr-3"></i>
                                    <span>
                                        Delete
                                    </span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach       
            </tbody>
        </table>    
        
        <div class="pagination mt-3">
            {{ $books->links() }}
        </div>

        <x-modal enctype="multipart/form-data" title="Create New Book" action="/dashboard/books" method="POST">
            <x-form.input name="title" type="text" title="Title">
            </x-form.input>

            <x-form.input name="slug" type="text" title="Slug" >
            </x-form.input>

            
            <x-form.input name="pages" type="text" title="Pages">
            </x-form.input>

            
            <x-form.input name="publish_year" type="text" title="Publish Year">
            </x-form.input>

                 
            <x-form.input name="author" type="select" title="Author">
                <select name="author" id="author" class="px-2 border-2 border-gray-200">

                </select>
            </x-form.input>
            
             
            <x-form.input name="publisher" type="select" title="Publisher">
                 <select name="publisher" id="publisher" class="px-2 border-2 border-gray-200">
                    
                </select>
            </x-form.input>

            <x-form.input name="cover" type="file" title="Cover" class="col-span-2">

            </x-form.input>
        

        </x-modal>

    @endif
@endsection