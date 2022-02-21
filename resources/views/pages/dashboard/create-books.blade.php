@extends('layouts.admin')

@section('content')
<form action="/dashboard/books" method="POST" enctype=multipart/form-data
class = 'create-book-form '>
    @csrf  


    <div class="form-grid grid grid-cols-2 gap-4">
         
        <x-form.input name="title" type="text" title="Title">
                @error('title')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
        </x-form.input>
    
        <x-form.input name="slug" type="text" title="Slug" >
                @error('slug')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
                
        </x-form.input>
        <x-form.input name="pages" type="text" title="Pages">
                @error('pages')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
        </x-form.input>
        
        <x-form.input name="publish_year" type="text" title="Publish Year">
                @error('publish_year')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
        </x-form.input>
             
        <x-form.input name="author" type="select" title="Author">
            <select name="author" id="author" class="px-2 border-2 border-gray-200">
            </select>
            @error('author')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </x-form.input>
        
         
        <x-form.input name="publisher" type="select" title="Publisher">
             <select name="publisher" id="publisher" class="px-2 border-2 border-gray-200">
            </select>
            @error('publisher')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </x-form.input>
    
        <x-form.input name="cover" type="file" title="Cover" class="col-span-2">
            @error('cover')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </x-form.input>
    
        <button class="col-span-2 mt-3 py-2 px-4 bg-blue-600 text-white">Submit</button>
    </div>
</form>
    
@endsection
            