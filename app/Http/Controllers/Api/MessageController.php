<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    public function index()
    {
        $perPage = request('per_page',5);
        $search = request('search','');
        $sortField = request('sort_field','created_at');
        $sortDirection = request('sort_direction','desc');

        $query = Message::query()
          ->orderBy($sortField,$sortDirection)
          ->paginate($perPage);

       return MessageResource::collection($query);   
    }
    public function store()
    {

    }
    public function show()
    {

    }
    public function update()
    {

    }
    public function destroy(Message $message)
    {
        $message->delete();
        return response()->noContent();
    }
}
