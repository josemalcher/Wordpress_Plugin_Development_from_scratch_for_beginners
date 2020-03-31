console.log("Loading...WP - CUstom Plugin...with WP_enqueue");

$(function () {
    $(document).on("click", "#btnClick", function () {
        let post_data = "action=custom_plugin_library&param=get_message";
        //let post_data = "action=custom_plugin_library_2&param=get_message";
        $.post(ajaxurl, post_data, function (response) {
            console.log(response)
        });
    })

/*    $("#form_custom_add").validate({
        submitHandler: function () {
            //console.log($("#form_custom_add").serialize());
            let post_data = $("#form_custom_add").serialize() + "&action=custom_plugin_library&param=post_form_data";
            //console.log(post_data);

            $.post(ajaxurl, post_data, function (response) {
                let data = $.parseJSON(response);
                console.log(data);
                console.log("Name: " + data.input_name + "Email: " + data.input_email);

            })

        }
    });*/
    $("#form_custom_add").validate({
        submitHandler: function () {
            let name =  $("#input_name").val();
            let email = $("#input_email").val();
            let description = encodeURIComponent(tinyMCE.get("description_id").getContent());
            let post_data = "action=custom_plugin_library" +
                            "&param=savedata" +
                            "&email="+email+
                            "&name="+name+
                            "&desc="+description;
            $.post(ajaxurl, post_data, function (response) {
                console.log(response);
            })

        }
    });



    // Outher ajax request
    /* $("#form_custom_add_outherPage").on("click", function (e) {
         e.preventDefault();
         console.log("Open Anither Page has Opened");
         console.log(ajaxurl);
         $.post(ajaxurl, {action:"custom_plugin", name:"Online Web TUTOR", Tut:"WP Plugin Developer" }, function (response) {
             console.log(response);
         });
     });*/

    $("#form_custom_add_outherPage").validate({
        submitHandler: function () {
            let post_data = $("#form_custom_add_outherPage").serialize() + "&action=custom_ajax_req&param=post_form_data";
            //console.log(post_data);
            $.post(ajaxurl, post_data, function (response) {
                let data = $.parseJSON(response);
                console.log(data);
                console.log("Name: " + data.input_name + "Email: " + data.input_email);

            })

        }
    });
/*
    $("#btnImage").on("click", function () {
        let images = wp.media({
            title: "Upload Image",
            multiple: true
        }).open().on("select", function (e) {
            //let uploadedImages = images.state().get("selection"); // very imagens/files
            //let uploadedImages = images.state().get("selection").first(); // only // multile = false
            let uploadedImages = images.state().get("selection");
            let selectedImages = uploadedImages;
            //console.log(uploadedImages.toJSON());
            //console.log(selectedImages.url +" - " + selectedImages.title + " - " + selectedImages.filename);

            /!*  // multiple images - multile  true
            $.each(selectedImages, function (index, image) {
                console.log("image URL: " + image.url + " Title "+ image.title);
            })
            *!/
            selectedImages.map(function (image) {
                let itemDetails = image.toJSON();
                console.log(itemDetails);
                // multiples files
            });

        })
    });
 */

    $("#btnImage").on("click", function () {
        let images = wp.media({
            title: "Upload Image",
            multiple: false
        }).open().on("select", function (e) {
            let uploadedImages = images.state().get("selection").first(); // only // multile = false
            let selectedImages = uploadedImages.toJSON();

            $("#getImages").attr("src", selectedImages.url);

        })
    });

});