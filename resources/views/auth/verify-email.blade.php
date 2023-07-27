<style>
 .verify{
    
    height: 70vh;
    /*background-image: url('https://i.postimg.cc/J0Rcf4Dx/774.jpg');*/
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
 }

 .box-verify{
    display: flex;
    flex-direction: column;
    align-items: center;
 }
</style>
<x-guest-layout>

    <div class="verify p-2">

  <div class="box-verify">
    <div class="card mt-5 bg-gray-300 p-5 rounded">
  <div class="card-body">
    <h5 class="card-title">Paso necesario para continuar</h5>
    <h6 class="card-subtitle mb-2 text-muted">Verificación de Email</h6>
    <p class="card-text"> {{ __('Gracias por registrarse en Kool Frenzy!. Antes de continuar debemos verificar tu email para mayor seguridad, te hemos enviado un mail a la direccion especificada con un link de redirección..') }}.</p>
    <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button class="mt-2">
                       {{ __('Reenviar verificación') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="outline p-2 rounded">
                   <i class="fa-solid fa-right-from-bracket"></i>  {{ __('Salir') }}
                </button>
    </form>
  </div>
</div>

</div>
</x-guest-layout>
