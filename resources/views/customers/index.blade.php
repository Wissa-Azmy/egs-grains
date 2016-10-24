@extends('layouts.app')


@section('content')
<div class="row">
<div class="col-md-6 col-md-offset-3">
	<div class="modal-content">
<div class="modal-header">
<h3 class="modal-title">Add a New Customer</h3>
</div>
		<div class="modal-body">
			<form method="POST" action="/customers">
				{{ csrf_field() }}
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
					<button type="submit" class="btn btn-primary">Add Customer</button>
				</div>
			</form>
		</div>{{--modal-body--}}
	</div>{{--modal-content--}}
	<hr>


<h1><b>All Customers</b></h1>

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
	@foreach ($customers as $customer)

		<tr>
			<td><a href="/customers/{{$customer->id}}"> {{$customer->name}} </a></td>
			<td>{{$customer->phone}}</td>
			<td>{{$customer->address}}</td>
			<td>{{$customer->user->first_name}}</td>
			<td>
				<form action="/customers/{{$customer->id}}" method="post">
					{{method_field('DELETE')}}
					{{csrf_field()}}
					<div class="btn-group" role="group" aria-label="...">
						<a href="/customers/{{$customer->id}}/edit" class="btn btn-primary">Edit</a>

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