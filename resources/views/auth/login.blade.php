<x-guest-layout>
    
    <form method="POST" action="{{ route('login') }}" class="pt-40 sm:mx-auto sm:w-full sm:max-w-sm m-5">
        <h2 class="text-2xl font-semibold text-center mb-5">
            Ingresa a tu cuenta
        </h2>
        <p class="text-center text-gray-900 mb-6">
            o
            <a
                href="{{ route('register') }}"
                class="text-bold text-gray-900  hover:text-yellow-300"
            >
                Crea una nueva
            </a>
        </p>

         <!--Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        @csrf
        <div class="mb-4">
            <x-input type="email" name="email" placeholder="Your email address" :value="old('email')"/>
        </div>
        <div class="mb-4">
            <x-input type="password" name="password" placeholder="Your password" :value="old('password')" />
        </div>
        <div class="flex justify-between items-center mb-5">
            <div class="flex items-center">
                <input
                    id="loginRememberMe"
                    type="checkbox"
                    class="mr-3 rounded border-gray-300 text-purple-500 focus:ring-purple-500"
                />
                <label for="loginRememberMe">Recordarme</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-gray-900 hover:text-yellow-300">
                    Olvidaste tu contraseña?
                </a>
            @endif
        </div>
        <button
            class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
        >
            Ingresar
        </button>
    </form>



    
</x-guest-layout>

