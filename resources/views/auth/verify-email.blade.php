<x-app-layout>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Gracias por registrarse en Kool Frenzy!. Antes de continuar debemos verificar tu email para mayor seguridad, te hemos enviado un mail a la direccion especificada con un link de redirección.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Un nuevo link de verificación ha sido enviado.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Reenviar verificación') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Salir') }}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
