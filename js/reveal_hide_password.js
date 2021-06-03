function showHidePassword(inId, iconId) {
    if ($("#"+inId).attr('type') !== "text") {
        $("#"+inId).attr('type', 'text');
        $("#"+iconId).attr('class', 'uil uil-eye');
    } else {
        $("#"+inId).attr('type', 'password');
        $("#"+iconId).attr('class', 'uil uil-eye-slash');
    }
}