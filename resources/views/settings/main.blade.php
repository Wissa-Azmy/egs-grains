@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="modal-content panel panel-default">
                <div class="modal-body">

    <form action="">

        <div class="form-group port-select">
            <label for="">Ports</label>
            <select name="customer" class="form-control">
                <option value="0">Port</option>

                @foreach ($ports as $port)
                    <option value="{{$port->id}}">{{$port->name}}</option>
                @endforeach
            </select>
            <a href="#" class="btn btn-xs btn-danger btn-remove">Remove</a>
        </div>

        <a href="#" class="btn btn-sm btn-info add-more-ports">Add More</a>
    </form>
</div></div></div></div>


@endsection

@section('script')
<script>

    var template = '<div class="form-group port-select">'+
            '<label for="">Port</label>'+
            '<select name="customer" class="form-control">'+
            '<option value="0">Port</option> '+

            '@foreach ($ports as $port)'+
            '<option value="{{$port->id}}">{{$port->name}}</option> '+
            '@endforeach'+
            '</select>'+
            '<a href="#" class="btn btn-xs btn-danger btn-remove">Remove</a>'+

            '</div>'


    $('.add-more-ports').on('click', function (e) {
        e.preventDefault();

        $(this).before(template);
    });

    $(document).on('click', '.btn-remove', function (e) {
        e.preventDefault();

        $(this).parents('.port-select').remove();
    })
</script>
@endsection