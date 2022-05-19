<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Home Page - Online Store";
        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData = [];
        $viewData["title"] = __('home.about.title');
        $viewData["subtitle"] =  __('home.about.subtitle');
        $viewData["description"] =  __('home.about.description');
        $viewData["author"] = __('home.about.author');
        return view('home.about')->with("viewData", $viewData);
    }
}
