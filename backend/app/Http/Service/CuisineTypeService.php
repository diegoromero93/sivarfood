<?php

namespace App\Http\Service;
use Illuminate\Http\Request;

interface CuisineTypeService
{
    public function get(Request $request);
}
