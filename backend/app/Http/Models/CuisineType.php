<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class CuisineType extends Model
{
    //

    /**
     * The home chefs that belong to the cuisine type.
     */
    public function homeChefs()
    {
        return $this->belongsToMany('App\Http\Models\HomeChef');
    }
}
