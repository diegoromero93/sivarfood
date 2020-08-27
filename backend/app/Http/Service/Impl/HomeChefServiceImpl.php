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
                $output = new \Symfony\Component\Console\Output\ConsoleOutput();
                $output->writeln($request->cuisine_types);
                $query->whereIn('cuisine_type_id', $request->cuisine_types);
            });
        }

        return response($homeChefs->with('cuisineTypes')->paginate(15), 200);
    }
}
