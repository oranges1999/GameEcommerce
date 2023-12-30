<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $products = Product::where('product_name', 'LIKE', '%' . $request->search . '%')->get();
            if ($products) {
                foreach ($products as $key => $product) {
                    $href = route("client.product.show",$product->id);
                    $product_img = asset(str_replace("public","storage",$product->product_img_url));
                    $output .= 
                    '<a href="'.$href.'">
                        <div class="search-item d-flex">  
                            <div><img width="100px" src="'.$product_img.'" alt=""></div>
                            <div>'.$product->product_name.'</div>
                            <div>'.$product->price.'</div>                      
                        </div>
                    </a>';
                }
            }
        return response()->json($output);
        }
    }

}
