<nav  class="flex items-center justify-evenly bg-slate-50">
    <div class="navbar-brand p-8">
        <h1 class="text-3xl font-bold">LMS</h1>
    </div>
    <nav class="text-slate-400 w-3/5">
        <ul class="flex justify-start items-center    p-8">
            <li class="mr-5">
                <a href="/" class="{{ Request::is('/') ? 'active' : "" }} sidebar-link flex flex-col items-center md:flex-row md:justify-start hover:text-blue-600 h-full w-full">
                    <p class="hidden sm:block">Home</p>
                </a>
            </li>
            <li class="mr-5">
                <a href="/books" class="{{ Request::is('books') ? 'active' : "" }} sidebar-link flex flex-col items-center md:flex-row md:justify-start hover:text-blue-600 h-full w-full">
                    <p class="hidden sm:block">Book</p>
                </a>
            </li>
           
            <li class="mr-5">
                <a href="/loan" class="{{ Request::is('loan') ? 'active' : "" }} sidebar-link flex flex-col items-center md:flex-row md:justify-start hover:text-blue-600 h-full w-full">
                    <p class="hidden sm:block">Loan</p>
                </a>
            </li>
            {{-- <li>
                <a href="/loan" class="{{ $title === "User" ? 'active' : "" }} sidebar-link flex flex-col items-center md:flex-row md:justify-start hover:text-blue-600 h-full w-full">
                    <p class="hidden sm:block">Profile</p>
                </a>
            </li> --}}
        </ul>
    </nav>

    <div class="navbar ml-auto mr-3 flex items-center">
        @auth
            <p class="mr-5">Welcome, {{ auth()->user()->name }}</p>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="w-32 flex items-center justify-evenly bg-red-600 py-2 px-3 text-white">
                    <i class="fi fi-rr-sign-out-alt"></i>
                    <p>Logout</p>
                </button>
            </form>
        @else
            
            <a href="/login">
                <div class="w-32 p-2 text-center container bg-blue-600 hover:bg-blue-700 text-white">
                    <i class="text-lg align-middle mr-3 fi fi-rr-sign-in-alt"></i>
            
                    <span class="text">Login</span>
                </div>
            </a>
        @endauth
    </div>

</nav>
