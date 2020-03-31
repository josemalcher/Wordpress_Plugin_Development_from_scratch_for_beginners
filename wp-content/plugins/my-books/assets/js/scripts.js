$(document).ready(function () {
    $('#list-books').DataTable();

    $("#frmAddBook").validate({
        submitHandler: function () {
            console.log($("#frmAddBook").serialize());
        }
    });
    $("#frmEditBook").validate({
        submitHandler: function () {
            console.log($("#frmEditBook").serialize());
        }
    });
    $("#btn_upload").on("click", function () {
        let image = wp.media({
            title: "Upload Image for My Book",
            multiple: false
        }).open().on("select", function () {
            let uploaded_image = image.state().get("selection").first();
            let getImage = uploaded_image.toJSON().url;
            $("#show-image").html("<img src='" + getImage + "' style='height:'50px; width='50px' ' '>")
            $("#image_name").val(getImage)
        });
    })


});