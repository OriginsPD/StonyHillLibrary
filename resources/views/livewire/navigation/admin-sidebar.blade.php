<div class="w-2/12 h-screen bg-gray-800 mt-8 sm:mt-0">



    <nav class="mt-10">

        <a class="flex items-center py-2 px-8 bg-gray-700 text-gray-100 border-r-4 border-gray-100" href="{{ route('admin.dashboard') }}">

            <i class="fal fa-chart-network"></i>

            <span class="mx-4 font-medium">Dashboard</span>

        </a>

        <a class="flex items-center mt-5 py-2 px-8 text-gray-400 border-r-4 border-gray-800 hover:bg-gray-700
                  hover:text-gray-100 hover:border-gray-100"
           href="{{ route('admin.books') }}">

            <i class="fas fa-books-medical"></i>

            <span class="mx-4 font-medium">Books</span>

        </a>

        <a class="flex items-center mt-5 py-2 px-8 text-gray-400 border-r-4 border-gray-800 hover:bg-gray-700
                  hover:text-gray-100 hover:border-gray-100"
           href="{{ route('admin.issue') }}">

            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <path d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>

            </svg>

            <span class="mx-4 font-medium">Books Issue</span>

        </a>

        <a class="flex items-center mt-5 py-2 px-8 text-gray-400 border-r-4 border-gray-800 hover:bg-gray-700
                  hover:text-gray-100 hover:border-gray-100"
           href="{{ route('admin.clients') }}">

            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <path d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>

            </svg>

            <span class="mx-4 font-medium">Create Clients</span>

        </a>

        <a wire:click.prevent="logout"
            class="flex items-center mt-5 py-2 px-8 text-gray-400 border-r-4 border-gray-800 hover:bg-gray-700
                  hover:text-gray-100 hover:border-gray-100"
           href="#">

            <i class="far fa-sign-out-alt"></i>

            <span class="mx-4 font-medium">Logout</span>

        </a>
    </nav>

</div>
