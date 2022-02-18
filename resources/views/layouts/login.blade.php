<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="login-container min-h-screen max-w-screen flex items-center justify-center bg-slate-100">
        <div class="form-container rounded-lg bg-white w-[30rem] px-12 py-8 shadow-lg  shadow-slate-300">
    <h1 class="mb-8 text-2xl font-bold">{{ $title }}</h1>

            <form action="/{{ $path }}" method="POST">
                @csrf

                @yield('form')

                @if ($title === 'Login')
                    <button type="submit" class="rounded-sm w-full my-5 px-4 py-2 bg-blue-500 text-white">Login</button>
                    <small class="text-gray-500 text-center block">Don't have an account? <a href="/register" class="text-blue-500">Create One</a></small>
                @elseif ($title === 'Register')
                    <button type="submit" class="rounded-sm w-full my-5 px-4 py-2 bg-blue-500 text-white">Register</button>
                    <small class="text-gray-500 text-center block">Already have an account? <a href="/login" class="text-blue-500">Log In</a></small>
                @endif
            </form>

            
           
        </div>
    </div>
</body>
</html>