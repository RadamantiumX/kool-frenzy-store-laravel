<x-app-layout>
    <div class="w-[400px] mx-auto bg-emerald-500 py-2 px-3 text-white rounded">
        {{$user->name}}, Tu orden ha sido completada!!

        <a href="{{ route('home') }}" class="btn bg-indigo-500"><i class="fa-solid fa-house"></i> Volver al inicio</a>
    </div>
</x-app-layout>