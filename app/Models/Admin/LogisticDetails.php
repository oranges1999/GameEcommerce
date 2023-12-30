<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogisticDetails extends Model
{
    use HasFactory;
    protected $table = 'logistic_details';
    protected $fillable = [
        'id',
        'logistic_id',
        'product_id',
        'qty',
    ];
}
