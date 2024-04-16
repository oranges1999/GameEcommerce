<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy("id","desc")->paginate(10);
        return view("admin.products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view("admin.products.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if($key=="product_img_url"){
                $path=$value->store("public");
                $product["$key"]= $path;
                continue;
            }
            $product["$key"]= $value;
        }
        $product["slug"]=Str::slug($request->product_name);
        $product['admin_id'] = Auth::guard('admin')->user()->id;
        // dd($product);
        Product::create($product);
        return redirect()->route("admin.products.index")->with("success","Creat product succesfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view("admin.products.edit", compact("categories","product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        foreach ($request->all() as $key => $value) {
            if($key=="product_img_url"){
                $path=$value->store("public");
                $dataProduct["$key"]= $path;
                $file=$product->product_img_url;
                if($product->product_img_url && Storage::exists($file)){
                    Storage::delete($file);
                }
                continue;
            }
            $dataProduct["$key"]= $value;
        }
        $dataProduct["slug"]=Str::slug($request->product_name);
        $product->update($dataProduct);
        return redirect()->route("admin.products.index")->with("success","Creat product succesfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $file=$product->product_img_url;
        if($product->product_img_url && Storage::exists($file)){
            Storage::delete($file);
        }
        $product->delete();
        return redirect()->route("admin.products.index")->with("success","Delete product succesfully");
    }
}
