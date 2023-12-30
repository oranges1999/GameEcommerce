<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = "admin";
    protected $guard = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
    ];
    public function categories(){
        return $this->hasMany(Category::class);
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
}
