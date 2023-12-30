<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table="order_details";
    protected $fillable = [
        "id",
        "order_id",
        "product_id",
        "qty",
        "price",
    ] ;

}
