<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('images/logosite.png') }}" alt="Logo" class="w-20 h-20 mx-auto">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="form mx-auto max-w-md">
            @csrf

            <span class="input-span">
                <label for="name" class="label">Nome</label>
                <input type="text" id="name" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </span>

            <span class="input-span">
                <label for="email" class="label">Email</label>
                <input type="email" id="email" name="email" :value="old('email')" required autocomplete="username" />
            </span>

            <span class="input-span">
                <label for="password" class="label">Senha</label>
                <input type="password" id="password" name="password" required autocomplete="new-password" />
            </span>

            <span class="input-span">
                <label for="password_confirmation" class="label">Confirmar Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" />
            </span>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('Eu concordo com os :terms_of_service e :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Termos de Serviço').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Política de Privacidade').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <input type="submit" class="submit" value="Cadastrar" />

            <span class="span">Já tem uma conta? <a href="{{ route('login') }}">Entrar</a></span>
        </form>
    </x-authentication-card>
</x-guest-layout>
