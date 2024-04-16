<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;

class ApiFilterController extends Controller
{
    public function index()
    {
        $products=Product::where('status','1')->get();
        $dataProducts=$this->renderProducts($products);
        return response()->json($dataProducts);
    }
    public function show(Request $request){
        if($request->name=="category"){
            $products=Product::where('category_id',$request->id)->get();
            $output=$this->renderProducts($products);
        }
        if($request->name=="price"){
            if($request->min==null||$request->max==null){
                if($request->min==null){
                    $products=Product::where('price','<=',$request->max)->get();
                    $output=$this->renderProducts($products);
                }
                if($request->max==null){
                    $products=Product::where('price','>=',$request->min)->get();
                    $output=$this->renderProducts($products);
                }
            }else{
                $products=Product::whereBetWeen('price',[$request->min,$request->max])->get();
                $output=$this->renderProducts($products);
            }
        }
        return response()->json($output);
    }
    private function renderProducts($products){
        $output='';
        $score='';
        foreach($products as $product){
            if(round($product->comment->where("status","1")->avg("score"))==5){
                $score.='
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>';
            }
            if(round($product->comment->where("status","1")->avg("score"))==4){
                $score.='
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-regular fa-star"></i>';
            }
            if(round($product->comment->where("status","1")->avg("score"))==3){
                $score.='
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>';
            }
            if(round($product->comment->where("status","1")->avg("score"))==2){
                $score.='
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>';
            }
            if(round($product->comment->where("status","1")->avg("score"))==1){
                $score.='
                <i class="fa-solid fa-star" style="color: #c6ed02;"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>';
            }  
            $output.='
                <div class="feature-item fi col-6 col-md-3 col-sm-6">
                    <a href="'.route("client.product.show",$product->id).'">
                        <div class="recent" hidden>
                            '.$product->id.'
                        </div>
                        <div class="">
                            <img class="" width="100%" src="'.asset(str_replace("public","storage",$product->product_img_url)).'" alt="">
                        </div>
                        <div>
                            <div class="feature-name">
                                '.$product->product_name.'
                            </div>
                            <div class="rate">
                            '.$score.'
                            </div>
                            <div class="feature-price d-flex justify-content-start">
                                <div class="price-after">'.number_format($product->price).'VND</div>
                            </div>
                        </div>
                    </a>
                </div>
            ';
            $score='';
        }
        return $output;
    }
}
