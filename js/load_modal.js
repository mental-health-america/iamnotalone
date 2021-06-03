function openModal(elem) {
    uid = $(elem).data('uid');
    eid = $(elem).data('eid');
    first_name = $(elem).data('lname');
    last_name = $(elem).data('fname');

    $(elem).parent().toggle();

    $("#organizer").val(first_name+' '+last_name);
    $("#uid").val(uid);
    $("#eid").val(eid);

    $("#ofn").html(first_name);

    $("#disapproveModal").modal();
}