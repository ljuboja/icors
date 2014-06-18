/*! PROJECT_NAME - v0.1.0 - 2014-06-18
* http://PROJECT_WEBSITE/
* Copyright (c) 2014 YOUR_NAME; Licensed MIT */
// jCarouselLite 1.0.1
// Modified by WPShower
(function($) {
    $.fn.jCarouselLite = function(o) {
        o = $.extend({btnPrev:null,btnNext:null,btnGo:null,mouseWheel:false,auto:null,speed:200,easing:null,vertical:false,circular:true,visible:3,start:0,scroll:1,beforeStart:null,afterEnd:null}, o || {});
        return this.each(function() {
            var b = false,animCss = o.vertical ? "top" : "left",sizeCss = o.vertical ? "height" : "width";
            var c = $(this),ul = $("ul", c),tLi = $("li", ul),tl = tLi.size(),v = o.visible;
            if ( $("li", ul).size() <= o.visible ) {
                o.circular = false;
            }
            $("li", ul).each(function(i) {
                var it = i + 1;
                $(this).find('a').attr('rev', 'item' + it);
            });

            if (o.circular) {
                ul.prepend(tLi.slice(tl - v - 1 + 1).clone()).append(tLi.slice(0, v).clone());
                o.start += v
            }
            var f = $("li", ul),itemLength = f.size(),curr = o.start;
            c.css("visibility", "visible");
            f.css({overflow:"hidden",float:o.vertical ? "none" : "left"});
            ul.css({margin:"0",padding:"0",position:"relative","list-style-type":"none","z-index":"1"});
            c.css({overflow:"hidden",position:"relative","z-index":"2",left:"0px"});
            var g = o.vertical ? height(f) : width(f);
            var h = g * itemLength;
            var j = g * v;
            f.css({width:f.width(),height:f.height(equalHeight(f))});
            ul.css(sizeCss, h + "px").css(animCss, -(curr * g));
            c.css(sizeCss, j + "px");
            if (o.btnPrev)$(o.btnPrev).click(function() {return go(curr - o.scroll)});
            if (o.btnNext)$(o.btnNext).click(function() {return go(curr + o.scroll)});
            if (o.btnGo)$.each(o.btnGo, function(i, a) {$(a).click(function() {return go(o.circular ? o.visible + i : i)})});
            if (o.mouseWheel && c.mousewheel)c.mousewheel(function(e, d) {return d > 0 ? go(curr - o.scroll) : go(curr + o.scroll)});
            if (o.auto)setInterval(function() {go(curr + o.scroll)}, o.auto + o.speed);
            function vis() {return f.slice(curr).slice(0, v)}

            ;
            function go(a) {
                if (!b) {
                    if (o.beforeStart)o.beforeStart.call(this, vis());
                    if (o.circular) {
                        if (a <= o.start - v - 1) {
                            ul.css(animCss, -((itemLength - (v * 2)) * g) + "px");
                            curr = a == o.start - v - 1 ? itemLength - (v * 2) - 1 : itemLength - (v * 2) - o.scroll
                        } else if (a >= itemLength - v + 1) {
                            ul.css(animCss, -((v) * g) + "px");
                            curr = a == itemLength - v + 1 ? v + 1 : v + o.scroll
                        } else curr = a
                    } else {if (a < 0 || a > itemLength - v)return; else curr = a}
                    b = true;
                    ul.animate(animCss == "left" ? {left:-(curr * g)} : {top:-(curr * g)}, o.speed, o.easing, function() {
                        if (o.afterEnd)o.afterEnd.call(this, vis());
                        b = false
                    });
                    if (!o.circular) {
                        $(o.btnPrev + "," + o.btnNext).removeClass("disabled");
                        $((curr - o.scroll < 0 && o.btnPrev) || (curr + o.scroll > itemLength - v && o.btnNext) || []).addClass("disabled")
                    }
                }
                return false
            }
        })
    };
    function css(a, b) {return parseInt($.css(a[0], b)) || 0}

    ;
    function width(a) {return a[0].offsetWidth + css(a, 'marginLeft') + css(a, 'marginRight')}

    ;
    function height(a) {return a[0].offsetHeight + css(a, 'marginTop') + css(a, 'marginBottom')}
    function equalHeight(a){
        var tallest = 0;
        if ( a.size() > 1 ) {
            a.each(function(){
                var height = $(this).height();
                if (tallest < height) tallest = height;
            });
        } else {
            tallest = a.height();
        }
        return tallest;
    }
})(jQuery);

