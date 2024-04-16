<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_product extends Model
{
    use HasFactory;

    protected $table = "user_product";

    protected $fillable = [
        "id",
        "user_id",
        "product_id",
        "product_price",
        "product_qty"
    ] ;
}
