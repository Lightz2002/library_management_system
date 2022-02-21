<form action="{{ $action }}" method="{{ $method }}" enctype="{{ $enctype }}" {{ $attributes->merge(['class' => 'form  p-8 w-[30rem] m-auto shadow-md rounded-md bg-white']) }}>
    @csrf

    @if ($showHeader === true) 
     <div class="form-header flex justify-between items-center content-center mb-5">
        <h1 class="font-bold text-2xl">{{ $title }}</h1>
        <i class=" modal__close-button close hover:cursor-pointer fi fi-rr-cross "></i>
    </div> 
    @endif
    

    <div class="form-grid {{ str_contains($title, 'Create') || str_contains($title, 'Update') ? 'grid grid-cols-2 gap-4' : ''}}">
        {{ $slot }}
    </div>

</form>