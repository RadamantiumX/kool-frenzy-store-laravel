<x-guest-layout>
    <form
        action="{{ route('register') }}"
        method="post"
        class="pt-40 sm:mx-auto sm:w-full sm:max-w-sm m-5"
    >
        @csrf

        <h2 class="text-2xl font-semibold text-center mb-4">Crea una nueva cuenta</h2>
        <p class="text-center text-gray-500 mb-3">
            o
            <a
                href="{{ route('login') }}"
                class="text-sm text-gray-900 hover:text-yellow-300"
            >
                ingresa con una cuenta existente
            </a>
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <div class="mb-4">
            <x-input placeholder="Nombre" type="text" name="name" :value="old('name')" />
        </div>
        <div class="mb-4">
            <x-input placeholder="Email" type="email" name="email" :value="old('email')" />
        </div>
        <div class="mb-4">
            <x-input placeholder="Contraseña" type="password" name="password"/>
        </div>
        <div class="mb-4">
            <x-input placeholder="Repita la Contraseña" type="password" name="password_confirmation"/>
        </div>

        <button
            class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
        >
            Registrarse
        </button>
    </form>
</x-guest-layout>
