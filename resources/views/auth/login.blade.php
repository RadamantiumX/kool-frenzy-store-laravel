<style>
    .auth-font{
        font-family: 'Permanent Marker', cursive;
    }
    .box-auth{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>

<x-guest-layout>
    <div class="box-auth">
    <form method="POST" action="{{ route('login') }}" class=" sm:mx-auto sm:w-full sm:max-w-sm m-5">
        <h2 class="auth-font text-2xl font-semibold text-center mb-5 text-light">
            Ingresa a tu cuenta
        </h2>
        <p class="text-center text-gray-300 mb-6">
            o
            <a
                href="{{ route('register') }}"
                class="text-bold text-gray-200  hover:text-yellow-300"
            >
                Crea una nueva
            </a>
        </p>

         <!--Session Status -->
        <x-auth-session-status class="mb-4 text-light" :status="session('status')"/>

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
                <a href="{{ route('password.request') }}" class="text-sm text-gray-200 hover:text-yellow-300">
                    Olvidaste tu contraseña?
                </a>
            @endif
        </div>
        <button
            class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
        >
        <i class="fa-solid fa-arrow-right-to-bracket me-3"></i>
            Ingresar
        </button>
        
    </form>
    <a class="text-light" href="{{ route('terms') }}" >Ver los Terminos y condiciones</a>
</div>


    
</x-guest-layout>

