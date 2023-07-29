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
    <div class="sm:mx-auto sm:w-full sm:max-w-sm m-5">

        <h2 class="auth-font text-light text-2xl font-semibold text-center mb-5">
            Ingresa la nueva contraseña
        </h2>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label class="text-light" for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label class="text-light"  for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label class="text-light"  for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                <i class="fa-solid fa-lock me-3"></i>  {{ __('Reestablecer contraseña') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
</x-guest-layout>
