
    <div class=" row-span-2 sticky top-0 max-h-screen px-2 sm:px-4 md:px-8 sidebar bg-white ">
        <div class="flex items-center  h-16 mb-10">
            <h1 class="flex-grow text-center text-4xl">LMS</h1>
        </div>
        <nav class="text-slate-400">
            <ul>
               
                <li class="mb-6">
                    <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : "" }} sidebar-link flex flex-col items-center md:flex-row  md:justify-start h-full w-full hover:text-blue-600">
                        <i class="fi fi-br-dashboard  md:mr-5"></i>
                        <p class="hidden sm:block">Dashboard</p>
                    </a>
                </li>
                <li class=" mb-6">
                    <a href="/dashboard/books" class="{{ Request::is('dashboard/books') ? 'active' : "" }} sidebar-link flex flex-col items-center md:flex-row md:justify-start hover:text-blue-600 h-full w-full">
                        <i class="fi fi-br-book  md:mr-5"></i>
                        <p class="hidden sm:block">Books</p>
                    </a>
                </li>
                <li class=" mb-6">
                    <a href="/dashboard/authors" class="{{ Request::is('dashboard/authors') ? 'active' : "" }} sidebar-link flex flex-col items-center md:flex-row md:justify-start hover:text-blue-600 h-full w-full">
                        <i class="fi fi-br-address-book  md:mr-5"></i>
                        <p class="hidden sm:block">Authors</p>
                    </a>
                </li>
                <li class=" mb-6">
                    <a href="/dashboard/loan" class="{{ Request::is('dashboard/loan') ? 'active' : "" }} sidebar-link flex flex-col items-center md:flex-row md:justify-start hover:text-blue-600 h-full w-full">
                        <i class="fi fi-br-document  md:mr-5"></i>
                        <p class="hidden sm:block">Loan</p>
                    </a>
                </li>
                <li class=" mb-6">
                    <a href="/dashboard/user" class="{{ Request::is('dashboard/user') ? 'active' : "" }} sidebar-link flex flex-col items-center md:flex-row md:justify-start hover:text-blue-600 h-full w-full">
                        <i class="fi fi-br-user-add  md:mr-5"></i>
                        <p class="hidden sm:block">User</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>