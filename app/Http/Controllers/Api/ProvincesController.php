<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProvincesController extends Controller
{
    public function city (){
        $apiURL = 'https://provinces.open-api.vn/api/p/';
        
        $headers = [
            'Access-Control-Allow-Origin'       => '*',
            'Access-Control-Allow-Methods'      => 'HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS',
            'Access-Control-Allow-Credentials'  => 'true',
            'Access-Control-Max-Age'            => '86400',
            'Access-Control-Allow-Headers'      => 'Origin, Content-Type, X-Auth-Token,  Accept, Authorization, X-Requested-With'
        ];
        
        $response = Http::withHeaders($headers)->get($apiURL);
        $cities = json_decode($response->getBody(), true);
        return $cities;

    }
    public function district (Request $request){
        $apiURL = 'https://provinces.open-api.vn/api/p/'.$request->city.'?depth=2';
        
        $headers = [
        'Access-Control-Allow-Origin'       => '*',
        'Access-Control-Allow-Methods'      => 'HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS',
        'Access-Control-Allow-Credentials'  => 'true',
        'Access-Control-Max-Age'            => '86400',
        'Access-Control-Allow-Headers'      => 'Origin, Content-Type, X-Auth-Token,  Accept, Authorization, X-Requested-With'
        ];
        
        $response = Http::withHeaders($headers)->get($apiURL);
        
        $statusCode = $response->status();            
        
        $output='<option>Select district</option>';
        if ($statusCode == 200) {
            $responseDistricts = json_decode($response->getBody(), true);
            foreach($responseDistricts["districts"] as $district){
                $output .= '<option data-id="'.$district["code"].'" value="'.$district["name"].'">'.$district["name"].'</option>';
            }
            return response()->json($output);
        } 
        // if ($statusCode == 200) {
        //     $responseDistrict = json_decode($response->getBody(), true);
        //     return response()->json($responseDistrict);
        // } 

    }
    public function ward (Request $request){
        $apiURL = 'https://provinces.open-api.vn/api/d/'.$request->district.'?depth=2';
        
        $headers = [
        'Access-Control-Allow-Origin'       => '*',
        'Access-Control-Allow-Methods'      => 'HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS',
        'Access-Control-Allow-Credentials'  => 'true',
        'Access-Control-Max-Age'            => '86400',
        'Access-Control-Allow-Headers'      => 'Origin, Content-Type, X-Auth-Token,  Accept, Authorization, X-Requested-With'
        ];
        
        $response = Http::withHeaders($headers)->get($apiURL);
        
        $statusCode = $response->status();            
        
        $output='<option>Select ward</option>';
        if ($statusCode == 200) {
            $responseWards = json_decode($response->getBody(), true);
            foreach($responseWards["wards"] as $ward){
                $output .= '<option data-id="'.$ward["code"].'" value="'.$ward["name"].'">'.$ward["name"].'</option>';
            }
            return response()->json($output);
        } 

    }
}
