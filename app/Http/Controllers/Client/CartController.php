<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart=session()->get("cart");
        return view("client.cart.index",compact("cart"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::find($request->id);
        $cart = session()->get("cart");
        if(isset($cart[$request->id])){
            $cart[$request->id]["buyQty"] ++;
        }else{
            $cart[$request->id]=[
                "product_name"=> $product->product_name,
                "price"=> $product->price,
                "product_img"=> $product->product_img_url,
                "buyQty"=> 1
            ];
        }
        session()->put("cart",$cart);
        return redirect()->back()->with("success","$product->product_name added");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if($request->id && $request->buyQty){
            $cart = session()->get('cart',[]);
            $cart[$request->id]["buyQty"] = $request->buyQty;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            session()->flash('success','Product delete successfully');
            return redirect()->back()->with('success','Delete product successfully');
        }
    }
}
