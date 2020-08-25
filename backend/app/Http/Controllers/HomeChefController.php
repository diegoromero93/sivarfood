<?php

namespace App\Http\Controllers;

use \App\Http\Models\HomeChef;
use Illuminate\Http\Request;

class HomeChefController extends Controller
{
    public function index(Request $request){
        $homeChefs = HomeChef::with('cuisineTypes')
            ->where('active', true)
            ->paginate(15);
        return response($homeChefs, 200);
    }
}
