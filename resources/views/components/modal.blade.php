<div class="close modal  hidden absolute top-0 left-0 z-40  w-full h-full bg-black bg-opacity-30">
    <form action="{{ $action }}" method="{{ $method }}" class="form relative p-8 w-[30rem] m-auto bg-white">
        @csrf
        <i class="close modal__btn-close hover:cursor-pointer hover:text-red-500 absolute top-4 right-4 fi fi-rr-cross"></i>
        <h1 class="font-bold text-2xl mb-5">{{ $title }}</h1>

        <div class="form-grid grid grid-cols-2 gap-4">

            {{ $slot }}
        </div>

        <button class=" mt-3 py-2 px-4 bg-blue-600 text-white">Submit</button>
    </form>
</div>