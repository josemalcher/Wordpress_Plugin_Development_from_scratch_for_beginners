console.log("Loading...WP - CUstom Plugin...with WP_enqueue");

$(function () {
    $(document).on("click", "#btnClick", function () {
        let post_data = "action=custom_plugin_library&param=get_message";
        //let post_data = "action=custom_plugin_library_2&param=get_message";
        $.post(ajaxurl, post_data, function (response) {
            console.log(response)
        });
    })

});