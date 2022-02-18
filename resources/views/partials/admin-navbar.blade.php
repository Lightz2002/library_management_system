
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
