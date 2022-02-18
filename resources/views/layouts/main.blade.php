<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

    <title>{{ $title }}</title>
</head>
<body >
        <div class="max-w-screen min-h-screen  relative p-0 grid grid-rows-[4rem_auto] ">
                @include('partials.navbar')



                <div class="content max-h-full p-8 bg-slate-100">
                    <div class="content-header  w-3/4 mx-auto mb-8 lg:flex items-center ">
                        <h1 class="font-bold text-2xl ">
                            {{ $title }}
                        </h1>

                        <div class="sub-pages__search text-lg flex items-center text-slate-400 p-0 lg:ml-auto lg:mt-0 mt-5">
                            <form action="/books" class="grow flex items-center lg:justify-center ">
                                @if(request('author'))
                                    <input type="hidden" name="author" value="{{ request('author') }}">                       
                                @endif
                                @if(request('publisher'))
                                <input type="hidden" name="publisher" value="{{ request('publisher') }}">                       
                                @endif
                                <button type="submit" class="bg-blue-600 text-white py-2 px-4">
                                    <i class="fi fi-rr-search"></i>
                                </button>
                                <input type="text" placeholder="Search..." 
                                name="search"
                                class="sub-pages__search-bar px-2 py-2" value="{{ request('search') }}">
                            </form>
                        </div>
                        
                    </div>

                    <div class="content-body w-3/4  mx-auto">
                        @yield('content')
                    </div>
                </div>

        </div>

</body>
</html>