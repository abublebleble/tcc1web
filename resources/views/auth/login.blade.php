<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('images/logosite.png') }}" alt="Logo" class="w-20 h-20 mx-auto">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('login') }}" class="form mx-auto max-w-md">
            @csrf

            <span class="input-span">
                <label for="email" class="label">Email</label>
                <input type="email" id="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </span>

            <span class="input-span">
                <label for="password" class="label">Senha</label>
                <input type="password" id="password" name="password" required autocomplete="current-password" />
            </span>

            

            <input type="submit" class="submit" value="Entrar" />

            <span class="span">Não tem uma conta? <a href="{{ route('register') }}">Cadastrar</a></span>
        </form>
    </x-authentication-card>
</x-guest-layout>
