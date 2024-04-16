<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $fillable = [
        'id',
        'category_name',
        'slug',
        'admin_id',
        'status',
        'image_url'
    ];
    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
