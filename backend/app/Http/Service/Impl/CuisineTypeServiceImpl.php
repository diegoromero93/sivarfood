<?php

namespace App\Http\Service\Impl;

use App\Http\Models\CuisineType;
use App\Http\Resources\CuisineTypeResource;
use App\Http\Service\CuisineTypeService;
use Illuminate\Http\Request;

class CuisineTypeServiceImpl implements CuisineTypeService
{

    public function get(Request $request)
    {
        $cuisineTypes = CuisineTypeResource::collection(CuisineType::all());
        return response($cuisineTypes, 200);
    }
}
