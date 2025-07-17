<nav x-data="{ open: false }" class="bg-white shadow-md p-4 mb-6">
    <!-- Primary Navigation Menu -->
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-2xl font-bold text-blue-600">📍GeoQRNav</div>

        <!-- Navigation Links -->
        <div class="hidden sm:flex space-x-4">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                        class="text-gray-700 hover:text-blue-500">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('parcours.index')" :active="request()->routeIs('parcours.*')" 
                        class="text-gray-700 hover:text-blue-500">
                {{ __('Parcours') }}
            </x-nav-link>
            <x-nav-link :href="route('parcours.create')" :active="request()->routeIs('parcours.create')" 
                        class="text-gray-700 hover:text-blue-500">
                {{ __('Créer un parcours') }}
            </x-nav-link>
            <x-nav-link :href="route('sites.index')" :active="request()->routeIs('sites.*')" 
                        class="text-gray-700 hover:text-blue-500">
                {{ __('Sites') }}
            </x-nav-link>
            <x-nav-link :href="route('sites.create')" :active="request()->routeIs('sites.create')" 
                        class="text-gray-700 hover:text-blue-500">
                {{ __('Créer un site') }}
            </x-nav-link>
            <x-nav-link :href="route('qr')" :active="request()->routeIs('qr')" 
                        class="text-gray-700 hover:text-blue-500">
                {{ __('Générer un QRcode') }}
            </x-nav-link>
        </div>

        <!-- Settings Dropdown -->
        <div class="hidden sm:flex space-x-2">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="px-3 py-1 border border-blue-600 text-blue-600 rounded hover:bg-blue-50 inline-flex items-center">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Hamburger -->
        <div class="flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-blue-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                                   class="text-gray-700 hover:text-blue-500">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('parcours.index')" :active="request()->routeIs('parcours.*')" 
                                   class="text-gray-700 hover:text-blue-500">
                {{ __('Parcours') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('parcours.create')" :active="request()->routeIs('parcours.create')" 
                                   class="text-gray-700 hover:text-blue-500">
                {{ __('Créer un parcours') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('sites.index')" :active="request()->routeIs('sites.*')" 
                                   class="text-gray-700 hover:text-blue-500">
                {{ __('Sites') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('sites.create')" :active="request()->routeIs('sites.create')" 
                                   class="text-gray-700 hover:text-blue-500">
                {{ __('Créer un site') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('qr')" :active="request()->routeIs('qr')" 
                                   class="text-gray-700 hover:text-blue-500">
                {{ __('Générer un QRcode') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" 
                                       class="text-gray-700 hover:text-blue-500">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-gray-700 hover:text-blue-500">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>