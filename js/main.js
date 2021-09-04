jQuery(document).ready(function($) {
    $(document).on("click", ".upload-image-button", function(event) {
        event.preventDefault();
        var frame;
        var thisBtn = $(this);
        
        if (frame){
            frame.open();
            return;
        }
        
        frame = wp.media({
            title: 'Select a Thumbnail',
            button: { text:  'Select thumbnail' },
            multiple: false,
            library: { type: 'image' }
        });

        frame.on('select', function(){
            var attachment = frame.state().get('selection').first().toJSON();
            thisBtn.siblings('.img-url').val(attachment.url);
        });
        frame.open();
    });
});