jQuery(document).ready(function() {
    // Infinite Scroll
    jQuery('#loop').infinitescroll({
        navSelector : '#pagination .infinitescroll',
        nextSelector : 'a.nextpostslink',  // selector for the NEXT link (to page 2)
        itemSelector : '#loop .hentry, #loop .clear',     // selector for all items you'll retrieve
        loadingImg : '',
        loadingText: '',
        donetext  : '',
        debug: false
    },
        function() {
            contentBorder();
        }
    );
});

(function ($) {
$.fn.marquee = function (klass) {
var newMarquee = [],
last = this.length;
 
// works out the left or right hand reset position, based on scroll
// behavior, current direction and new direction
function getReset(newDir, marqueeRedux, marqueeState) {
var behavior = marqueeState.behavior, width = marqueeState.width, dir = marqueeState.dir;
var r = 0;
if (behavior == 'alternate') {
r = newDir == 1 ? marqueeRedux[marqueeState.widthAxis] - (width*2) : width;
} else if (behavior == 'slide') {
if (newDir == -1) {
r = dir == -1 ? marqueeRedux[marqueeState.widthAxis] : width;
} else {
r = dir == -1 ? marqueeRedux[marqueeState.widthAxis] - (width*2) : 0;
}
} else {
r = newDir == -1 ? marqueeRedux[marqueeState.widthAxis] : 0;
}
return r;
}
 
// single "thread" animation
function animateMarquee() {
var i = newMarquee.length,
marqueeRedux = null,
$marqueeRedux = null,
marqueeState = {},
newMarqueeList = [],
hitedge = false;
while (i--) {
marqueeRedux = newMarquee[i];
$marqueeRedux = $(marqueeRedux);
marqueeState = $marqueeRedux.data('marqueeState');
if ($marqueeRedux.data('paused') !== true) {
// TODO read scrollamount, dir, behavior, loops and last from data
marqueeRedux[marqueeState.axis] += (marqueeState.scrollamount * marqueeState.dir);
 
// only true if it's hit the end
hitedge = marqueeState.dir == -1 ? marqueeRedux[marqueeState.axis] <= getReset(marqueeState.dir * -1, marqueeRedux, marqueeState) : marqueeRedux[marqueeState.axis] >= getReset(marqueeState.dir * -1, marqueeRedux, marqueeState);
if ((marqueeState.behavior == 'scroll' && marqueeState.last == marqueeRedux[marqueeState.axis]) || (marqueeState.behavior == 'alternate' && hitedge && marqueeState.last != -1) || (marqueeState.behavior == 'slide' && hitedge && marqueeState.last != -1)) {
if (marqueeState.behavior == 'alternate') {
marqueeState.dir *= -1; // flip
}
marqueeState.last = -1;
 
$marqueeRedux.trigger('stop');
 
marqueeState.loops--;
if (marqueeState.loops === 0) {
if (marqueeState.behavior != 'slide') {
marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir, marqueeRedux, marqueeState);
} else {
// corrects the position
marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir * -1, marqueeRedux, marqueeState);
}
 
$marqueeRedux.trigger('end');
} else {
// keep this marquee going
newMarqueeList.push(marqueeRedux);
$marqueeRedux.trigger('start');
marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir, marqueeRedux, marqueeState);
}
} else {
newMarqueeList.push(marqueeRedux);
}
marqueeState.last = marqueeRedux[marqueeState.axis];
 
// store updated state only if we ran an animation
$marqueeRedux.data('marqueeState', marqueeState);
} else {
// even though it's paused, keep it in the list
newMarqueeList.push(marqueeRedux);
}
}
 
newMarquee = newMarqueeList;
if (newMarquee.length) {
setTimeout(animateMarquee, 25);
}
}
// TODO consider whether using .html() in the wrapping process could lead to loosing predefined events...
this.each(function (i) {
var $marquee = $(this),
width = $marquee.attr('width') || $marquee.width(),
height = $marquee.attr('height') || $marquee.height(),
$marqueeRedux = $marquee.after('<div ' + (klass ? 'class="' + klass + '" ' : '') + 'style="display: block-inline; width: ' + width + 'px; height: ' + height + 'px; overflow: hidden;"><div style="float: left; white-space: nowrap;">' + $marquee.html() + '</div></div>').next(),
marqueeRedux = $marqueeRedux.get(0),
hitedge = 0,
direction = ($marquee.attr('direction') || 'left').toLowerCase(),
marqueeState = {
dir : /down|right/.test(direction) ? -1 : 1,
axis : /left|right/.test(direction) ? 'scrollLeft' : 'scrollTop',
widthAxis : /left|right/.test(direction) ? 'scrollWidth' : 'scrollHeight',
last : -1,
loops : $marquee.attr('loop') || -1,
scrollamount : $marquee.attr('scrollamount') || this.scrollAmount || 2,
behavior : ($marquee.attr('behavior') || 'scroll').toLowerCase(),
width : /left|right/.test(direction) ? width : height
};
// corrects a bug in Firefox - the default loops for slide is -1
if ($marquee.attr('loop') == -1 && marqueeState.behavior == 'slide') {
marqueeState.loops = 1;
}
 
$marquee.remove();
// add padding
if (/left|right/.test(direction)) {
$marqueeRedux.find('> div').css('padding', '0 ' + width + 'px');
} else {
$marqueeRedux.find('> div').css('padding', height + 'px 0');
}
// events
$marqueeRedux.bind('stop', function () {
$marqueeRedux.data('paused', true);
}).bind('pause', function () {
$marqueeRedux.data('paused', true);
}).bind('start', function () {
$marqueeRedux.data('paused', false);
}).bind('unpause', function () {
$marqueeRedux.data('paused', false);
}).data('marqueeState', marqueeState); // finally: store the state
// todo - rerender event allowing us to do an ajax hit and redraw the marquee
 
newMarquee.push(marqueeRedux);
 
marqueeRedux[marqueeState.axis] = getReset(marqueeState.dir, marqueeRedux, marqueeState);
$marqueeRedux.trigger('start');
// on the very last marquee, trigger the animation
if (i+1 == last) {
animateMarquee();
}
});
 
