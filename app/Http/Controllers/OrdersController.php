<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Order;

use App\Customer;

use App\Item;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::all();
        $suppliers = Supplier::all();
        $customers = Customer::all();
        $items = Item::all();

        return view('orders.index', compact('orders', 'suppliers', 'customers', 'items'));
    }

    public function store(Request $request){
        $order = new Order;

        $order->customer_id = $request->customer;
        $order->supplieer_id = $request->supplier;
        $order->quantity = $request->quantity;
        $order->paid = $request->paid;
        $order->port = $request->port;
        $order->type = $request->type;
        $order->transportation = $request->transportation;
        $order->location = $request->location;

        $order->save();

        return back();
    }
}
