<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

//Solo se utiliza el STORE porque es del sitio web ver API
class MessageController extends Controller
{
    public function index()
    {
        


    }
    public function store(MessageRequest $request)
    {
       $data = $request->validated();
        

       $message = Message::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'message' => $data['message']
       ]);

       return redirect()->route('message')
         ->with('mensaje','Gracias por tu mensaje!');        
       
    }
    public function destroy(Message $message)
    {
         
    }
}
