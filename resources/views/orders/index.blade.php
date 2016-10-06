@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Add a New Order</h3>
        </div>

        <form method="post" action="/orders">
            {{ csrf_field() }}

            <div class="col-md-3 col-md-offset-3">

                <div class="form-group">
                    <select name="item" class="form-control">
                        <option value="0">Item</option>

                        @foreach ($items as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <select name="customer" class="form-control">
                        <option value="0">Customer</option>

                        @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group form-inline">
                    <p>
                    <select name="port" class="form-control" id="port">
                        <option value="0">Port</option>
                        <option value="1">دمياط</option>
                        <option value="2">اسكندرية</option>
                        <option value="3">الدخيلة</option>
                        <option value="1">ابوقير</option>
                        <option value="2">بورسعيد</option>
                        <option value="3">السويس</option>
                        <option value="2">الادبية</option>
                        <option value="3">النهضة</option>
                    </select>

                    <select name="subport" class="form-control" id="subport">

                    </select>
                    </p>
                </div>


                <div class="form-group">

                    <input type="text" name="quantity" placeholder="Quantity" id="qty">
                </div>

                <div class="form-group">
                    <input type="text" name="total" placeholder="Total" disabled id="total">
                </div>

                <div class="form-group">
                    <input type="text" name="location" placeholder="Location">
                </div>

                <div class="form-group">
                    <input type="submit" value="Add Order" class="btn btn-primary">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <select name="supplier" class="form-control">
                        <option value="0">Supplier</option>

                        @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="form-group">
                    <select name="type" class="form-control">
                        <option value="0">Type</option>
                        <option value="1">اوكراني</option>
                        <option value="2">امريكي</option>
                        <option value="3">روماني</option>
                        <option value="1">ارجنتيني</option>
                        <option value="2">برازيلي</option>
                        <option value="3">صربي</option>
                    </select>
                </div>

                <div class="form-group">
                    <select name="transportation" class="form-control">
                        <option value="0">Transportation</option>
                        <option value="1">وصالي معبأ</option>
                        <option value="2">وصالي صب</option>
                        <option value="3">أرضه معبأ</option>
                        <option value="3">أرضه صب</option>
                    </select>
                </div>

                <div class="form-group form-inline">
                    <p>
                        <input type="text" name="price" placeholder="Price" id="price">
                        <select name="currency" class="form-control">
                            <option value="0">LE</option>
                            <option value="1">$</option>
                        </select>
                    </p>
                </div>

                <div class="form-group">
                    <textarea class="" name="notes" cols="40" rows="5" placeholder="Add your Notes here..."></textarea>
                </div>
            </div>
        </form>

        <div class="col-md-10 col-md-offset-1">
            <hr>

            <h1><b>All Orders</b></h1>

            <table class="table">
                <thead>
                <tr>
                    <th>Order No</th>
                    <th>Item</th>
                    <th>Customer</th>
                    <th>Supplier</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Added By</th>
                    <th>Date/Time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)

                    <tr>
                        <td><a href="/orders/{{$order->id}}"> {{$order->id}} </a></td>
                        <td>{{$order->item->name}}</td>
                        <td>{{$order->customer->name}}</td>
                        <td>{{$order->supplier->name}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->unit_price}}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->user->first_name}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>
                            <form action="orders/{{$order->id}}" method="post">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="/orders/{{$order->id}}/edit" class="btn btn-primary">Edit</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>

                        </td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>

    </div>

@endsection