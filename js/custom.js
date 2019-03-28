jQuery(window).load(function () {
     "use strict";
     jQuery('body').find("#nav").css('pointer-events', 'auto');
});

jQuery(document).ready(function () {
    "use strict";
    if (jQuery(window).width() > 900) {
        openeffect();
        setTimeout(arc, 1000);
    /////////* MENU *///////////   
    jQuery('#nav > li').hover(function() {
    jQuery('> ul', this).toggle();
    });
    jQuery('#nav > li > ul > li').hover(function() {
    jQuery('> ul', this).toggle();
    });
    }
    function arc() {
    "use strict";
    jQuery('body').find('#center').stop().show();
    }
    /////////* TABS *///////////
    jQuery("body").find("#tab-content div").hide();
    jQuery("body").find("#tabs li:first").attr("id", "current");
    jQuery("body").find("#tab-content div:first").fadeIn();

    jQuery("body").find('#tabs a').on("click", function (e) {
        e.preventDefault();
        jQuery("body").find("#tab-content div").hide();
        jQuery("body").find("#tabs li").attr("id", "");
        jQuery(this).parent().attr("id", "current");
        jQuery('#' + jQuery(this).attr('data-rel')).fadeIn();
    });
    /////////* CONTENT-TABS *///////////
    jQuery("body").find("#content-tab-content div").hide();
    jQuery("body").find("#content-tabs li:first").attr("id", "current");
    jQuery("body").find("#content-tab-content div:first").fadeIn();

    jQuery("body").find('#content-tabs a').on("click", function (e) {
        e.preventDefault();
        jQuery("body").find("#content-tab-content div").hide();
        jQuery("body").find("#content-tabs li").attr("id", "");
        jQuery(this).parent().attr("id", "current");
        jQuery('#' + jQuery(this).attr('data-rel')).fadeIn();
    });
});
/////////////////* ACCORDION */////////////////////////

jQuery(document).ready(function () {
    "use strict";
    jQuery('.accordion-header').toggleClass('inactive-header');

    var contentwidth = jQuery('.accordion-header').width();
    jQuery('.accordion-content').css({ 'width': contentwidth });

    jQuery('.accordion-header').on("click", function () {
        if (jQuery(this).is('.inactive-header')) {
            jQuery('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
            jQuery(this).toggleClass('active-header').toggleClass('inactive-header');
            jQuery(this).next().slideToggle().toggleClass('open-content');
        }

        else {
            jQuery(this).toggleClass('active-header').toggleClass('inactive-header');
            jQuery(this).next().slideToggle().toggleClass('open-content');
        }
    });

    return false;
});
/* Sidebar Animations */
function openeffect() {
    "use strict";
    jQuery('body').find('#left-menu-icon').stop().show().animate({
        'right': '50%'
    }, 1000);
}
if (jQuery(window).width() > 900) {
    
    jQuery('body').find('#left-menu-icon').on("click",
function () {
    "use strict";
    jQuery('body').find('#left-menu-icon').stop().animate({
        'right': '0%'
    }, 10);
    jQuery('body').find('#center').stop().animate({
        'right': '50%'
    }, 500);
    jQuery('body').find('#left-menu-close-icon').stop().toggle();
});

jQuery('body').find('#left-menu-close-icon').on("click",
function () {
    "use strict";
    jQuery('body').find('#left-menu-close-icon').stop().toggle();
    jQuery('body').find('#center').stop().delay(100).animate({
        'right': '0%'
    }, 1000);
    jQuery('body').find('#left-menu-icon').stop().delay(100).animate({
        'right': '50%'
    }, 500);
});
}
if (jQuery(window).width() < 900) {
    jQuery('body').find('#left-menu-icon').on("click",
function () {
    "use strict";
    jQuery('body').find('#left-menu-icon').hide();
    jQuery('body').find('#center').show();
    jQuery('body').find('#right').hide();
    jQuery('body').find('#logo').hide();
    jQuery('body').find('#left-menu-close-icon').stop().show();

    jQuery('body').find('#left-menu-close-icon').on("click",
function () {
    jQuery('body').find('#left-menu-close-icon').stop().hide();
    jQuery('body').find('#center').hide();
    jQuery('body').find('#right').show();
    jQuery('body').find('#logo').show();
    jQuery('body').find('#left-menu-icon').stop().show();
});
});
}
var width = jQuery(window).width();
jQuery(window).resize(function() {
    "use strict";
    if (width > 900 && jQuery(window).width() < 900) {
        if (window.RT) clearTimeout(window.RT);
        window.RT = setTimeout(function()
                               {
                                   location.reload();
                               }, 200);
    }
    else if (width < 900 && jQuery(window).width() > 900) {
        if (window.RT) clearTimeout(window.RT);
        window.RT = setTimeout(function()
                               {
                                   location.reload();
                               }, 200);
    }
});

window.onorientationchange = function()
{
    "use strict";
   window.location.reload();
};    
/////////////////* Go to top link */////////////////////////

jQuery("#right").find('#top').on("click", function () {
    "use strict";
    var bdy = jQuery('body').find('#right');
    bdy.animate({ scrollTop: 0 }, 'slow');
});
jQuery("#fullwidth-right").find('#top2').on("click", function () {
    "use strict";
    var bdy = jQuery('body').find('#fullwidth-right');
    bdy.animate({ scrollTop: 0 }, 'slow');
});