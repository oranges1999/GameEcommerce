<?php

namespace App\Models\Client;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table="comments";
    protected $fillable = [
        "id",
        "user_id",
        "product_id",
        "score",
        "comment",
    ] ;
    public function client(){
        return $this->belongsTo(Client::class,"user_id","id");
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
