$(".description").hide();
$("#filters > *").click( function () {
    $(".description").hide();
    $("#filters > *").removeClass('btn-active');
    var filterValue = $(this).data('filter');
    $(this).addClass('btn-active');
    if (filterValue == "*") {
        $("#target > *").show(500);
        $(".description").hide();
    } else {
        $("#target > > *").hide(500, function () {
            $("#target "+filterValue).show(500);
        });
        
    }
});

$(".tagLinkOnChange").click( function () {
    const rl = readline.createInterface({ input: process.stdin });
    rl.on('line', (line) => {
    client.write(`${line}\n`);
    });
    rl.on('close', () => {
    client.end();
    });
    document.getElementById("bclink").style.display = "none";
    document.getElementById("bclink2").style.display = "block";
});