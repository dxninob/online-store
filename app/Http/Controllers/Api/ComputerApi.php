<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ComputerCollection;
use App\Http\Controllers\Controller;
use App\Models\Computer;

class ComputerApi extends Controller
{
    public function index()
    {
        return new ComputerCollection(Computer::all());
    }

    public function paginate()
    {
        return new ComputerCollection(Computer::paginate(5));
    }
}