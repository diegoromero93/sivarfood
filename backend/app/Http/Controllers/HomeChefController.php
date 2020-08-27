<?php

namespace App\Http\Controllers;

use App\Http\Service\HomeChefService;
use Illuminate\Http\Request;

class HomeChefController extends Controller
{
    private $homeChefService;

    public function __construct(HomeChefService $homeChefService)
    {
        $this->homeChefService = $homeChefService;
    }

    public function index(Request $request)
    {
        return $this->homeChefService->get($request);
    }
}
