<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Supplier;

use App\Item;

use Auth;

class SuppliersController extends Controller
{

	public function index(){

		$suppliers = Supplier::all();
		return view('suppliers.index', compact('suppliers'));

	}


	public function show(Supplier $supplier){
		$items = Item::all();

		return view('suppliers.show', compact('supplier', 'items'));

	}

	public function store(Request $request){

		$this->validate($request, [
			'name' => 'required'
		]);
		$supplier = new Supplier;

		$supplier->name = $request->name;
		$supplier->phone = $request->phone;
		$supplier->address = $request->address;
		$supplier->user_id = Auth::id();
		$supplier->save();

		return back();
	}

	public function itemStore(Supplier $supplier, Request $request){

        $this->validate($request, [
           'item' => 'required'
        ]);

//		BOTH SYNTAX ARE RIGHT
//		$supplier->items()->attach($request->item, ['price' => $request->price, 'quantity' => $request->quantity]);
		$supplier->items()->attach([$request->item =>
			[
				'type' => $request->type,
				'quantity' => $request->quantity,
				'price' => $request->price,
				'currency' => $request->currency,
				'total'=> $request->total,
				'port' => $request->port,
				'notes' => $request->notes
			]
		]);

        $item = Item::find($request->item);
        $item->qty += $request->quantity;

        $item->update();
		return back();
	}
	

	public function update(Request $request, Supplier $item){
		$item->update($request->all());
		return back();
	}

	public function delete(Supplier $supplier){
		$supplier->delete();
		return back();
	}

	public function edit(Supplier $supplier){
	    return view('suppliers.edit', compact('supplier'));
    }
}
