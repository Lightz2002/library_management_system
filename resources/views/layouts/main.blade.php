<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"> </script>
    

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

                        @include('partials.searchbar')
                        
                    </div>

                    <div class="content-body w-3/4  mx-auto">
                        @yield('content')
                    </div>
                </div>

        </div>

</body>
</html>