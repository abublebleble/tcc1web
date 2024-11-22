<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">

<!-- Header -->
<header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-8">
            <h1 class="text-2xl font-bold text-gray-800">Progressão na Academia</h1>
        </div>

        <!-- Navegação -->
        <div class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-800 transition-colors {{ request()->routeIs('home') ? 'text-blue-500 font-semibold' : '' }}">Home</a>
            <a href="{{ route('treinos.create') }}" class="text-gray-500 hover:text-gray-800 transition-colors {{ request()->routeIs('treinos.create') ? 'text-blue-500 font-semibold' : '' }}">Criar Novo Treino</a>
            <a href="{{ route('treinos_exercicio.index') }}" class="text-gray-500 hover:text-gray-800 transition-colors {{ request()->routeIs('treinos_exercicio.index') ? 'text-blue-500 font-semibold' : '' }}">Ver Meus Treinos</a>
            <a href="{{ route('progresso.index') }}" class="text-gray-500 hover:text-gray-800 transition-colors {{ request()->routeIs('progresso.index') ? 'text-blue-500 font-semibold' : '' }}">Ver Progresso</a>
        </div>

        <!-- User menu toggle (Agora usando Alpine.js) -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="text-gray-500 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9 5-9 5-9-5 9-5z"></path>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" x-transition x-cloak class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md">
                <div class="py-1">
                    <!-- Link para o Perfil -->
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Perfil</a>
                    <!-- Link para Sair -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left">Sair</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>



<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
</body>
</html>
