<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;

class Logistic extends Model
{
    use HasFactory;

    protected $table = "logistic";
    protected $fillable = [
        'id',
        'admin_id',
        'note',
    ] ;
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class,'logistic_details','logistic_id','product_id')->withPivot('qty','created_at','updated_at');
    }
}
