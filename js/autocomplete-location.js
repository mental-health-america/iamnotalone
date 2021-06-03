$("#location").keyup( function() {
   var name = $("#location").val(); 
   console.log(name);
   if (name) {
        $.ajax({
        type: "get",
        url: "/locations/get/"+name,
        success: function (response) {
            console.log(response);
            $("#location").autocomplete({
                source: JSON.parse(response),
            });
        },
    });   
   }
});