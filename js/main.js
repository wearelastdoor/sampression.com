/*(function ($, F) {
    F.transitions.drop_In = function() {
        var endPos = F._getPosition(true);

        endPos.top = (parseInt(endPos.top, 10) - 200) + 'px';

        F.wrap.css(endPos).show().animate({
            top: '+=200px'
        }, {
            duration: F.current.openSpeed,
            complete: F._afterZoomIn
        });
    };

    F.transitions.drop_Out = function() {
        F.wrap.removeClass('fancybox-opened').animate({
            top: '-=200px'
        }, {
            duration: F.current.closeSpeed,
            complete: F._afterZoomOut
        });
    };

}(jQuery, jQuery.fancybox));*/

jQuery(document).ready(function($) {

    /*$( window ).scroll(function() {
        var p = $('body').scrollTop();
        if( p > 135 ) {
            history.pushState(null, 'Themes', 'http://sampression.beta/themes/');
            $('body').load('http://sampression.beta/themes/');
        }
    });*/

    if( ('#gform_4').length > 0 ) {
        $('#gform_4 .gform_footer').append('<span class="spam-note">We hate spam, as much as you do.</span>');
    }

    $(".fancybox").fancybox({
        padding     : 0,
        margin      : 5,
        autoSize    : false,
        width       : '100%',
        height      : '100%',
        openMethod  : 'dropIn',
        closeMethod : 'dropOut'
        /*openMethod  : 'drop_In',
        openSpeed   : '250',
        closeMethod : 'drop_Out',
        closeSpeed : '100'*/
        // openEffect  : 'elastic',
        // closeEffect : 'elastic',
        // openEasing  : 'easeInBack',
        // closeEasing : 'easeInOutBounce'
    });

    $(document).on('click', '#enter-coupon-code', function (e) {
        e.preventDefault();
        jQuery(this).parent('.coupon-trigger').siblings(".coupon-form").animate({"height": "toggle"});
        var p_id = $(this).data('product');
        var data = {
            'action': 'add_to_cart',
            'p_id': p_id
        };
        $.post(SampressionVar.ajaxurl, data, function (response) {
            console.log( response );
        });
        return false;
    });
    
    $(document).on('click', '#apply-coupon-code', function (e) {
        e.preventDefault();
        var code = $(this).siblings('input').val();
        if(code != '') {
            var p_id = $(this).data('product');
            var data = {
                'action': 'apply_coupon_code',
                'p_id': p_id,
                'c_code': code
            };
            $.post(SampressionVar.ajaxurl, data, function (response) {
                console.log( response );
                //$('#product-price-info span.amount').text('$ '+response);
            });
            return false;
        }
        return false;
    });

    jQuery(document).bind('gform_post_render', function(){
        $('#gform_4 .gform_footer').append('<span class="spam-note">We hate spam, as much as you do.</span>');
    });
    
    /**
    *
    */
    if($.cookie("sampression-cookie-notice") == null) {
        var div = '<div class="cookie-notice">This site uses cookies to optimise your user experience. By using this site you are consenting to our use of these cookies.<a href="javascript:void(0);">Close</a></div>';
        $('body').prepend(div);
    }

    $(document).on('click', '.cookie-notice a', function() {
        $('div.cookie-notice').slideUp("slow", function() {
            $(this).remove();
        });
        $.cookie("sampression-cookie-notice", 'yes', { expires: 1 });
    });

    /* Mobile Menu (Full Width Navigation)
    * =============================*/
    //jQuery('.coupon-trigger a').click(function(e){
        // e.preventDefault();
        // jQuery(this).parent('.coupon-trigger').siblings(".coupon-form").animate({"height": "toggle"});
    //});

}); //end ready        ganeshhimal!@12            g0t00h3ll