<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{asset('js/app.js')}}"></script>

    <title>{{ $title }}</title>
</head>
<body >
        <div class="max-w-screen min-h-screen  relative p-0 grid grid-rows-[4rem_auto] grid-cols-[5rem_1fr] 
        sm:grid-cols-[8rem_1fr] md:grid-cols-[12rem_1fr] ">
                @include('partials.admin-sidebar')

                @include('partials.admin-navbar')


    
                <div class="content    max-h-full p-8 bg-slate-100">
                    <div class="content-header mb-8 flex items-center ">
                        <h1 class="font-bold text-2xl ">
                            {{ $title }}
                        </h1>

                        @if ( !str_contains($title, 'Dashboard') )                            
                            @include('partials.searchbar') 
                        @endif
                        
                    </div>

                    <div class="content-body w-full">
                        @yield('content')
                    </div>
                    
                </div>

        </div>

</body>
</html>