return $(newMarquee);
};
}(jQuery));
(function(A){A.fn.infinitescroll=function(R,O){function E(){if(B.debug){window.console&&console.log.call(console,arguments)}}function H(T){for(var S in T){if(S.indexOf&&S.indexOf("Selector")>-1&&A(T[S]).length===0){E("Your "+S+" found no elements.");return false}return true}}function N(S){S.match(C)?S.match(C)[2]:S;if(S.match(/^(.*?)\b2\b(.*?$)/)){S=S.match(/^(.*?)\b2\b(.*?$)/).slice(1)}else{if(S.match(/^(.*?)2(.*?$)/)){if(S.match(/^(.*?page=)2(\/.*|$)/)){S=S.match(/^(.*?page=)2(\/.*|$)/).slice(1);return S}E("Trying backup next selector parse technique. Treacherous waters here, matey.");S=S.match(/^(.*?)2(.*?$)/).slice(1)}else{if(S.match(/^(.*?page=)1(\/.*|$)/)){S=S.match(/^(.*?page=)1(\/.*|$)/).slice(1);return S}E("Sorry, we couldn't parse your Next (Previous Posts) URL. Verify your the css selector points to the correct A tag. If you still get this error: yell, scream, and kindly ask for help at infinite-scroll.com.");K.isInvalidPage=true}}return S}function L(){return B.localMode?(A(K.container)[0].scrollHeight&&A(K.container)[0].scrollHeight):A(document).height()}function F(){var S=0+L()-(B.localMode?A(K.container).scrollTop():(A(K.container).scrollTop()||A(K.container.ownerDocument.body).scrollTop()))-A(B.localMode?K.container:window).height();E("math:",S,K.pixelsFromNavToBottom);return(S-B.bufferPx<K.pixelsFromNavToBottom)}function M(){K.loadingMsg.find("img").hide().parent().find("div").html(B.donetext).animate({opacity:1},2000).fadeOut("normal");B.errorCallback()}function D(){if(K.isDuringAjax||K.isInvalidPage||K.isDone){return }if(!F(B,K)){return }A(document).trigger("retrieve.infscr")}function G(){K.isDuringAjax=true;K.loadingMsg.appendTo(B.contentSelector).show();A(B.navSelector).hide();K.currPage++;E("heading into ajax",Q);J=A(B.contentSelector).is("table")?A("<tbody/>"):A("<div/>");P=document.createDocumentFragment();J.load(Q.join(K.currPage)+" "+B.itemSelector,null,I)}function I(){if(K.isDone){M();return false}else{var T=J.children().get();if(T.length==0){return A.event.trigger("ajaxError",[{status:404}])}while(J[0].firstChild){P.appendChild(J[0].firstChild)}A(B.contentSelector)[0].appendChild(P);K.loadingMsg.fadeOut("normal");if(B.animate){var S=A(window).scrollTop()+A("#infscr-loading").height()+B.extraScrollPx+"px";A("html,body").animate({scrollTop:S},800,function(){K.isDuringAjax=false})}O.call(A(B.contentSelector)[0],T);if(!B.animate){K.isDuringAjax=false}}}A.browser.ie6=A.browser.msie&&A.browser.version<7;var B=A.extend({},A.infinitescroll.defaults,R),K=A.infinitescroll,J,P;O=O||function(){};if(!H(B)){return false}K.container=B.localMode?this:document.documentElement;B.contentSelector=B.contentSelector||this;var C=/(.*?\/\/).*?(\/.*)/,Q=A(B.nextSelector).attr("href");if(!Q){E("Navigation selector not found");return }Q=N(Q);if(B.localMode){A(K.container)[0].scrollTop=0}K.pixelsFromNavToBottom=L()+(K.container==document.documentElement?0:A(K.container).offset().top)-A(B.navSelector).offset().top;K.loadingMsg=A('<div id="infscr-loading" style="text-align: center;">'+B.loadingImg+'<div>'+B.loadingText+"</div></div>");(new Image()).src=B.loadingImg;A(document).ajaxError(function(T,U,S){E("Page not found. Self-destructing...");if(U.status==404){M();K.isDone=true;A(B.localMode?this:window).unbind("scroll.infscr")}});A(B.localMode?this:window).bind("scroll.infscr",D).trigger("scroll.infscr");A(document).bind("retrieve.infscr",G);return this};A.infinitescroll={defaults:{debug:false,preload:false,nextSelector:"div.navigation a:first",loadingImg:"http://www.infinite-scroll.com/loading.gif",loadingText:"<em>Loading the next set of posts...</em>",donetext:"<em>Congratulations, you've reached the end of the internet.</em>",navSelector:"div.navigation",contentSelector:null,extraScrollPx:150,itemSelector:"div.post",animate:false,localMode:false,bufferPx:40,errorCallback:function(){}},loadingImg:undefined,loadingMsg:undefined,container:undefined,currPage:1,currDOMChunk:null,isDuringAjax:false,isInvalidPage:false,isDone:false}})(jQuery);

