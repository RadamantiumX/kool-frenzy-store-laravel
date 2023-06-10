<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = ['type','address1','address2'.'city'];

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function country():BelongsTo
    {
        return $this->belongsTo(Country::class,'country_code','code');
    }
}
