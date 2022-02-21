<div class="sub-pages__search text-lg flex items-center text-slate-400 p-0 lg:ml-auto lg:mt-0 mt-5">
    <form action="{{ Request::is('dashboard/*') ? '/dashboard/' : '/' }}books" class="grow flex items-center lg:justify-center ">
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