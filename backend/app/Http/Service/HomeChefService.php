<?php

namespace App\Http\Service;
use Illuminate\Http\Request;

interface HomeChefService
{
    public function get(Request $request);
}
