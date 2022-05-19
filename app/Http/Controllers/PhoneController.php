<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;


class PhoneController extends Controller
{

    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = __('phone.index.title');
        $viewData["subtitle"] = __('phone.index.subtitle');
        $phones = Http::get('http://www.teismobilestore.tk/public/api/mobiles')->json();

        return view('phone.index', compact('phones'))->with("viewData", $viewData);
    }

    public function show($id) {
        $viewData = [];
        $viewData["title"] = __('phone.show.title');
        $viewData["subtitle"] = __('phone.show.subtitle');
        $url = 'http://www.teismobilestore.tk/public/api/mobiles' . '/' . $id;
        $phone = Http::get($url)->json();
        
        return view('phone.show', compact('phone'))->with("viewData", $viewData);
    }
}
