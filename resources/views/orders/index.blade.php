@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="modal-content panel panel-default">
                <div class="modal-header">
                    <h3 class="modal-title">Add a New Order</h3>
                </div>

                <div class="modal-body">
                    <form method="post" action="/orders">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-6">
                        {{--<div class="col-md-3 col-md-offset-3">--}}

                            <div class="form-group">
                                <select name="item" class="form-control" id="item">
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

                                <select name="sub-port" class="form-control" id="sub-port">
                                    <option value="0">SubPort</option>

                                </select>
                                </p>
                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control" name="quantity" placeholder="Quantity" id="qty">
                            </div>

                            <div class="form-group form-inline">
                                <input type="text" class="form-control" name="expenses" title="Expenses" placeholder="Expenses" id="expenses" style="width: 30%;">

                                <select name="port" class="form-control" id="port" style="width: 50%;">
                                    <option value="0">Expenses</option>
                                    <option value="1">Channel 1</option>
                                    <option value="2">Channel 2</option>
                                    <option value="3">Channel 3</option>
                                </select>
                                {{--<a href="#" class="add-more-expenses"><i class="fa fa-remove" style="color: red; margin: 0px 5px 0px 5px;" area-hidden="true"></i></a>--}}

                            </div>

                            <div class="form-group">
                                <a href="#" class="add-more-expenses"><i class="fa fa-plus" area-hidden="true"></i></a>
                            </div>


                                <div class="form-group">
                                <input type="text" class="form-control" name="total" readonly="readonly" placeholder="Total" id="total">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="location" placeholder="Location">
                            </div>


                            </div>{{--col-xs-6--}}


                            <div class="col-xs-6">
                            <div class="form-group">
                                <select name="supplier" class="form-control" id="supplier">
                                    <option value="0">Supplier</option>

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
                                    <input type="text" class="form-control" name="price" placeholder="Price" id="price">
                                    <select name="currency" class="form-control">
                                        <option value="0">LE</option>
                                        <option value="1">$</option>
                                    </select>
                                </p>
                            </div>

                            <div class="form-group">
                                <textarea class="" name="notes" style="width: 100%;" rows="6" placeholder="Add your Notes here..."></textarea>
                            </div>
                        </div>{{--col-xs-6--}}
                        </div> {{--row--}}

                        <div class="modal-footer">
                            <input type="submit" value="Add Order" class="btn btn-primary">
                        </div>

                    </form>
                </div> {{--modal body--}}


            </div> {{--Modal content--}}
        </div> {{--Col-md-6--}}

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
                                    {{--<a href="/orders/{{$order->id}}/edit"  class="btn btn-primary edit">Edit</a>--}}
                                    <a class="btn btn-primary edit">Edit</a>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Order</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group" id="task-body">
                            {{--<textarea class="form-control" name="task-body"  rows="4"></textarea>--}}
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary"id="task-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@section('script')
    <script>

        var token = '{{Session::token()}}',
            editUrl = '{{route('dropdown')}}';
//                addExpenses_template = <div class="form-group form-inline">
//                <input type="text" class="form-control" name="expenses" title="Expenses" placeholder="Expenses" id="expenses" style="width: 30%;">
//
//                <select name="port" class="form-control" id="port" style="width: 50%;">
//                <option value="0">Expenses</option>
//
//
//                </select>
//                <a href="#" class="add-more-expenses"><i class="fa fa-remove" style="color: red; margin: 0px 5px 0px 5px;" area-hidden="true"></i></a></div>;



        // Edit Order(task) modal
        $(".edit").click(function(event) {
            event.preventDefault();

            var taskTitle = event.target.parentNode.parentNode.parentNode.parentNode.childNodes[1];
            var taskBody = taskTitle.textContent;

            console.log(taskBody);

            $('#task-body').val(taskBody);

            $('#edit-modal').modal();
        });


        // Add more EXPENSES button
        $('.add-more-expenses').on('click', function (e) {
            e.preventDefault();

            $(this).before(addPort_template);
        });


    </script>
@endsection