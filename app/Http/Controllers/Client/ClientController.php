<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client\Client;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\ProvincesController;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $cities = (new ProvincesController)->city();
        $user = Client::find(Auth::user()->id);
        return view("client.client.index", compact("user","cities"));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        foreach ($request->all() as $key => $value) {
            if($key == "password" and $value != null){
                $dataClient["password"] = Hash::make($value);
                continue;
            }
            if($key=="avatar"){
                $path= $value->store("public");
                $dataClient["$key"] = $path;
                $file=$client->avatar;
                if($client->avatar && Storage::exists($file)){
                    Storage::delete($file);
                }
                continue;
            }
            if($value != null){
                $dataClient["$key"]=$value;
            }           
        }
        // dd($dataClient);
        if(!$client->update($dataClient)){
            return redirect()->route('client.client.index')->with('error','Update unsuccesfully, please try again');
        }
        return redirect()->route('client.client.index')->with('success','Update succesfully');
        // dd($dataClient);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
