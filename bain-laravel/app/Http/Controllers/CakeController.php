<?php

namespace App\Http\Controllers;

use App\Models\Cakes;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CakeController extends Controller
{
    function index(Request $request){

       if(isset($request['search']) && $request['search']){
           $searchTerm = $request['search'];
           $cakes = Cakes::where('name', 'LIKE', "%{$searchTerm}%")->get();
       }else{
           $cakes = Cakes::all();
       }

       return new ResourceCollection($cakes);
    }

    function show(Request $request,$id){
        $cake = Cakes::where('id',$id)->first();
        return new JsonResource($cake);
    }
    function login(Request $request){
        return '1111222';
    }
}
