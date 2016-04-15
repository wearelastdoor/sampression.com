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

jQuery(document).ready(function ($) {

    /*$( window ).scroll(function() {
     var p = $('body').scrollTop();
     if( p > 135 ) {
     history.pushState(null, 'Themes', 'http://sampression.beta/themes/');
     $('body').load('http://sampression.beta/themes/');
     }
     });*/

    $(document).on('click', '.woocommerce-billing-fields .woocommerce-info .showlogin', function (e) {
        e.preventDefault();
        $('.wc-checkout-login-form > p, .wc-checkout-login-form > p').not('.wc-social-login.form-row-wide').show();
        $('.wc-social-login.form-row-wide').hide();
        $('.wc-checkout-login-form').toggle('slow');
    });

    $(document).on('click', '.woocommerce-billing-fields .woocommerce-info .js-show-social-login', function (e) {
        e.preventDefault();
        $('.wc-social-login.form-row-wide').show();
        $('.wc-checkout-login-form > p, .wc-checkout-login-form > p').not('.wc-social-login.form-row-wide').hide();
        $('.wc-checkout-login-form').toggle('slow');
    });

    if (('#gform_4').length > 0) {
        $('#gform_4 .gform_footer').append('<span class="spam-note">We hate spam, as much as you do.</span>');
    }

    /*$(".fancybox").fancybox({
     padding     : 0,
     margin      : 5,
     autoSize    : false,
     width       : '100%',
     height      : '100%',
     openMethod  : 'dropIn',
     closeMethod : 'dropOut'
     });*/

    $(document).on('click', '#enter-coupon-code', function (e) {
        e.preventDefault();
        jQuery(this).parent('.coupon-trigger').siblings(".coupon-form").animate({"height": "toggle"});
        var p_id = $(this).data('product');
        var data = {
            'action': 'add_to_cart',
            'p_id': p_id
        };
        $.post(SampressionVar.ajaxurl, data, function (response) {
            console.log(response);
        });
        return false;
    });

    $(document).on('click', '#apply-coupon-code', function (e) {
        e.preventDefault();
        var code = $(this).siblings('input').val();
        if (code != '') {
            var p_id = $(this).data('product');
            var data = {
                'action': 'apply_coupon_code',
                'p_id': p_id,
                'c_code': code
            };
            $.post(SampressionVar.ajaxurl, data, function (response) {
                console.log(response);
            });
            return false;
        }
        return false;
    });

    jQuery(document).bind('gform_post_render', function () {
        $('#gform_4 .gform_footer').append('<span class="spam-note">We hate spam, as much as you do.</span>');
    });

    /**
     *
     */
    if ($.cookie("sampression-cookie-notice") == null) {
        var div = '<div class="cookie-notice">This site uses cookies to optimise your user experience. By using this site you are consenting to our use of these cookies.<a class="got-it" href="javascript:void(0);">Got it</a> <a href="#">Learn More</a></div>';
        $('body').prepend(div);
    }
    $(document).on('click', '.cookie-notice a.got-it', function () {
        $('div.cookie-notice').slideUp("slow", function () {
            $(this).remove();
        });
        $.cookie("sampression-cookie-notice", 'yes', {expires: 1});
    });

    /* Mobile Menu (Full Width Navigation)
     * =============================*/
    //jQuery('.coupon-trigger a').click(function(e){
    // e.preventDefault();
    // jQuery(this).parent('.coupon-trigger').siblings(".coupon-form").animate({"height": "toggle"});
    //});

    /*signin form open and close*/
    $('.open-overlay').on('click', function () {
        $('.overlay').toggle();
    });
    $('.overlay-close').on('click', function () {
        $('.overlay').hide();
    })

    /*theme single comparison boc fixed to top and animate while referring to the comparison chart
    * ========================================================*/
    function fixDiv() {
        var $cache = $('#getFixed');
        if ($(window).scrollTop() > 250) {
            $cache.css({
                'position': 'fixed',
                'top': '0px',
                'z-index': 2,
                'padding': '20px 0',
                'box-shadow': '0px 11px 30px -20px rgba(0, 0, 0, 0.20)'
            });
            $('.min-height').css({
                'height': '140px'
            })

        }
        else {
            $cache.css({
                'position': 'relative',
                'top': 'auto',
                'box-shadow': 'none'
            });
            $('.min-height').css({
                'height': 'auto'
            })
        }
    }

    $(window).scroll(fixDiv);
    fixDiv();

    $('a.compare-link').click(function () {
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 999);
        return false;
    });

    $('.woocommerce').addClass('clearfix');
}); //end ready        ganeshhimal!@12            g0t00h3ll