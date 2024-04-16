<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;

class Order extends Model
{
    use HasFactory;

    protected $table="orders";
    protected $fillable = [
        "id",
        "user_id",
        "status",
        "total",
        "district",
        "ward",
        "city",
        "phone",
        "address",
    ] ;

    public function client(){
        return $this->belongsTo(Client::class,"user_id","id");
    }
    public function product(){
        return $this->belongsToMany(Product::class,"order_details","order_id","product_id")->withPivot('qty','price');
    }

}
