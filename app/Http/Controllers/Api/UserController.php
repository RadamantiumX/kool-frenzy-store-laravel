<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $perPage = request('per_page',10);
        $search = request('search','');
        $sortField = request('sort_field','updated_at');
        $sortDirection = request('sort_direction','desc');

        $query = User::query()
          ->orderBy($sortField,$sortDirection)
          ->paginate($perPage);


        return UserResource::collection($query);  
    }

    public function store(CreateUserRequest $request)
    {
         $data = $request->validated();
         $data['is_admin']=false;
         $data['email_verified_at'] = date('Y-m-d H:i:s');
         $data['password'] = Hash::make($data['password']);

         $data['created_by'] = $request->user()->id;
         $data['updated_by'] = $request->user()->id;

         $user = User::create($data);

         return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
       $data = $request->validated();

       if(!empty($data['passsword'])){
        $data['password'] = Hash::make($data['password']);
       }
       $data['updated_by'] = $request->user()->id;
       $user->update($data);

       return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->noContent();
    }
}