// DropDown menu
var ddmenu={
    buildmenu:function(menuid){
        jQuery(document).ready(function($){
            var $mainmenu=jQuery("#"+menuid+">ul");
            $mainmenu.children('li:first').addClass('first');
            $mainmenu.children('li:last').addClass('last');

            jQuery("#"+menuid+">ul>li.parent").each(function(){
                var level2 = jQuery(this).find('ul:eq(0)');
                if ( level2.width() < jQuery(this).outerWidth(true) ) {
                    level2.width(jQuery(this).outerWidth(true));
                }
            });

            var $headers=$mainmenu.find("ul").parent();
            $headers.each(function(i){
                var $subul=jQuery(this).find('ul:eq(0)');
                this._dimensions={
                    w:this.offsetWidth,
                    h:this.offsetHeight,
                    subulw:$subul.outerWidth(),
                    subulh:$subul.outerHeight()
                }
                this.istopheader=jQuery(this).parents("ul").length==1? true : false;
                $subul.css({top:this.istopheader? this._dimensions.h+"px" : 0});

                jQuery(this).hover(
                    function(e){
                        jQuery(this).addClass('ddhover').children("a").addClass('ddhover');
                        var $targetul=jQuery(this).children("ul:eq(0)");
                        this._offsets={
                            left:jQuery(this).offset().left,
                            top:jQuery(this).offset().top
                        }
                        var menuleft=this.istopheader? 0 : this._dimensions.w;
                        menuleft=(this._offsets.left+menuleft+this._dimensions.subulw>jQuery(window).width())? (this.istopheader? -this._dimensions.subulw+this._dimensions.w : -this._dimensions.w) : menuleft;
                        $targetul.css({
                            left:menuleft+"px",
                            width:this._dimensions.subulw+'px',
                            visibility: 'visible'
                        });
                    },
                    function(e){
                        jQuery(this).children("ul:eq(0)").css('visibility', 'hidden');
                        jQuery(this).removeClass('ddhover').children("a:eq(0)").removeClass('ddhover');
                    }
                ); //end hover
                jQuery(this).click(function(){
                    jQuery(this).children("ul:eq(0)").hide()
                });
            }); //end $headers.each()
        });
    }
}
ddmenu.buildmenu("navigation");
ddmenu.buildmenu("top-menu");

