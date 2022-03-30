<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Order;
use App\Models\OrderComputer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $computersInOrder = [];

        $computersInSession = $request->session()->get("computers");
        if ($computersInSession) {
            $computersInOrder = Computer::findMany(array_keys($computersInSession));
            $total = Computer::sumPricesByQuantities($computersInOrder, $computersInSession);
        }

        $viewData = [];
        $viewData["title"] = "Order - Online Store";
        $viewData["subtitle"] =  "Shopping Order";
        $viewData["total"] = $total;
        $viewData["computers"] = $computersInOrder;
        return view('order.index')->with("viewData", $viewData);
    }

    public function add(Request $request, $id)
    {
        $computers = $request->session()->get("computers");
        $computers[$id] = $request->input('quantity');
        $request->session()->put('computers', $computers);

        return redirect()->route('order.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('computers');
        return back();
    }

    public function purchase(Request $request)
    {
        $computersInSession = $request->session()->get("computers");
        if ($computersInSession) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->save();

            $total = 0;
            $computersInOrder = Computer::findMany(array_keys($computersInSession));
            foreach ($computersInOrder as $computer) {
                $quantity = $computersInSession[$computer->getId()];
                $item = new OrderComputer();
                $item->setQuantity($quantity);
                $item->setPrice($computer->getPrice());
                $item->setComputerId($computer->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($computer->getPrice()*$quantity);
            }
            $order->setTotal($total);
            $order->save();

            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();

            $request->session()->forget('computers');

            $viewData = [];
            $viewData["title"] = "Purchase - Online Store";
            $viewData["subtitle"] =  "Purchase Status";
            $viewData["order"] =  $order;
            return view('order.purchase')->with("viewData", $viewData);
        } else {
            return redirect()->route('order.index');
        }
    }

    public function list()
    {
        $viewData = [];
        $viewData["title"] = "My Orders - Online Store";
        $viewData["subtitle"] =  "My Orders";
        $viewData["orders"] = Order::with(['items.computer'])->where('user_id', Auth::user()->getId())->get();
        return view('order.list')->with("viewData", $viewData);
    }
}
