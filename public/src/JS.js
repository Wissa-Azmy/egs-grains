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

    var input = $('#qty,#price'),
        qty = $('#qty'),
        price = $('#price'),
        total = $('#total');
    input.change(function () {
        var val1 = (isNaN(parseInt(qty.val()))) ? 0 : parseInt(qty.val());
        var val2 = (isNaN(parseInt(price.val()))) ? 0 : parseInt(price.val());
        total.val(val1 * val2);
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
        $.ajax({
            method: 'post',
            url: editUrl,
            data: { itemId:  $('#item').val(), _token: token}
        })
            .done(function(data){
                console.log(data);

                var suppliers = $('#supplier');
                suppliers.empty();
                
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