@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/{{$user->avatar}}" style="width: 150px; height:150px; float:left; border-radius:50%; margin-right: 25px;">
            <h2>{{$user->first_name}} {{$user->last_name}}'s Profile</h2>
            <h4>{{$user->email}}</h4>
            <form enctype="multipart/form-data" action="/profile" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="avatar">Update Profile Image</label>
                    <input type="file" name="avatar">
                </div>
                <input type="submit" class="pull-right btn btn-primary">
            </form>

        </div>
    </div>
@endsection