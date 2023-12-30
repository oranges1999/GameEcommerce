<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::orderBy("id","desc")->paginate(10);
        return view("admin.admin.index", compact("admin"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.admin.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if($key=="password"){
                $admin["$key"]=Hash::make($value);
                continue;
            }
            if($key=="avatar"){
                $path= $value->store("public");
                $admin["$key"] = $path;
                continue;
            }
            $admin["$key"]=$value;
        }
        // dd($admin);
        Admin::create($admin);
        return redirect()->route('admin.admin.index')->with('success','Create admin succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        
        foreach ($request->all() as $key => $value) {
            if($key=="password"){
                $dataAdmin["$key"] = Hash::make($value);
                continue;
            }
            if($key=="avatar"){
                $path= $value->store("public");
                $dataAdmin["$key"] = $path;
                $file=$admin->avatar;
                if($admin->avatar && Storage::exists($file)){
                    Storage::delete($file);
                }
                continue;
            }
            $dataAdmin["$key"]=$value;
        }
        if(!$admin->update($dataAdmin)){
            return redirect()->route('admin.admin.index')->with('error','Update unsuccesfully, please try again');
        }
        return redirect()->route('admin.admin.index')->with('success','Update succesfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $file=$admin->avatar;
        if($admin->avatar && Storage::exists($file)){
            Storage::delete($file);
        }
        if(!$admin->delete()){
            return redirect()->route('admin.admin.index')->with('error','Delete unsuccesfully, please try again');
        }
        return redirect()->route('admin.admin.index')->with('success','Delete succesfully');
    }
}
