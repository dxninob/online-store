<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{

    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = __('computer.index.title');
        $viewData["subtitle"] =  __('computer.index.subtitle');
        $viewData["computers"] = Computer::all();

        $sort = $request->get('sort');

        if ($sort == "1") {
            $viewData["computers"] = Computer::orderBy('id', 'asc')->get();
        }
        if ($sort == "2") {
            $viewData["computers"] = Computer::orderBy('price', 'asc')->get();
        }
        if ($sort == "3") {
            $viewData["computers"] = Computer::orderBy('price', 'desc')->get();
        }

        return view('computer.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData["title"] = $computer->getName() . __('computer.show.title');
        $viewData["subtitle"] =  $computer->getName() . __('computer.show.subtitle');
        $viewData["computer"] = $computer;
        $viewData["shareText"] = __('computer.show.shareText');
        return view('computer.show')->with("viewData", $viewData);
    }
}
