@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="modal-content panel panel-default">
                <div class="modal-header">
                    <h3 class="modal-title">Ports & SubPorts</h3>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">

                            <form action="">
                                <div class="form-group form-inline port-select">

                                    <select name="ports" class="form-control" id="ports">
                                        <option value="0">Select Port</option>

                                        @foreach ($ports as $port)
                                            <option value="{{$port->id}}">{{$port->name}}</option>

                                        @endforeach
                                    </select>
                                    <a href="#" class="btn btn-xs btn-danger" id="btn-delete">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-xs btn-warning" id="port-btn-edit">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="#" class="btn btn-xs btn-info add-more-ports">Add More</a>
                            </form>
                        </div>{{--col-md-5--}}

                        <div class="col-md-5 col-md-offset-1">

                            <form action="">
                                <div class="form-group form-inline subport-select">
                                    <select name="subports" class="form-control" id="subports">


                                    </select>
                                    <a href="#" class="btn btn-xs btn-danger subport-btn-remove">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-xs btn-warning subport-btn-edit">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="#" class="btn btn-xs btn-info add-more-subports">Add More</a>
                            </form>
                        </div>{{--col-md-5--}}
                    </div>

                </div>{{--modal-body--}}
            </div>{{--modal-content--}}
        </div>{{--col-md-6--}}
    </div>{{--row--}}

@endsection

@section('script')
    <script>

        var token = '{{Session::token()}}',
            addPortUrl = '{{route('addPort')}}',
            deletePortUrl = '{{route('deletePort')}}',
            loadSubPortsUrl = '{{route('viewSubPorts')}}',

            addPort_template = '<div class="form-group form-inline port-add">'+
                '<input type="text" name="port" class="input-sm port"> '+
                '<a href="#" class="btn btn-xs btn-danger btn-remove"><i class="fa fa-trash" aria-hidden="true"></i></a> '+
                '<a href="#" class="btn btn-xs btn-primary btn-ok"><i class="fa fa-check" aria-hidden="true"></i></a>'+
                '</div>',

            select_template = '<select name="ports" class="form-control" id="ports"></select> '+
                    '<a href="#" class="btn btn-xs btn-danger" id="btn-delete">'+
                '<i class="fa fa-trash" aria-hidden="true"></i></a> '+
                '<a href="#" class="btn btn-xs btn-warning" id="port-btn-edit">'+
                '<i class="fa fa-pencil" aria-hidden="true"></i></a>';


        $('.add-more-ports').on('click', function (e) {
            e.preventDefault();

            $(this).before(addPort_template);
        });

        $(document).on('click', '.btn-remove', function (e) {
            e.preventDefault();

            $(this).parents('.port-add').remove();
        })



//        Using AJAX to ADD ports and send Edit ports Requests as well
        $(document).on('click', '.btn-ok', function (e) {
            e.preventDefault();
            var value = $(this).siblings('.port').val(),
                    portId = $(this).siblings('#portId').val(),
                    portSelect = $('.port-select'),
                    name;
            $(this).parents('.port-add').remove();

            if (value != null){
                name = value;
            }
            else{
                name = $('#ports option:selected').text();
            }

            console.log(portId);

            $.ajax({
                method: 'post',
                url: addPortUrl,
                data: { name:  name, portId: portId, _token: token}
            })
             .done(function(data){
                 console.log(data);

                 var ports = $('#ports');
                 if(ports.length){
                     ports.empty();
                 }
                 else {
                     portSelect.empty();
                     portSelect.append(select_template);
                     ports = $('#ports');
                 }

                 ports.append($("<option></option>").attr("value", 0).text('Select Port'));
                 $.each(data, function(key, array) {
                     $.each(array, function(index,port){
                         ports.append($("<option></option>").attr("value",port.id).text(port.name));
                     });
                 });
             });
        });


//        Using AJAX to LOAD the subPorts for each port
        $('#ports').change(function () {
            var subports = $('#subports');
            subports.empty();

            $.ajax({
                method: 'post',
                url: loadSubPortsUrl,
                data: { portId:  $('#ports').val(), _token: token}
            })
                    .done(function(data){
                        $.each(data, function(key, array) {
                            $.each(array, function(index,subport){
                                subports.append($("<option></option>").attr("value",subport.id).text(subport.name));
                            });
                        });
                    });
        });


//        Using AJAX to DELETE Ports
        $(document).on('click', '#btn-delete', function (e) {
            e.preventDefault();
            var ports = $('#ports');

            $.ajax({
                method: 'post',
                url: deletePortUrl,
                data: {portId: ports.val(), _token: token}
            })

                    .done(function (data) {
                        ports.empty();
                        ports.append($("<option></option>").attr("value", 0).text('Select Port'));
                        $.each(data, function(key, array){
                            $.each(array, function (index, port) {
                                ports.append($("<option></option>").attr("value", port.id).text(port.name));
                            })
                        })
                    })
        });


//        Using AJAX to Edit Ports
        $(document).on('click', '#port-btn-edit', function (e) {
            e.preventDefault();
            $('#btn-delete').attr("disabled", true);
            var ports = $('#ports'),
                    portId = ports.val(),
                    portName = $("#ports option:selected").text(),
                    editPort_template = "<input type='text' name='port' value='"+ portName +
                            "'class='input-sm port'><input type='hidden' name='portId' value='"+ portId +"' id='portId'>";

            if(portId > 0){
                ports.replaceWith(editPort_template);
                $(this).replaceWith('<a href="#" class="btn btn-xs btn-primary btn-ok"><i class="fa fa-check" aria-hidden="true"></i></a>');
            }
            else{
                alert('Please select a Port first');
            }
        })

    </script>
@endsection