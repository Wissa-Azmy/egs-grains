@extends('layouts.app')

@section('content')

<form method="POST" action="/invoices/{{$invoice->id}}">
{{method_field('PATCH')}}

	{{ csrf_field() }}

<div class="form-group">
 	<input type="text" name="name" value="{{$invoice->name}}" class="form-control">
 	<button type="submit" class="btn btn-primary">Edit Invoice</button>
</div>
</form>

@stop