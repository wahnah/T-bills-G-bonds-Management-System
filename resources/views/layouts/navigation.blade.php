<nav x-data="{ open: false }" class="bg-white border-b- border-purple-600">
    <style>
        /* Apply the custom background color */
        .custom-background {
          background-color: #f3f4f6;
          background-image: url("data:image/svg+xml,%3Csvg width='6' height='6' viewBox='0 0 6 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%239C92AC' fill-opacity='0.4' fill-rule='evenodd'%3E%3Cpath d='M5 0h1L0 6V5zM6 5v1H5z'/%3E%3C/g%3E%3C/svg%3E");
        }
      </style>
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600"/>
                    </a>
                    <p class="bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-gray-600" style="font-size: 16px;
                    font-weight: bold;
                    margin-left: 5px;"> GSM System</p>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:items-center sm:ml-60 sm:flex" style="display: flex;
                justify-content: center;
                align-items: center;">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Portifolio') }}
                    </x-nav-link>




                    @if (Auth::check() && Auth::user()->role == 1)
                        <x-nav-link :href="route('admin.lots.create')" :active="request()->routeIs('admin.lots.create')">
                            {{ __('Create lot') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.auctions.index')" :active="request()->routeIs('admin.auctions.index')">
                            {{ __('Create Auctions') }}
                        </x-nav-link>


                        <x-nav-link :href="route('admin.pdfs.view')" :active="request()->routeIs('admin.pdfs.view')">
                            {{ __('Generate Pdfs') }}
                        </x-nav-link>
                    @else

                    <x-nav-link :href="route('lots.myresells')" :active="request()->routeIs('lots.myresells')">
                        {{ __('My sells') }}
                    </x-nav-link>
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center  text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ __('Markets') }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">

                                <x-dropdown-link :href="route('markets.primary')">
                                    {{ __('Primary market') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('markets.secondary')">
                                    {{ __('secondary market') }}
                                </x-dropdown-link>

                            </x-slot>
                        </x-dropdown>
                        <x-nav-link :href="route('auction')" :active="request()->routeIs('auction')">
                            {{ __('Auctions') }}
                        </x-nav-link>

                        <x-nav-link :href="route('tools')" :active="request()->routeIs('tools')">
                            {{ __('Tools') }}
                        </x-nav-link>
                    @endif


                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <x-avatar />
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            <x-dropdown-link :href="route('profile.edit', Auth::id())">
                                {{ __('Edit profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('transactions', Auth::id())">
                                {{ __('Transactions') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('myBids')">
                                {{ __('My Bids') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('slip')">
                                {{ __('Upload Deposit slips') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>

                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('lots.index')" :active="request()->routeIs('lots.index')">
                {{ __('Lots') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('lots.create')" :active="request()->routeIs('lots.create')">
                {{ __('Create lot') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <x-responsive-nav-link :href="route('login')">
                {{ __('Log in') }}
            </x-responsive-nav-link>
            @if (Route::has('register'))
                <x-responsive-nav-link :href="route('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            @endif
        @endauth
    </div>
</nav>
