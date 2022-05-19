<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = __('admin.home.index.title');
        return view('admin.home.index')->with("viewData", $viewData);
    }
}
