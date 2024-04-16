<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;

class FilterController extends Controller
{
    public function index()
    {
        $categories=Category::where('status','1')->get();
        return view("client.filter.index",compact("categories"));
    }
}
