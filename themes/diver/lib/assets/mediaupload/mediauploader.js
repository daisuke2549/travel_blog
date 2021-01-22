jQuery(function ($) {
 
    $(document).on('click','input[name=mediauploadbtn]',function(e){
        var custom_uploader;
        var mediaupbtnid = $(this).attr("id");
        var previewid = "preview_"+mediaupbtnid;
        var srcformid = "src_"+mediaupbtnid;

        e.preventDefault();
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        custom_uploader = wp.media({
            title: "Choose Image",
            library: {type: "image"},
            button: {text: "Choose Image"},
            multiple: false
        });

        custom_uploader.on("select", function() {
            var images = custom_uploader.state().get("selection");
            images.each(function(file){
                $("input:text[name="+srcformid+"]").val("");
                $("#"+previewid).empty();
                $("input:text[id="+srcformid+"]").val(file.attributes.url);

                $("#"+previewid).html('<img style="max-width:100%;max-height:300px;" src="'+file.attributes.url+'" />');
            });
        });
        custom_uploader.open();
    });

    $(document).on('click','input[name=movuploadbtn]',function(e){
        var custom_uploader;
        var mediaupbtnid = $(this).attr("id");
        var previewid = "preview_"+mediaupbtnid;
        var srcformid = "src_"+mediaupbtnid;

        e.preventDefault();
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        custom_uploader = wp.media({
            title: "Choose Video",
            library: {type: "video"},
            button: {text: "Choose Video"},
            multiple: false
        });

        custom_uploader.on("select", function() {
            var images = custom_uploader.state().get("selection");
            images.each(function(file){
                $("input:text[name="+srcformid+"]").val("");
                $("#"+previewid).empty();
                $("input:text[id="+srcformid+"]").val(file.attributes.url);

                $("#"+previewid).html('<img style="max-width:100%;max-height:300px;" src="'+file.attributes.url+'" />');
            });
        });
        custom_uploader.open();
    });
 
     $(document).on('click','input[name=media-clear]',function(e){
        var mediaupbtnid = $(this).attr("id");
        var previewid = "preview_"+mediaupbtnid;
        var srcformid = "src_"+mediaupbtnid;

        $("input:text[id="+srcformid+"]").val("");
        $("#"+previewid).empty();
    });
});