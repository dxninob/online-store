<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Category;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{
    public function statistics()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Statistics - Online Store";
        $viewData["totalOfOrders"] = Order::all()->count();
        $viewData["totalSold"] = Order::all()->sum("total");
        $categories = Category::all();
        foreach ($categories as $category) {
            $viewData["category_" . $category] = Category::where('name', $category)->get()->count();
        }
        $viewData["categories"] = $categories;
        return view('admin.order.statistics')->with("viewData", $viewData);
    }
}
