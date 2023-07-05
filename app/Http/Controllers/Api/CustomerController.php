<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerListResource;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $perPage = request('per_page',10);
        $search = request('search','');
        $sortField = request('sort_field','created_at');
        $sortDirection = request('sort_direction','desc');

        $query = Customer::query()
          ->orderBy($sortField,$sortDirection)
          ->paginate($perPage);

       return CustomerListResource::collection($query);

    }
    public function store()
    {
        
    }
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
        
    }
    public function update()
    {
        
    }
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->noContent();
    }
}
