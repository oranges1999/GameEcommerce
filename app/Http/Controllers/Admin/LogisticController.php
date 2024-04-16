<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Logistic;
use App\Models\Admin\LogisticDetails;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Auth;


class LogisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logistics = Logistic::paginate("10");
        return view('admin.logistic.index',compact('logistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products=Product::all();
        return view('admin.logistic.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $logistic["admin_id"] = Auth::guard("admin")->user()->id;
        if($request->note==null){
            $logistic["note"]="Nhập hàng";
        }else{
            $logistic["note"] = $request->note;
        }
        Logistic::create($logistic);
        $id = Logistic::orderBy("id","desc")->where("admin_id",$logistic["admin_id"])->where("note",$logistic["note"])->first()->id;
        foreach($request->product as $product_id=>$qty){
            $logistic_details["logistic_id"]=$id;
            $logistic_details["product_id"]=$product_id;
            $logistic_details["qty"]=$qty;
            LogisticDetails::create($logistic_details);
        }
        return redirect()->route("admin.logistic.index")->with("success","Import Product Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $logistic = Logistic::where("id",$id)->first();
        return view('admin.logistic.show',compact('logistic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $logistic=Logistic::where("id",$id)->first();
        $products=Product::all();
        return view("admin.logistic.edit",compact("logistic","products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Logistic $logistic)
    {
        if($request->has("product")){
            $dataLogistic["note"]=$request->note;
            $logistic->update($dataLogistic);
            LogisticDetails::where("logistic_id",$logistic->id)->delete();
            foreach($request->product as $key=>$qty){
                $logistic_details["logistic_id"]=$logistic->id;
                $logistic_details["product_id"]=$key;
                $logistic_details["qty"]=$qty;
                LogisticDetails::create($logistic_details);
            }
            return redirect()->route("admin.logistic.index")->with("success","Update succesfully");
        }else{
            return redirect()->back()->with("error","Product field must not be empty");
        }
      
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LogisticDetails::where("logistic_id",$id)->delete();
        Logistic::where("id",$id)->delete();
        return redirect()->back()->with("success","Delete Succesfully");
    }
}
