(function($) {
    "use strict";

    /*
     * Login And Registration Ajax
     */
    $(document).on('submit', 'form.ajaxAuth', function(e)
    {

        var $this = $(this),
            $container = $('.account-menu'),
            $message = $this.find('.message')

        $container.addClass('preloader')


        $.ajax({
            type: 'POST',
            url: ajax_mega_handle.ajaxurl,
            data: $this.serialize(),
            dataType: 'json',
            success: function( response )
            {

                $message.html(response.data.message)

                if ( response.data.loggedin === true )
                {
                    document.location.href = response.data.redirecturl
                }

            },
            beforeSend: function()
            {

            },
            complete: function()
            {
                $container.removeClass('preloader')
            }

        })

        e.preventDefault()

    })


})(jQuery);
