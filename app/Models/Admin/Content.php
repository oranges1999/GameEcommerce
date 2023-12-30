<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table="comments";
    protected $fillable = [
        "id",
        "user_id",
        "product_id",
        "content",
    ] ;
    public function client(){
        return $this->belongsTo(Admin::class,"user_id","id");
    }
}
