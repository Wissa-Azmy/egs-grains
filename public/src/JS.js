/**
 * Created by wissaazmy on 10/2/16.
 */

$(document).ready(function () {
    $("#port").change(function () {
        var val = $(this).val();
        if (val == "1") {
            $("#sub-port").html(
                "<option value='test'>سيسكو</option>" +
                "<option value='test2'>س سيرفس</option>"
        );

        } else if (val == "2") {
            $("#sub-port").html("<option value='test'>item2: test 1</option><option value='test2'>item2: test 2</option>");
        } else if (val == "3") {
            $("#sub-port").html(
                "<option value='test'>سيسكو</option>" +
                "<option value='test2'>س جرين</option>" +
                "<option value='test2'>يوش جرين</option>" +
                "<option value='test2'>كابو</option>" +
                "<option value='test2'>اسكندرية</option>" +
                "<option value='test2'>اوشن</option>" +
                "<option value='test2'>فينوس</option>"
            );
        }
    });

    var input = $('#qty,#price,#expenses'),
        qty = $('#qty'),
        price = $('#price'),
        expenses = $('#expenses'),
        total = $('#total');
    input.change(function () {
        var quantity = (isNaN(parseFloat(qty.val()))) ? 0 : parseFloat(qty.val());
        var val2 = (isNaN(parseFloat(price.val()))) ? 0 : parseFloat(price.val());
        var val3 = (isNaN(parseFloat(expenses.val()))) ? 0 : parseFloat(expenses.val());
        var netPrice = val2 + val3;
        total.val(quantity * netPrice);
    });


    // $('#item').change(function(){
    //
    //     $.get("items/supplier", { item: $(this).val() },
    //
    //         function(data) {
    //             console.log(data);
    //
    //             var suppliers = $('#supplier');
    //            
    //             suppliers.empty();
    //            
    //             $.each(data, function(key, value) {
    //            
    //                 suppliers.append($("<option></option>").attr("value",key).text(value));
    //             });
    //         });
    // });

    $('#item').change(function () {
        var suppliers = $('#supplier');
        suppliers.empty();

        $.ajax({
            method: 'post',
            url: editUrl,
            data: { itemId:  $('#item').val(), _token: token}
        })
            .done(function(data){
                console.log(data);
                
                $.each(data, function(key, array) {
                    $.each(array, function(index,supplier){
                        suppliers.append($("<option></option>").attr("value",supplier.id).text(supplier.name));
                    });
                });
            });
    });


});


// If I use POST from the ajax call, I got a TokenMismatch Exception,
// so if you add the below script in your view file it will work.

// <script>
// var token = '{{Session::token()}}';
// </script>


// /*************************** Edit form modal  *********************************/

// var taskId = 0;
// var taskTitle = null;

// $(".edit").click(function(event) {
//     event.preventDefault();
//     taskTitle = event.target.parentNode.parentNode.parentNode.parentNode.childNodes[1];
//     var taskBody = taskTitle.textContent;
//     // taskId = event.target.parentNode.parentNode.parentNode.dataset['taskid'];
//
//     console.log(taskBody);
//     // $('#task-body').val(taskBody);
//     $('#task-body').html(
//       "@foreach ($orders as $order)"+
// "@if ($order->id == taskTitle)"+
//     "{{$order->item->name}}"+
//    "@endif"+
//     " @endforeach  "
//     );
//     $('#edit-modal').modal();
// });

// $('#task-save').click(function () {
//     $.ajax({
//         method: 'post',
//         url: editUrl,
//         data: { body:  $('#task-body').val(), taskId: taskId, _token: token}
//     })
//         .done(function(msg){
//             $(taskTitle).text(msg['new-title']);
//             $('#edit-modal').modal('hide');
//         });
// });
