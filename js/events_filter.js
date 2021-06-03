$("#filters > *").click( function () {
    $("#filters > *").removeClass('btn-active');

    var filterValue = $(this).data('filter');
    $(this).addClass('btn-active');

    if (filterValue == "*") {
        $("#target > *").show(500);
    } else {
        $("#target > *").hide(500, function () {
            $("#target "+filterValue).show(500);
        });
    }
});