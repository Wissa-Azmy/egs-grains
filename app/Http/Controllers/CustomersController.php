<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Customer;

use Auth;

class CustomersController extends Controller
{
    
    public function index(){

		$customers = Customer::all();
		return view('customers.index', compact('customers'));

	}


	public function show(Customer $customer){

		return view('customers.show', compact('customer'));

	}

	public function store(Request $request){

		$this->validate($request, [
			'name'=>'required'
		]);
		$customer = new Customer;

		$customer->name = $request->name;
		$customer->phone = $request->phone;
		$customer->address = $request->address;
		$customer->user_id = Auth::id();

		$customer->save();

		return back();

	}

    public function edit(Customer $customer){

        return view('customers.edit', compact('customer'));

    }

    public function update(Request $request, Customer $customer){
        $customer->update($request->all());
        return back();
    }

	public function delete(Customer $customer){
	    $customer->delete();

        return back();
    }

}
