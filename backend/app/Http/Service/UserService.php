<?php

namespace App\Http\Service;
use Illuminate\Http\Request;

interface UserService
{
    public function save(Request $request);
}
