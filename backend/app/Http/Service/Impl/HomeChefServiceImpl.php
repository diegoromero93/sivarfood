<?php

namespace App\Http\Service\Impl;

use App\Http\Models\HomeChef;
use App\Http\Service\HomeChefService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeChefServiceImpl implements HomeChefService
{

    public function get(Request $request)
    {
        $homeChefs = HomeChef::where('active', true);
        if($request->has('cuisine_types')){
            $homeChefs->whereHas('cuisineTypes', function (Builder $query) use ($request) {
                $query->whereIn('cuisine_type_id', $request->cuisine_types);
            });
        }

        if($request->has('homechef_name')){
            $homeChefs->where('name','ilike' , '%' . $request->homechef_name . '%');
        }

        return response($homeChefs->with('cuisineTypes')->paginate(15), 200);
    }
}
