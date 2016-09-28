<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Item;

use App\Supplier;

use Auth;

class ItemsController extends Controller
{
	public function index(){

		$items = item::all();

		return view('items.index', compact('items'));
	}


	public function show(Item $item){

		return view('items.show', compact('item'));
	}

	public function  store(Request $request, Supplier $supplier){

		$this->validate($request, [
			'name' => 'required'
		]);

		$item = new Item;
		$item->name = $request->name;
		$item->user_id = Auth::id();
		$item->price = $request->price;
		$item->qty = $request->qty;

		$supplier->items()->save($item);
		// $item->supplier_id = $supplier->id;

		// return $request->all();

		return back();   // redirect to the last page

	}

	public function edit(Item $item){

		return view('items.edit', compact('item'));
	}

    public function update(Request $request, Item $item){
    	$item->update($request->all());
    	return back();
    }

	public function delete(Item $item){
		$item->delete();
		return back();
	}
}
