/**
 * Created by wissaazmy on 10/2/16.
 */

$(document).ready(function () {
    $("#port").change(function () {
        var val = $(this).val();
        if (val == "1") {
            $("#subport").html(
                "<option value='test'>سيسكو</option>" +
                "<option value='test2'>س سيرفس</option>"
        );

        } else if (val == "2") {
            $("#subport").html("<option value='test'>item2: test 1</option><option value='test2'>item2: test 2</option>");
        } else if (val == "3") {
            $("#subport").html(
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

});