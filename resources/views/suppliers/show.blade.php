@extends('layouts.app')


@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">

	<h3>Add a New Item</h3>

		<form method="POST" action="/suppliers/{{ $supplier->id }}/items">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">

				<input type="text" name="name" placeholder="Item Name" class="form-control">
				<input type="text" name="price" placeholder="Price" class="form-control" value="{{ old('price') }}">
				<input type="text" name="qty" placeholder="Quantity" class="form-control">
				<input type="text" name="consumer_discount" placeholder="Consumer Discount" class="form-control">
				<input type="text" name="supplier_discount" placeholder="Supplier Discount" class="form-control">

			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add Item</button>
			</div>
		</form>

		{{ var_dump($errors) }}
		@if (count($errors))
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif

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
			<td>{{$item->price}}</td>
			<td>{{$item->qty}}</td>
			<td>{{$item->user->name}}</td>
			<td><a href="/items/{{$item->id}}/edit" class="btn btn-primary">Edit</a></td>
		</tr>

	@endforeach
		</tbody>

	</table>

		
	</div>
</div>
@stop