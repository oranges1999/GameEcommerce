<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy("id","desc")->paginate(10);
        return view("admin.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if($key=="image_url") {
                $path = $value->store("public");
                $category["$key"] = $path;
                continue;
            }
            $category["$key"]= $value;
        }
        $category['slug'] = Str::slug($request->category_name);
        $category['admin_id'] = Auth::guard('admin')->user()->id;
        Category::create($category);
        return redirect()->route("admin.categories.index")->with("success","Create category successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("admin.categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        foreach ($request->all() as $key => $value) {
            if($key=="image_url") {
                $path = $value->store("public");
                $dataCategory["$key"] = $path;
                $file = $category->image_url;
                if($category->image_url && Storage::exists($file)){
                    Storage::delete($file);
                }
                continue;
            }
            $dataCategory["$key"] = $value;
        }
        $dataCategory["slug"] = Str::slug($request->category_name);
        if(!$category->update($dataCategory)){
            return redirect()->route('admin.categories.index')->with('error','Update unsuccesfully, please try again');
        }
        return redirect()->route('admin.categories.index')->with('success','Update succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $file = $category->image_url;
        if($category->image_url && Storage::exists($file)){
            Storage::delete($file);
        }
        $categoryId = $category->id;
        if(!$category->delete()){
            DB::table('products')->where('category_id', $categoryId)->delete();
            return redirect()->route('admin.categories.index')->with('success','Delete succesfully');
        }
        return redirect()->route('admin.categories.index')->with('error','Delete unsuccesfully, please try again');
    }
}
