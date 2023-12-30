<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table="users";
    protected $fillable = [
        'id',
        'name',
        'phone',
        'address',
        'email',
        'ward',
        'city',
        'district',
    ] ;
    public function order(){
        return $this->hasMany(Order::class,'user_id','id');
    }
}
