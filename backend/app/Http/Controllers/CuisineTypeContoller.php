<?php

namespace App\Http\Controllers;

use App\Http\Resources\CuisineTypeResource;
use \App\Http\Models\CuisineType;
use Illuminate\Http\Request;

class CuisineTypeContoller extends Controller
{
    public function index(Request $request){
        $cuisineTypes = CuisineTypeResource::collection(CuisineType::all());
        return response($cuisineTypes, 200);
    }
}
