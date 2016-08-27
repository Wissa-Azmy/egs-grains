@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="/suppliers/{{$supplier->id}}">
                {{method_field('PATCH')}}
                {{csrf_field()}}


                <div class="form-group">
                    <input type="text" name="name" value="{{$supplier->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" class="form-control">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection