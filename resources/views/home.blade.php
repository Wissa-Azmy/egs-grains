@extends('layouts.app')

@section('content')
    <section class="row new-post">
        <div class="col-md-9" style="padding-left: 2%;">

        </div>


        <div class="col-md-10 col-md-offset-1"  style="padding-right: 2%;">
            <div class="modal-content panel panel-default">
                <div class="panel-heading">Today's Settings</div>

                <div class="panel-body" style="text-align: center;">
                        <div class="form-group form-inline col-md-3">
                            <label for="dollar" class="control-label">Dollar price:</label>
                            <input type="text" class="form-control" style="width: 20%;" id="dollar" name="dollar" readonly title="">
                            <span class="text-success"> LE </span>
                        </div>
                        <div class="form-group form-inline col-md-3">
                            <label for="dollar" class="control-label">Dollar price:</label>
                            <input type="text" class="form-control" style="width: 20%;" id="dollar" name="dollar" readonly title="">
                            <span class="text-success"> LE </span>
                        </div>
                        <div class="form-group form-inline col-md-3">
                            <label for="dollar" class="control-label">Dollar price:</label>
                            <input type="text" class="form-control" style="width: 20%;" id="dollar" name="dollar" readonly title="">
                            <span class="text-success"> LE </span>
                        </div>
                        <div class="form-group form-inline col-md-3">
                            <label for="dollar" class="control-label">Dollar price:</label>
                            <input type="text" class="form-control" style="width: 20%;" id="dollar" name="dollar" readonly title="">
                            <span class="text-success"> LE </span>
                        </div>
                </div>
            </div>
        </div>
    </section>

@endsection
