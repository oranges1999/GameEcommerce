<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartIndexController extends Controller
{
    public function index(){
        return view("client.cart.index");
    }
}