// Equal height
function setEqualHeight(blocks){
    blocks = jQuery(blocks);
    if ( blocks.length > 1 ) {
        var tallest = 0;
        blocks.each(function(){
            var height = jQuery(this).height();
            if (tallest < height) tallest = height;
        });
        blocks.height(tallest);
    }
}

// Funstions for cookies
function setCookie(name,value,period) {
    if (period) {
        var date = new Date();
        date.setTime(date.getTime()+(period*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function deleteCookie(name) {
    setCookie(name,"",-1);
}

// Border between content and sidebar
function contentBorder(){
    if ( jQuery('#content').height() >= jQuery('#sidebar').height() ) {
        jQuery('#sidebar').removeClass('bl');
        jQuery('#content').addClass('br');
    } else {
        jQuery('#content').removeClass('br');
        jQuery('#sidebar').addClass('bl');
    }
    return true;
}

// Comment form and contact form validation
function validate(loggedin) {
    if ( loggedin === false ) {
        var author = jQuery('#author, #cf_name');
        var email = jQuery('#email, #cf_email');
        var comment = jQuery('#comment, #cf_message');
        var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        if ( author.val() == '' || !filter.test(email.val()) || comment.val() == '' ) {
            if ( author.val() == '' ) {
                author.parent().addClass('alert-field').next().show();
                author.focus(function(){
                    jQuery(this).parent().removeClass('alert-field').next().hide();
                });
            }
            if ( !filter.test(email.val()) ) {
                email.parent().addClass('alert-field').next().show();
                email.focus(function(){
                    jQuery(this).parent().removeClass('alert-field').next().hide();
                });
            }
            if ( comment.val() == '' ) {
                comment.parent().addClass('alert-field').next().show();
                comment.focus(function(){
                    jQuery(this).parent().removeClass('alert-field').next().hide();
                });
            }
            return false;
        }
    } else if ( loggedin === true ) {
        var comment = jQuery('#comment, #cf_message');
        if ( comment.val() == '' ) {
            if ( comment.val() == '' ) {
                comment.parent().addClass('alert-field').next().show();
                comment.focus(function(){
                    jQuery(this).parent().removeClass('alert-field').next().hide();
                });
            }
            return false;
        }
    }

}

jQuery(document).ready(function() {
    // Editor's choice init
    if ( jQuery('.choice-inn ul').length > 0 ) {
        jQuery('.choice-inn').jCarouselLite({
            btnNext: ".choice .next",
            btnPrev: ".choice .prev",
            visible: 4,
            scroll: 1
        });
    }

    // View modes functions
    jQuery('#mode').toggle(
        function(){
            if ( jQuery('#loop').hasClass('list') ) {
                grid();
            } else {
                list();
            }
        },
        function(){
            if ( jQuery('#loop').hasClass('grid') ) {
                list();
            } else {
                grid();
            }
        }
    );

    function grid(){
        jQuery('#mode').addClass('flip');
        jQuery('#loop')
            .fadeOut('fast', function(){
                jQuery('#loop').addClass('grid').removeClass('list');
                jQuery('.hentry:eq(0), .hentry:eq(1)').addClass('nb');
                jQuery(this).fadeIn('fast');
            })
        ;
        setCookie('mode', 'grid', 60*60*24*30);
    }

    function list(){
        jQuery('#mode').removeClass('flip');
        jQuery('#loop')
            .fadeOut('fast', function(){
                jQuery('#loop').addClass('list').removeClass('grid');
                jQuery('.hentry:eq(1)').removeClass('nb');
                jQuery(this).fadeIn('fast');
            })
        ;
        setCookie('mode', 'list', 60*60*24*30);
    }

    // Ajax-fetching "Load more posts"
    jQuery('#pagination .fetch a.nextpostslink').live('click', function(e){
        e.preventDefault();
        jQuery(this).addClass('loading').text('Loading...');
        jQuery.ajax({
            type: "GET",
            url: jQuery(this).attr('href') + '#loop',
            dataType: "html",
            success: function(out){
                result = jQuery(out).find('#loop .post, #loop .clear');
                nextlink = jQuery(out).find('#pagination .fetch a').attr('href');
                jQuery('#loop').append(result);
                contentBorder();
                jQuery('#pagination .fetch a.nextpostslink').removeClass('loading').text('Load more posts');
                if (nextlink != undefined) {
                    jQuery('#pagination .fetch a.nextpostslink').attr('href', nextlink);
                } else {
                    jQuery('#pagination').remove();
                }
            }
        });
    });

    // Shortcodes support
    jQuery('.wide').detach().prependTo('.hentry-container');
    jQuery('.aside').detach().appendTo('.hentry-sidebar');

    // Floating sharebox
    if ( !(jQuery.browser.msie && parseInt(jQuery.browser.version) <= 6) ) {
        var sharebox = jQuery('#sharebox');
        var container = jQuery('.hentry-container');
        if(container.length > 0){
            var descripY = parseInt(container.offset().top);
            sharebox.css({
                position: 'absolute',
                top: descripY
            });
            jQuery(window).scroll(function () {
                var scrollY = jQuery(window).scrollTop();
                var fixedShare = sharebox.css('position') == 'fixed';
                if(sharebox.length > 0){
                    if ( scrollY >= descripY && !fixedShare ) {
                        sharebox.stop().css({
                            position: 'fixed',
                            top: 20
                        });
                    } else if ( scrollY < descripY && fixedShare ) {
                        sharebox.css({
                            position: 'absolute',
                            top: descripY
                        });
                    }
                }
            });
        }
    }

    // Fancybox init
    jQuery(".gallery a").attr('rel', 'gallery');
    jQuery("a[rel=gallery]").fancybox({
		'titlePosition': 'inside',
        'overlayColor': '#000',
        'overlayOpacity': 0.9
	});

    // Tabs
    jQuery('.tabs-section').find('.tabs-box:first').addClass('visible');
    jQuery('ul.tabs-list').each(function() {
        jQuery(this).find('li').each(function(i) {
            jQuery(this).click(function() {
                jQuery(this).addClass('tabs-current').siblings().removeClass('tabs-current');
                var p = jQuery(this).parents('div.tabs-section');
                p.find('div.tabs-box').hide();
                p.find('div.tabs-box:eq(' + i + ')').show();
            });
        });
    });

    // Set equal height for columns
    setEqualHeight('.footer-leftpart, .footer-middlepart, .footer-linkset');
    setEqualHeight('.category-inn > div');
    setEqualHeight('.recommended-item');

    // Styles fix
    contentBorder();
    jQuery('#author, #email, #url, #comment, #cf_name, #cf_email, #cf_subject, #cf_message')
        .focusin(function(){
            jQuery(this).parent().addClass('focus')
        })
        .focusout(function(){
            jQuery(this).parent().removeClass('focus')
        });
    jQuery('.header-searchform #s')
        .focusin(function(){
            jQuery(this).closest('.header-searchform').addClass('focus');
        })
        .focusout(function(){
            jQuery(this).closest('.header-searchform').removeClass('focus');
        });
    jQuery('.widget_search #s')
        .focusin(function(){
            jQuery(this).addClass('focus');
        })
        .focusout(function(){
            jQuery(this).removeClass('focus');
    });
    jQuery('.bottom-widgetarea-inn .widget:nth-child(3n)').after('<br style="clear: both;"/>');
    jQuery('.recommended-item:last, .hentry-similar li:last, .latest-news li:last, .comment:first, #respond tr:last td, #contactform tr:last td, .list .hentry:eq(0), .grid .hentry:eq(0), .grid .hentry:eq(1)').addClass('nb');
});
