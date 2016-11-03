@extends('layouts.app')


@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="modal-content panel panel-default">
			<div class="modal-header">
				<h3 class="modal-title">Add a New Purchase</h3>
			</div>
			<div class="modal-body">
			<form method="POST" action="/suppliers/{{ $supplier->id }}/items">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group form-inline">

                    <div class="form-group" style="width: 48%; margin-right: 3%;">
                        <select name="item" class="form-control" style="width: 100%;">
                            <option value="0">Item</option>

                            @foreach ($items as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" style="width: 48%; padding: 0%;">
                        <select name="type" class="form-control" style="width: 100%;">
                            <option value="0">Type</option>
                            <option value="1">اوكراني</option>
                            <option value="2">امريكي</option>
                            <option value="3">روماني</option>
                            <option value="1">ارجنتيني</option>
                            <option value="2">برازيلي</option>
                            <option value="3">صربي</option>
                        </select>
                    </div>
                </div>



				<div class="form-group form-inline">
					<div class="form-group" style="width: 40%;">
						<input type="text" name="price" style="width: 100%;" placeholder="Price" class="form-control" value="{{ old('price') }}">
					</div>

					<div class="form-group" style="width: 8%; margin-right: 3%;">
						<select name="currency" class="form-control">
							<option value="0">LE</option>
							<option value="1">$</option>
						</select>
					</div>
					<div class="form-group" style="width: 48%; padding: 0%;">
						<input type="text" name="quantity" style="width: 100%;" placeholder="Quantity" class="form-control" value="{{ old('quantity') }}">
					</div>
				</div>

				<div class="form-group form-inline">
					<p>
					<div class="form-group" style="width: 48%; margin-right: 3%;">
						<input type="text" name="total" readonly style="width: 100%;" placeholder="Total" class="form-control">
					</div>

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

						</select>
					</p>
				</div>



                <div class="form-group">
                    <textarea class="" name="notes" style="width: 100%;" rows="5" placeholder="Add your Notes here..."></textarea>
                </div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add Item</button>
				</div>


			</form>
            </div>
		</div>
		{{-- {{ var_dump($errors) }}
		@if (count($errors))
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif --}}
		<hr>

		<h1>{{$supplier->name}}</h1>

		<table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Added By</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
	@foreach ($supplier->items as $item)

		<tr>
			<td>{{$item->name}}</td>
			<td>{{$item->pivot->price}}</td>
			<td>{{$item->pivot->quantity}}</td>
			<td>{{$item->user->first_name}} {{$item->user->last_name}}</td>
			<td>
				{{--</div>--}}

				<form action="/items/{{$item->id}}" method="post">
					{{method_field('DELETE')}}
					{{csrf_field()}}
					<div class="btn-group" role="group" aria-label="...">
						<a href="/items/{{$item->id}}/edit" class="btn btn-primary">Edit</a>

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
@stop