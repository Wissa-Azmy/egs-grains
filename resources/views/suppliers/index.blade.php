@extends('layouts.app')


@section('content')
<div class="row">
<div class="col-md-6 col-md-offset-3">

<h3>Add a New Supplier</h3>

		<form method="POST" action="/suppliers">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<input type="text" name="name" placeholder="Name" class="form-control">
			</div>
			<div class="form-group">
				<input type="text" name="phone" placeholder="Phone" class="form-control">
			</div>
			<div class="form-group">
					<input type="text" name="address" placeholder="Address" class="form-control">
			</div>


			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add Supplier</button>
			</div>
		</form>

			<hr>

<h1><b>All Suppliers</b></h1>

	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Added By</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
	@foreach ($suppliers as $supplier)

		<tr>
			<td><a href="/suppliers/{{$supplier->id}}"> {{$supplier->name}} </a></td>
			<td>{{$supplier->phone}}</td>
			<td>{{$supplier->address}}</td>
			<td>{{$supplier->user->first_name}}</td>
			<td>
				{{--</div>--}}

				<form action="/suppliers/{{$supplier->id}}" method="post">
					{{method_field('DELETE')}}
					{{csrf_field()}}
					<div class="btn-group" role="group" aria-label="...">
						<a href="/suppliers/{{$supplier->id}}/edit" class="btn btn-primary">Edit</a>

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