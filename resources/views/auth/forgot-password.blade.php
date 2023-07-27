<x-guest-layout>

    <form action="{{ route('password.email') }}" method="POST" class="pt-40 sm:mx-auto sm:w-full sm:max-w-sm m-5">
        @csrf
        <h2 class="text-2xl font-semibold text-center mb-5">
            Ingresa el email de tu cuenta para reestablecer una nueva contraseña
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <p class="text-center text-gray-500 mb-6">
            o
            <a
                href="{{ route('login') }}"
                class="text-purple-600 hover:text-purple-500"
            >
                Ingresa con una cuenta existente
            </a>
        </p>

        <div class="mb-3">
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                     autofocus placeholder="Ingresa tu cuenta de email"/>
        </div>
        <button
            class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
        >
            Link para reestablecimiento de contraseña
        </button>
    </form>
</x-guest-layout>
