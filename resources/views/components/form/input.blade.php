<div  {{ $attributes->merge(['class' => 'form-group mb-2 flex flex-col'])}}>
    <label for="{{ $name }}" class="mb-3">{{ $title }}</label>
    @if($type !== 'select') 
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="px-2 border-2 border-gray-200" >
    @else
    {{ $slot }}
    @endif

 
</div>