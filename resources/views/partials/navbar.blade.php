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
            <div class="mr-5 nav-dropdown hover:cursor-pointer hover:bg-gray-500 hover:text-white flex flex-col items-center  text-center relative border border-gray-400">
                <p class=" hover:pointer-events-none p-2  after:content-['V'] after:ml-2">Welcome, {{ auth()->user()->name }}</p>

                <div class="hidden dropdown-item absolute -bottom-20  w-full">
                    <a href="/dashboard" class="w-full inline-block py-2 hover:bg-blue-200 bg-blue-100 text-blue-600">Dashboard</a>
                    <form action="/logout" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="flex items-center justify-evenly btn-logout left-0 w-full hover:bg-red-200 bg-red-100 text-red-900  py-2 px-3 ">
                            <p>Logout</p>
                        </button>
                    </form>
                </div>
            </div>
            
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
