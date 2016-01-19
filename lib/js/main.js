//==============================================================
// CUSTOM SCRIPTS
// 2014
// copyright sampression.com
// ==============================================================


jQuery(document).ready(function($) {

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

    /**
     *
     */
    $('form.cart').on( 'change', '.variations select', function( event ) {
        //console.log($(this).val());
//        if($('form.cart .varition-description').length > 0) {
//            $('form.cart .varition-description').remove();
//        }

        var variation_slug = $(this).val();
        var variation_term_name = $(this).attr('id');

        //console.log(jQuery('.varition-description.'+variation_slug));

        jQuery('.varition-description').css('display', 'none');
        jQuery('.varition-description.'+variation_slug).css('display', 'block');

        return false;/////
        var data = {
            action: 'sampression_variation_desc',
            slug: variation_slug,
            term_name: variation_term_name
        };
        jQuery.post(wc_add_to_cart_params.ajax_url, data,
        function(response){
            $(".single_variation").after('<div class="varition-description">'+response+'</div>');
            //console.log(response);
        });
        return false;
    });

//==============================================================
// Superfish
// ==============================================================
    $('.catdrop').superfish({
        delay: 0
    });
   $('span.sf-sub-indicator').remove();

//==============================================================
// WordPress specialist:.features-list .columns .icon-gears
// get Widget title as a widget class
// ==============================================================

    $('.widget_text').each(function() {
        var widgetTitle = $(this).find('.widget-title').text();
        var widgetTitleSlug = widgetTitle.replace(/ /gi, "-");
        widgetTitleSlug = widgetTitleSlug.toLowerCase();
        widgetTitleSlug = "widget-" + widgetTitleSlug;
        $(this).addClass(widgetTitleSlug);
    });


//    $('.toggle-nav').click(function() {
//        $('.main-nav').stop(true, true).slideToggle();
//        $(this).parent().addClass('toggled-on');
//    });


    //========================================//
    //slideshow for home page
    //========================================//
    $('.home-slider').flexslider({
        animation: "slide",
        directionNav: true,
        controlNav: true,
        smoothHeight: true,
        prevText: " ", //String: Set the text for the "previous" directionNav item
        nextText: " ",
        pauseOnHover: true,
        slideshow: false
    });

    //========================================//
    //slideshow for home page
    //========================================//
    $('#theme-slider').flexslider({
        animation: "fade",
        controlNav: false,
        pauseOnHover: true,
        prevText: " ", //String: Set the text for the "previous" directionNav item
        nextText: " "
    });


    // simple accordion
    jQuery('#expandable-panels').accordion({
        header: 'h4',
        autoheight: false,
        collapsible: true

    });


    var $container = $('#product-list');

    $container.isotope({
        itemSelector: '.product',
        transformsEnabled: true
    });


    var $optionSets = $('#options .option-set'),
            $optionLinks = $optionSets.find('a');

    $optionLinks.click(function() {
        var $this = $(this);
        // don't proceed if already selected
        if ($this.hasClass('selected')) {
            return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');

        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
                key = $optionSet.attr('data-option-key'),
                value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
            // changes in layout modes need extra logic
            changeLayoutMode($this, options)
        } else {
            // otherwise, apply new options
            $container.isotope(options);
        }

        return false;
    });

    jQuery('#get-cats').change(function() {
        var selector = jQuery(this).val();
        $container.isotope({filter: selector});
        return false;
    });
  

    $(function()
    {
        $('.scroll-pane').jScrollPane();
    });


    if ($(".svg").length > 0) {
        $('.features-list img[src*="png"]').attr('src', function() {
            return $(this).attr('src').replace('.png', '.svg');
        });
         $('.support-image img[src*="png"]').attr('src', function() {
            return $(this).attr('src').replace('.png', '.svg');
        });
    }


    /*-------------manage sale and new--------------*/
    $('ul.products li').each(function(){
        if($(this).find('.new-tag').length > 0 && $(this).find('.onsale').length > 0) {
            $(this).find('.new-tag').css('top', '23px');
            $(this).find('.onsale').css('top', '65px');
        } else if($(this).find('.new-tag').length > 0 && !$(this).find('.onsale').length > 0) {
            $(this).find('.new-tag').css('top', '23px');
        } else if(!$(this).find('.new-tag').length > 0 && $(this).find('.onsale').length > 0) {
            $(this).find('.onsale').css('top', '23px');
        }
    })

    /*-------------manage sale and new--------------*/
    if($('.page-id-189').length > 0) {
	$('#left-doc-nav').stickyfloat({ duration: 400 });
    }
    if (jQuery("#header-search").length > 0) {
        var d = !1;
        jQuery("#header-search .text-field").focus(function () {
            jQuery("#header-search").addClass("focused"), jQuery("#main-nav").addClass("fade")
        }), jQuery("#header-search .text-field").blur(function () {
            jQuery("#header-search #searchsubmit").mousedown(function () {
                d = !0
            }), d ? (d = !1, jQuery("#header-search").removeClass("focused"), jQuery("#main-nav").removeClass("fade")) : (jQuery("#header-search").removeClass("focused"), jQuery("#main-nav").removeClass("fade"))
        }), jQuery("#header-search").submit(function (a) {
            var b = jQuery(this).find(".text-field");
            b.val() || (a.preventDefault(), jQuery("#header-search .text-field").focus())
        })
    }



    //==============================================================
// Navigation
//==============================================================
// Add the 'show-nav' class to the body when the nav toggle is clicked
    $('.toggle-nav').click(function(e) {
// Prevent default behaviour
        e.preventDefault();
// Add the 'show-nav' class
        $('body').toggleClass('show-nav');
        $('#primary-nav').addClass('toggled-on');
// Add the 'vertical-transform' class
        $(this).toggleClass('vertical-transform');
    });
// Append 'nav-height-col' and 'sub-menu-toggle' only once after clicking '#trigger-primary-nav'
    $('.toggle-nav').one('click', function(e) {
// Prevent default behaviour
        e.preventDefault();
        $('#inner-wrapper').append('<div class="nav-height-col">manu background</div>');
// Append 'sub-menu-toggle'
    });
    if ($('.page_item_has_children').length > 0) {
        $('#primary-nav li.page_item_has_children').prepend('<i class="sub-menu-toggle"></i>');
        $('.sub-menu-toggle').click(function(e) {
// Prevent default behaviour
            e.preventDefault();
            if ($(this).hasClass('menu-open')) {
                $(this).parent('li.page_item_has_children').children('ul').slideToggle('fast');
                $(this).parent('li.page_item_has_children').removeClass('active');
                $('.main-nav-wrapper ul li').removeClass('inactive');
                $(this).toggleClass('menu-open');
            } else {
                $('.main-nav-wrapper ul li').addClass('inactive');
                $('.main-nav-wrapper ul li').removeClass('active');
                $('.sub-menu-toggle').removeClass('menu-open');
                $('.sub-menu-toggle').parent('li.page_item_has_children').children('ul').slideUp('fast');
                $(this).parent('li.page_item_has_children').children('ul').slideToggle('fast');
                $(this).parent('li.page_item_has_children').removeClass('inactive');
                $(this).parent('li.page_item_has_children').addClass('active');
                $(this).toggleClass('menu-open');
            }
        });
    }
//Fallback for menu
    if ($('ul.main-nav').length > 0) {
        $('#primary-nav li.menu-item-has-children').prepend('<i class="sub-menu-toggle"></i>');
        $('.sub-menu-toggle').click(function(e) {
// Prevent default behaviour
            e.preventDefault();
            if ($(this).hasClass('menu-open')) {
                $(this).parent('li.menu-item-has-children').children('ul').slideToggle('fast');
                $(this).parent('li.menu-item-has-children').removeClass('active');
                $('ul.main-nav li').removeClass('inactive');
                $(this).toggleClass('menu-open');
            } else {
                $('ul.main-nav li').addClass('inactive');
                $('ul.main-nav li').removeClass('active');
                $('.sub-menu-toggle').removeClass('menu-open');
                $('.sub-menu-toggle').parent('li.menu-item-has-children').children('ul').slideUp('fast');
                $(this).parent('li.menu-item-has-children').children('ul').slideToggle('fast');
                $(this).parent('li.menu-item-has-children').removeClass('inactive');
                $(this).parent('li.menu-item-has-children').addClass('active');
                $(this).toggleClass('menu-open');
            }
        });
    }

    /* responsive-tables.js

     */

    var switched = false;
    var updateTables = function() {
        if (($(window).width() < 767) && !switched ){
            switched = true;
            $("table.responsive").each(function(i, element) {
                splitTable($(element));
            });
            return true;
        }
        else if (switched && ($(window).width() > 767)) {
            switched = false;
            $("table.responsive").each(function(i, element) {
                unsplitTable($(element));
            });
        }
    };

    $(window).load(updateTables);
    $(window).on("redraw",function(){switched=false;updateTables();}); // An event to listen for
    $(window).on("resize", updateTables);


    function splitTable(original)
    {
        original.wrap("<div class='table-wrapper' />");

        var copy = original.clone();
        copy.find("td:not(:first-child), th:not(:first-child)").css("display", "none");
        copy.removeClass("responsive");

        original.closest(".table-wrapper").append(copy);
        copy.wrap("<div class='pinned' />");
        original.wrap("<div class='scrollable' />");

        setCellHeights(original, copy);
    }

    function unsplitTable(original) {
        original.closest(".table-wrapper").find(".pinned").remove();
        original.unwrap();
        original.unwrap();
    }

    function setCellHeights(original, copy) {
        var tr = original.find('tr'),
            tr_copy = copy.find('tr'),
            heights = [];

        tr.each(function (index) {
            var self = $(this),
                tx = self.find('th, td');

            tx.each(function () {
                var height = $(this).outerHeight(true);
                heights[index] = heights[index] || 0;
                if (height > heights[index]) heights[index] = height;
            });

        });

        tr_copy.each(function (index) {
            $(this).height(heights[index]);
        });
    }

    /*

    // FancyBox Custom Effect
    (function ($, F) {
        F.transitions.dropIn = function() {
            var endPos = F._getPosition(true);

            endPos.top = (parseInt(endPos.top, 10) - 200) + 'px';

            F.wrap.css(endPos).show().animate({
                top: '+=200px'
            }, {
                duration: F.current.openSpeed,
                complete: F._afterZoomIn
            });
        };

        F.transitions.dropOut = function() {
            F.wrap.removeClass('fancybox-opened').animate({
                top: '-=200px'
            }, {
                duration: F.current.closeSpeed,
                complete: F._afterZoomOut
            });
        };

    }(jQuery, jQuery.fancybox));

    if($.cookie("sampressionPopup") == null) {
        setTimeout( function() {
            $('#hidden-link').fancybox({closeClick  : false, // prevents closing when clicking INSIDE fancybox
             openMethod : 'dropIn',
                closeMethod : 'dropOut',
             openEasing : 'swing',
             helpers   : {
                overlay : {closeClick: false} // prevents closing when clicking OUTSIDE fancybox
            }}).trigger('click'); },2000);

    }

    $(document).on('click', '.fancybox-close', function() {
       $.cookie("sampressionPopup", 'yes', { expires: 60 });
    });
*/

});
// end ready function here.
