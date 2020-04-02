$(document).ready(function () {
    $('#list-books').DataTable();

    $("#frmAddBook").validate({
        submitHandler: function () {
            let postdata = "action=mybooklibrary" +
                "&param=save_book" +
                "&" + $("#frmAddBook").serialize();
            $.post(mybookajaxurl, postdata, function (response) {
                //console.log(response);
                let data = $.parseJSON(response);
                if (data.status == 1) {
                    // $.notifyBar({
                    //     cssClass: "success",
                    //     html: data.message
                    // });
                    $("#message_save").removeAttr('hidden');
                    // $("#name").val("");
                    // $("#author").val("");
                    // $("#about").val("");
                    // $("#show-image").val("");
                    // $("#image_name").val("");
                    setTimeout(function () {
                        location.reload()
                    }, 1000);
                } else {

                }
            });
        }
    });

    $("#frm_edit_Book").validate({
        submitHandler: function () {
            let postdata = "action=mybooklibrary" +
                "&param=edit_book" +
                "&" + $("#frm_edit_Book").serialize();
            $.post(mybookajaxurl, postdata, function (response) {
                //console.log(response);
                let data = $.parseJSON(response);
                if (data.status == 1) {
                    // $.notifyBar({
                    //     cssClass: "success",
                    //     html: data.message
                    // });
                    $("#message_save").removeAttr('hidden');
                    // $("#name").val("");
                    // $("#author").val("");
                    // $("#about").val("");
                    // $("#show-image").val("");
                    // $("#image_name").val("");
                    setTimeout(function () {
                        location.reload()
                    }, 1000);
                } else {

                }
            });
        }
    });

    $("#btn_upload").on("click", function () {
        let image = wp.media({
            title: "Upload Image for My Book",
            multiple: false
        }).open().on("select", function () {
            let uploaded_image = image.state().get("selection").first();
            let getImage = uploaded_image.toJSON().url;
            $("#show-image").html("<img src='" + getImage + "' style='height: 50px; width: 50px' >")
            $("#image_name").val(getImage)
        });
    });

    $(".btnbookdelete").on("click", function () {
        let conf = confirm("Tem certeza que você quer apagar o resgistro?");
        if(conf){
            let book_id = $(this).attr("data-id");
            let postdata = "action=mybooklibrary" +
                "&param=delete_book"+
                "&id="+book_id;
            console.log(postdata);
            $.post(mybookajaxurl, postdata, function (response) {
                //console.log(response);
                let data = $.parseJSON(response);
                if (data.status == 1) {
                    // $.notifyBar({
                    //     cssClass: "success",
                    //     html: data.message
                    // });
                    setTimeout(function () {
                        location.reload()
                    }, 1000);
                } else {

                }
            });
        }
    });

    $("#frm_add_author").validate({
        submitHandler: function () {
            let postdata = "action=mybooklibrary" +
                            "&param=save_author" +
                            "&" + $("#frm_add_author").serialize();
            $.post(mybookajaxurl, postdata, function (response) {
                let data = $.parseJSON(response);
                if (data.status == 1) {
                    $("#message_save").removeAttr('hidden');
                    setTimeout(function () {
                        location.reload()
                    }, 1000);
                } else {

                }
            });
        }
    });


});