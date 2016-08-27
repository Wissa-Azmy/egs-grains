@extends('layouts.app')

@section('content')

    <div class="row">

        <form method="post" action="/orders">
            {{ csrf_field() }}

            <div class="col-md-3 col-md-offset-3">
                <div class="form-group">
                    <select name="supplier" class="form-control">
                        <option value="0">Supplier</option>

                        @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <select name="item" class="form-control">
                        <option value="0">Select an Item</option>

                        @foreach ($items as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <select name="port" class="form-control">
                        <option value="0">Port</option>
                        <option value="1">Port 1</option>
                        <option value="2">Port 2</option>
                        <option value="3">Port 3</option>

                    </select>
                </div>

                <div class="form-group">
                    <select name="transportation" class="form-control">
                        <option value="0">Transportation</option>
                        <option value="1">Transportation 1</option>
                        <option value="2">Transportation 2</option>
                        <option value="3">Transportation 3</option>

                    </select>
                </div>

                <div class="form-group">
                    <select name="location" class="form-control">
                        <option value="0">Location</option>
                        <option value="1">Location 1</option>
                        <option value="2">Location 2</option>
                        <option value="3">Location 3</option>

                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" value="Add Order" class="btn btn-primary">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <select name="customer" class="form-control">
                        <option value="0">Customer</option>

                        @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <select name="type" class="form-control">
                        <option value="0">Type</option>
                        <option value="1">Type 1</option>
                        <option value="2">Type 2</option>
                        <option value="3">Type 3</option>

                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="quantity" placeholder="Quantity">
                </div>

                <div class="form-group">
                    <input type="text" name="paid" placeholder="Paid">
                </div>

                <div class="form-group">
                    <input type="text" name="balance" placeholder="Balance">
                </div>
            </div>
        </form>

        <div class="col-md-8 col-md-offset-2">

            <hr>

            <h1><b>All Orders</b></h1>

            <table class="table">
                <thead>
                <tr>
                    <th>Order No</th>
                    <th>Customer</th>
                    <th>Supplier</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)

                    <tr>
                        <td><a href="/orders/{{$order->id}}"> {{$order->id}} </a></td>
                        <td>{{$order->location}}</td>
                        <td>{{$order->port}}</td>
                        <td><a href="/orders/{{$order->id}}/edit" class="btn btn-primary">Edit</a></td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>

    </div>

@endsection