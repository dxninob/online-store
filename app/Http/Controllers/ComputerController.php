<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Category;
use Illuminate\Http\Request;

class ComputerController extends Controller
{

    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = __('computer.index.title');
        $viewData["subtitle"] =  __('computer.index.subtitle');
        $viewData["categories"] = Category::all();

        $sort = $request->get('sort');
        $category = $request->get('category');
        $viewData["computers"] = [];
        $viewData["categoryExists"] = 0;

        $orderItem = "";
        $order = "";
        if ($sort == "1" || $sort == "") {
            $orderItem = "id";
            $order = "asc";
        } else if ($sort == "2") {
            $orderItem = "price";
            $order = "asc";
        } else if ($sort == "3") {
            $orderItem = "price";
            $order = "desc";
        }

        if ($category == "remove" || $category == "") {
            $viewData["computers"] = Computer::orderBy($orderItem, $order)->get();
        } else {
            $viewData["categoryExists"] = 1;
            $viewData["category"] = Category::findOrFail($category);
            $viewData["description"] = $viewData["category"]->getDescription();
            
            $viewData["computers"] = Computer::whereHas('categories', function($q) use($category){
                $q->where('category_id', $category);
            })->orderBy($orderItem, $order)->get();
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
