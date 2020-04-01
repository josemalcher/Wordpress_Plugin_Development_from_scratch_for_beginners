$(document).ready(function () {
    $('#list-books').DataTable();

    $("#frmAddBook").validate({
        submitHandler: function () {
            let postdata = "action=mybooklibrary" +
                            "&param=save_book" +
                            "&"+$("#frmAddBook").serialize();
            $.post(mybookajaxurl, postdata, function (response) {
                //console.log(response);
                let data = $.parseJSON(response);
                if(data.status == 1){
                    // $.notifyBar({
                    //     cssClass: "success",
                    //     html: data.message
                    // });
                    $("#message_save").removeAttr('hidden');
                    $("#name").val("");
                    $("#author").val("");
                    $("#about").val("");
                    $("#show-image").val("");
                    $("#image_name").val("");
                }else{

                }
            });
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