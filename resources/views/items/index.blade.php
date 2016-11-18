@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
<div class="modal-content">
	<div class="modal-header">
		<h3 class="modal-title">Add a New Item</h3>
	</div>

	<div class="modal-body">
		<form method="POST" action="/items">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<input type="text" name="name" placeholder="Item Name" class="form-control">
			</div>

			<div class="form-group">
				<input type="text" name="qty" placeholder="Quantity" class="form-control">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add Item</button>
			</div>
		</form>
	</div>{{--modal-body--}}
</div>{{--modal-content--}}


<h1><b>All Items</b></h1>

	<table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Quantity</th>
				<th>Added By</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
	@foreach ($items as $item)

		<tr>
			<td>{{$item->name}}</td>
			<td>{{$item->qty}}</td>
{{--			<td>{{$item->supplier->name}}</td>--}}
			<td>{{$item->user->first_name}}</td>
			<td>
				{{--</div>--}}

				<form action="/items/{{$item->id}}" method="post">
					{{method_field('DELETE')}}
					{{csrf_field()}}
					<div class="btn-group" role="group" aria-label="...">
						{{--<a href="/items/{{$item->id}}/edit" class="btn btn-primary">Edit</a>--}}
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
				<h4 class="modal-title">Edit Item</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<textarea class="form-control" name="task-body" id="task-body" rows="4"></textarea>
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

@stop