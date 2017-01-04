<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Order;

use App\Customer;

use App\Item;

use Auth;

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
        
        $order->item_id = $request->item;
        $order->customer_id = $request->customer;
        $order->supplier_id = $request->supplier;
        $order->user_id = Auth::id();
        $order->quantity = $request->quantity;
        $order->unit_price = $request->price;
        $order->total = $request->total;
        $order->port = $request->port;
        $order->type = $request->type;
        $order->notes = $request->notes;
        $order->transportation = $request->transportation;
        $order->location = $request->location;

        $order->save();

        $item = Item::find($request->item);
        $item->qty -= $request->quantity;

        $item->update();
        return back();
    }
    
    public function delete(Order $order){
        $order->delete();
        return back();
    }
}
