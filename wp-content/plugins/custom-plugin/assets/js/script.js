console.log("Loading...WP - CUstom Plugin...with WP_enqueue");

$(function () {
    $(document).on("click", "#btnClick", function () {
        let post_data = "action=custom_plugin_library&param=get_message";
        //let post_data = "action=custom_plugin_library_2&param=get_message";
        $.post(ajaxurl, post_data, function (response) {
            console.log(response)
        });
    })

    $("#form_custom_add").validate({
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
    })

});