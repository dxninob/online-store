<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;


class PhoneController extends Controller
{

    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = __('api.phone.index.title');
        $viewData["subtitle"] = __('api.phone.index.subtitle');
        $phones = Http::get('http://www.teismobilestore.tk/public/api/mobiles')->json();

        return view('api.phone.index', compact('phones'))->with("viewData", $viewData);
    }

    public function show($id) {
        $viewData = [];
        $viewData["title"] = __('api.phone.show.title');
        $viewData["subtitle"] = __('api.phone.show.subtitle');
        $url = 'http://www.teismobilestore.tk/public/api/mobiles' . '/' . $id;
        $phone = Http::get($url)->json();
        
        return view('api.phone.show', compact('phone'))->with("viewData", $viewData);
    }
}
