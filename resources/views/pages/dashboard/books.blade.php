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
                            <div class="button-container flex flex-1 flex-col ">
                                
                                <button data-slug="{{ $book->slug }}" class="btn-update-book bg-orange-500 text-white p-4 flex content-center text-sm w-full hover:bg-orange-600 focus:bg-orange-700 mb-3">
                                    <i class="fi fi-rr-pencil mr-3"></i> 
                                    Update
                                </button>

                                <button data-slug="{{ $book->slug }}" class="btn-delete-book bg-red-500 text-white p-4 flex content-center text-sm w-full hover:bg-red-600 focus:bg-red-700">
                                    <i class="fi fi-rr-trash mr-3"></i>
                                    Delete
                                </button>
                            
                            </div>
                        </td>
                    </tr>
                @endforeach       
            </tbody>
        </table>    
        
        <div class="pagination mt-3">
            {{ $books->links() }}
        </div>

        <x-modal class="create__modal">

            <x-modal-form enctype="multipart/form-data" title="Create New Book" action="/dashboard/books" method="POST" class="create-book-form">
            
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
            
                <button class="col-span-2 mt-3 py-2 px-4 bg-blue-600 text-white">Submit</button>
                
            </x-modal-form>
    
        </x-modal>
        
        <x-modal class="delete__modal">
            <x-modal-form  title="Delete Book" action="/dashboard/books/{{ $book->slug }}" method="POST" class="delete-book-form leading-5 text-center" showHeader="false">
                <h3 class="text-3xl font-bold text-red-600 mb-3">Do you want to delete this book?</h3>
                <p class="text-md">The deleted book can't be restored !</p>
                <div class="btn-container m-auto mt-5">
                    <button type="submit" class="btn-submit bg-red-100 text-red-600 px-4 py-2 mr-3 hover:bg-red-200 focus:bg-red-300">Delete</button>
                    <button type="button" class="btn-cancel border border-gray-600 text-gray-600 px-4 py-2 hover:bg-gray-200 focus:bg-gray-300">Cancel</button>
                </div>
            </x-modal-form>
        </x-modal>

        
        <x-modal class="update__modal">
            <x-modal-form enctype="multipart/form-data" title="Update Book" action="/dashboard/books/{{ $book->slug }}" method="POST" class="update-book-form">
                
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

                <button class="col-span-2 mt-3 py-2 px-4 bg-blue-600 text-white">Submit</button>

            </x-modal-form>
        </x-modal>
        
    @endif
@endsection