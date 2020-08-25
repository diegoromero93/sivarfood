<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class HomeChef extends Model
{
    //

    /**
     * The home chef cuisine types
     */
    public function cuisineTypes()
    {
        return $this->belongsToMany('App\Http\Models\CuisineType');
    }
}
