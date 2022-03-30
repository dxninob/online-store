<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Computers - Online Store";
        $viewData["subtitle"] =  "List of computers";
        $viewData["computers"] = Computer::all();
        return view('computer.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData["title"] = $computer->getName()." - Online Store";
        $viewData["subtitle"] =  $computer->getName()." - Computer information";
        $viewData["computer"] = $computer;
        $viewData["shareText"] = "Te comparto este computador, creo que te podría interesar: ";
        return view('computer.show')->with("viewData", $viewData);
    }
}
