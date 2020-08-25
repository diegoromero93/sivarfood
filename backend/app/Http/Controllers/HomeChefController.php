<?php

namespace App\Http\Controllers;

use App\Http\Models\CuisineType;
use \App\Http\Models\HomeChef;
use Illuminate\Http\Request;

class HomeChefController extends Controller
{
    public function index(Request $request){
        $lasMixeaditas = HomeChef::find(2);
        //$cuisineTypes = CuisineType::all();
        /*foreach($cuisineTypes as $item  ){

            //$item->homeChefs()->attach($lasMixeaditas);
            //$lasMixeaditas->cuisineTypes()->attach($item->id);
        }*/
        //$lasMixeaditas->attach
        return $lasMixeaditas->toJson();
    }
}
