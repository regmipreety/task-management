$(document).ready( function () {
    $('#mytable').DataTable({
        "scrollY": "350px",
        "scrollCollapse": true,
        "bSort": false,
        "rowsPerPage": 5,

        "paging": true
    });

    $('#taskstable').DataTable({
        "scrollY": "350px",
        "scrollCollapse": true,
        "bSort": false,
        "rowsPerPage": 5,

        "paging": true
    });

    $("#contact-popup").hide();
    $("#contact-icon").click(function () {
        $("#contact-popup").show();
    });
    //Contact Form validation on click event
    $("#contact-form").on("submit", function () {
        var valid = true;
        $(".info").html("");
        $("inputBox").removeClass("input-error");
        
        var codename = $("#codename").val();
        return valid;
        $("#contact-popup").hide();
    });
});
