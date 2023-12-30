<?php

namespace App\Models\Admin;

use App\Models\Client\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Comment;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'id',
        'product_name',
        'slug',
        'category_id',
        'qty',
        'admin_id',
        'price',
        'product_img_url',
        'status',
        'content',
    ] ;
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function order(){
        return $this->belongsToMany(Order::class,'order_details','product_id','order_id')->withPivot('qty','price');
    }
    public function comment(){
        return $this->hasMany(Comment::class,'product_id','id');
    }
    public function logistic(){
        return $this->belongsToMany(Logistic::class,'logistic_details','product_id','logistic_id')->withPivot('qty','created_at','updated_at');
    }
}
