<nav x-data="{ open: false, accountOpen: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="block h-16 w-auto" src="{{ asset('images/logosite.png') }}" alt="Logo" />
                    </a>
                </div>

                <!-- Navigation Links (Desktop version) -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                    <x-nav-link href="{{ route('treinos.create') }}" :active="request()->routeIs('treinos.create')" class="text-gray-900 hover:bg-green-500 hover:text-white">
                        {{ __('Criar Novo Treino') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('treinos_exercicio.index') }}" :active="request()->routeIs('treinos_exercicio.index')" class="text-gray-900 hover:bg-green-500 hover:text-white">
                        {{ __('Ver Meus Exercícios') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('progresso.index') }}" :active="request()->routeIs('progresso.index')" class="text-gray-900 hover:bg-green-500 hover:text-white">
                        {{ __('Ver Progresso') }}
                    </x-nav-link>

                    <!-- Admin only Links -->
                    @if (auth()->check() && auth()->user()->is_admin)
                        <x-nav-link href="{{ route('exercicios.index') }}" :active="request()->routeIs('exercicios.index')" class="text-gray-900 hover:bg-green-500 hover:text-white">
                            {{ __('Exercícios') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('grupos_musculares.index') }}" :active="request()->routeIs('grupos_musculares.index')" class="text-gray-900 hover:bg-green-500 hover:text-white">
                            {{ __('Grupos Musculares') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings & Hamburger for Mobile -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-green-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-900 bg-white hover:bg-green-500 hover:text-white focus:outline-none focus:bg-green-700 active:bg-green-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}
                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger Menu for Mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="sm:hidden" x-show="open" @click.away="open = false">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <x-nav-link href="{{ route('treinos.create') }}" :active="request()->routeIs('treinos.create')" class="text-gray-900 hover:bg-green-500 hover:text-white">
                {{ __('Criar Novo Treino') }}
            </x-nav-link>

            <x-nav-link href="{{ route('treinos_exercicio.index') }}" :active="request()->routeIs('treinos_exercicio.index')" class="text-gray-900 hover:bg-green-500 hover:text-white">
                {{ __('Ver Meus Exercícios') }}
            </x-nav-link>

            <x-nav-link href="{{ route('progresso.index') }}" :active="request()->routeIs('progresso.index')" class="text-gray-900 hover:bg-green-500 hover:text-white">
                {{ __('Ver Progresso') }}
            </x-nav-link>

            @if (auth()->check() && auth()->user()->is_admin)
                <x-nav-link href="{{ route('exercicios.index') }}" :active="request()->routeIs('exercicios.index')" class="text-gray-900 hover:bg-green-500 hover:text-white">
                    {{ __('Exercícios') }}
                </x-nav-link>

                <x-nav-link href="{{ route('grupos_musculares.index') }}" :active="request()->routeIs('grupos_musculares.index')" class="text-gray-900 hover:bg-green-500 hover:text-white">
                    {{ __('Grupos Musculares') }}
                </x-nav-link>
            @endif

            <!-- Manage Account in Mobile -->
            <div class="pt-4">
                <button @click="accountOpen = !accountOpen" class="w-full text-left px-4 py-2 text-gray-900 hover:bg-green-500 hover:text-white">
                    {{ __('Manage Account') }}
                </button>
                <div x-show="accountOpen" class="space-y-2 mt-2">
                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
