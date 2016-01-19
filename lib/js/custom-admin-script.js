jQuery(document).ready(function($) {
    var custom_uploader;
    $('.upload_image_button').click(function(e) {
        var i = $(this);
        e.preventDefault();
//If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
//Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
//When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            i.prev('.upload_image').val(attachment.url);
        });
//Open the uploader dialog
        custom_uploader.open();
    });

    //adding form element dynamically
    $(".btn-add").click(function() {
        $(this).parent().parent('fieldset').children('ol').children('li:first-child').clone(true).insertAfter($(this).parent().parent('fieldset').children('ol').children('li:last-child'));
        $(this).parent().parent('fieldset').children('ol').children('li:last-child').find('.text_field').val("");
        $(this).parent().parent('fieldset').children('ol').children('li:last-child').find('.large-text').val("");
        $(this).parent().parent('fieldset').children('ol').children('li:last-child').find('img').attr("src", "");
        return false;
    });

//removing form element
    $(".btn-remove").click(function() {
        $(this).parent().remove();
    });

});


	