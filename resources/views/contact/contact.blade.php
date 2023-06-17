<style>
    .msg-section{
        background-image: linear-gradient(to top, rgba(50, 84, 168,0.404)0%,rgba(62, 50, 168,0.404)100%),url('https://i.postimg.cc/4x3DvY6m/red-and-dark-diagonal-grunge-background.jpg');
     background-size: cover;
     background-repeat: no-repeat;
     /*background-attachment: fixed;*/
     background-position: center;
    
    }
    .contact-title{
        font-family: 'Permanent Marker', cursive
    }
    .message-alert{
      z-index: 10000;
      background-color: green;
      font-size: 25px;
      font-weight: bold;
    }
</style>

<x-app-layout>
 <!--Mensaje si el mensaje se envio correctamente--> 
@if (session('mensaje'))
<div class="message-alert alert alert-success" role="alert">
  {{ session('mensaje') }}
</div>    
@endif
<div class="msg-section isolate  px-6 py-24 sm:py-32 lg:px-8">
  
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="contact-title text-3xl font-bold tracking-tight text-white sm:text-4xl">Mensajeria</h2>
    <p class="mt-2 text-lg leading-8 text-white">Queremos saber tu opinión, podes dejar cualquier duda que tengas. Nos pondremos en contacto a la brevedad...</p>
  </div>
  
 

  <form action="{{ route('message') }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
   @csrf
     
   
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      <div class="sm:col-span-2">
        <label for="name" class="block text-sm font-semibold leading-6 text-white">Nombre</label>
        <div class="mt-2.5">
          <input type="text" name="name" id="name" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      
      
      <div class="sm:col-span-2">
        <label for="email" class="block text-sm font-semibold leading-6 text-white">Email</label>
        <div class="mt-2.5">
          <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      
      <div class="sm:col-span-2">
        <label for="message" class="block text-sm font-semibold leading-6 text-white">Mensaje</label>
        <div class="mt-2.5">
          <textarea name="message" id="message" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
        </div>
      </div>
      <div class="flex gap-x-4 sm:col-span-2">
       
      </div>
    </div>
   
    <div class="mt-10">
      <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><i class="fa-solid fa-comment-dots"></i>  Hablemos</button>
    </div>
  </form>
</div>
</x-app-layout>