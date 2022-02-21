
<nav  class="col-start-2 p-8 pl-0 flex items-center justify-evenly bg-slate-50">
    <div class="navbar-form w-3/5">
        <form action="" method="POST">
            <label for="search">
            </label>
            <div class="input relative m-0 p-8 ">
                <div class="btn-search absolute z-10  flex justify-center items-center top-0 left-15 h-full ">
                    <i class="fi fi-rr-search text-slate-400 "></i>
                </div>
                <input type="text" placeholder="Search..." name="search" 
                class="bg-slate-50 absolute top-0 left-0 pl-16 w-4/5 h-full focus:shadow-slate-600 focus:outline-blue-400" id="search">
               
            </div>
        </form>
    </div>

    <div class="navbar ml-auto flex items-center">
        @auth
            <div class="mr-5 nav-dropdown hover:cursor-pointer hover:bg-gray-500 hover:text-white flex flex-col items-center  text-center relative border border-gray-400">
                <p class=" hover:pointer-events-none p-2  after:content-['V'] after:ml-2">Welcome, {{ auth()->user()->name }}</p>

                <div class="hidden dropdown-item absolute -bottom-20  w-full">
                    <a href="/" class="w-full inline-block py-2 hover:bg-blue-200 bg-blue-100 text-blue-600">Home</a>
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
