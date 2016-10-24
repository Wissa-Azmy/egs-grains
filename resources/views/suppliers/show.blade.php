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
				<div class="form-group">
					<select name="item" class="form-control">
						<option value="0">Item</option>

						@foreach ($items as $item)
							<option value="{{$item->id}}">{{$item->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<input type="text" name="price" placeholder="Price" class="form-control" value="{{ old('price') }}">
				</div>
				<div class="form-group">
					<input type="text" name="quantity" placeholder="Quantity" class="form-control">
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