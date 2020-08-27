<?php

namespace App\Http\Controllers;

use App\Http\Service\CuisineTypeService;
use Illuminate\Http\Request;

class CuisineTypeContoller extends Controller
{
    private $cuisineTypeService;

    public function __construct(CuisineTypeService $cuisineTypeService)
    {
        $this->cuisineTypeService = $cuisineTypeService;
    }

    public function index(Request $request)
    {
        return  $this->cuisineTypeService->get($request);
    }
}
