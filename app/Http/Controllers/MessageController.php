<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    public function index()
    {
        $perPage = request('per_page',10);
        $search = request('search','');
        $sortField = request('sort_field','created_at');
        $sortDirection = request('sort_direction','desc');

        $query = Message::query()
           ->where('title','like',"%{$search}%")
           ->orderBy($sortField,$sortDirection)
           ->paginate($perPage);

        return MessageResource::collection($query);


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
         $message->delete();

         return response()->noContent();
    }
}
