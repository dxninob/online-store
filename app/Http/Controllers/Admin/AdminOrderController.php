<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Category;
use App\Models\Computer;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{
    public function statistics()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Statistics - Online Store";
        $viewData["totalOfOrders"] = Order::all()->count();
        $viewData["totalSold"] = Order::all()->sum("total");
        $viewData["averagePrice"] = Computer::all()->avg("price");
        $viewData["totalCategories"] = Category::all()->count();
        return view('admin.order.statistics')->with("viewData", $viewData);
    }
}