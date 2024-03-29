/*
    * jReject (jQuery Browser Rejection Plugin)
    * Version 0.6.1-Beta
    * URL: http://jreject.turnwheel.com/
    * Description: jReject gives you a customizable and easy solution to reject/allowing specific browsers access to your pages
    * Author: Steven Bower (TurnWheel Designs) http://turnwheel.com/
    * Copyright: Copyright (c) 2009 Steven Bower under dual MIT/GPL license.
    * Depends On: jQuery Browser Plugin (http://jquery.thewikies.com/browser)
 */

(function($) {
    $.reject = function(opts) {
        var opts = $.extend(true,{
            reject : { // Rejection flags for specific browsers
                all: false, // Covers Everything (Nothing blocked)
                msie5: true, msie6: true, msie7: true // Covers MSIE 5-6 (Blocked by default)
                /*
                    Possibilities are endless...

                    msie: false,msie5: true,msie6: true,msie7: false,msie8: false, // MSIE Flags (Global, 5-8)
                    firefox: false,firefox1: false,firefox2: false,firefox3: false, // Firefox Flags (Global, 1-3)
                    konqueror: false,konqueror1: false,konqueror2: false,konqueror3: false, // Konqueror Flags (Global, 1-3)
                    chrome: false,chrome1: false,chrome2: false,chrome3: false,chrome4: false, // Chrome Flags (Global, 1-4)
                    safari: false,safari2: false,safari3: false,safari4: false, // Safari Flags (Global, 1-4)
                    opera: false,opera7: false,opera8: false,opera9: false,opera10: false, // Opera Flags (Global, 7-10)
                    gecko: false,webkit: false,trident: false,khtml: false,presto: false, // Rendering Engines (Gecko, Webkit, Trident, KHTML, Presto)
                    win: false,mac: false,linux : false,solaris : false,iphone: false, // Operating Systems (Win, Mac, Linux, Solaris, iPhone)
                    unknown: false // Unknown covers everything else
                */
            },
            display: [], // What browsers to display and their order (default set below)
            browserInfo: { // Settings for which browsers to display
                firefox: {
                    text: 'Firefox 3.5+', // Text below the icon
                    url: 'http://www.mozilla.com/firefox/' // URL For icon/text link
                },
                safari: {
                    text: 'Safari 3+',
                    url: 'http://www.apple.com/safari/download/'
                },
                opera: {
                    text: 'Opera 9+',
                    url: 'http://www.opera.com/download/'
                },
                chrome: {
                    text: 'Chrome 2+',
                    url: 'http://www.google.com/chrome/'
                },
                msie: {
                    text: 'Internet Explorer 7+',
                    url: 'http://www.microsoft.com/windows/Internet-explorer/default.aspx'
                },
                gcf: {
                    text: 'Google Chrome Frame',
                    url: 'http://code.google.com/chrome/chromeframe/',
                    allow: { all: false, msie: true } // This browser option will only be displayed for MSIE
                }
            },
            // Header of pop-up window
            header: 'Did you know that your Internet Browser is out of date?',
            // Paragraph 1
            paragraph1: 'Your browser is out of date, and may not be compatible with '+
                'our website. A list of the most popular web browsers can be '+
                'found below.',
            // Paragraph 2
            paragraph2: 'Just click on the icons to get to the download page',
            close: true, // Allow closing of window
            // Message displayed below closing link
            closeMessage: 'By closing this window you acknowledge that your experience '+
                'on this website may be degraded',
            closeLink: 'Close This Window', // Text for closing link
            closeURL: '#', // Close URL
            closeESC: true, // Allow closing of window with esc key
            closeCookie: true, // If cookies should be used to remmember if the window was closed (applies to current session only)
            imagePath: './img/jReject/', // Path where images are located
            overlayBgColor: '#000', // Background color for overlay
            overlayOpacity: 0.8, // Background transparency (0-1)
            fadeOutTime: 'fast' // Fade out time on close ('slow','medium','fast' or integer in ms)
        },opts);

        // Set default browsers to display
        if (opts.display.length < 1) opts.display = ['firefox','chrome','msie','safari','opera','gcf'];

        // beforeRject: Customized Function
        if ($.isFunction(opts.beforeReject)) opts.beforeReject(opts);

        // This function parses the advanced browser options
        var browserCheck = function(settings) {
            // Check 1: Look for 'all' forced setting
            // Check 2: Operating System (eg. 'win','mac','linux','solaris','iphone')
            // Check 3: Rendering engine (eg. 'webkit', 'gecko', 'trident')
            // Check 4: Browser name (eg. 'firefox','msie','chrome')
            // Check 5: Browser+major version (eg. 'firefox3','msie7','chrome4')
            return (settings['all'] ? true : false) ||
                    (settings[$.os.name] ? true : false) ||
                    (settings[$.layout.name] ? true : false) ||
                    (settings[$.browser.name] ? true : false) ||
                    (settings[$.browser.className] ? true : false);
        };

        // Determine if we need to display for this browser
        if (browserCheck(opts.reject)) {
            // If user can close and set to remmember close, initiate cookie function
            if (opts.close && opts.closeCookie) {
                var COOKIE_NAME = 'jreject-close'; // Local global setting for the name of the cookie used

                // Cookies Function: Handles creating/retrieving/deleting cookies
                // Cookies are only used for opts.closeCookie parameter functionality
                var _cookie = function(name, value) {
                    if (typeof value != 'undefined') document.cookie = name+'='+encodeURIComponent(value === null ? '' : value);
                    else { // Get cookie value
                        var cookie,val = null;

                        if (document.cookie && document.cookie != '') {
                            var cookies = document.cookie.split(';');

                            // Loop through all cookie values
                            for (var i = 0; i < cookies.length; ++i) {
                                cookie = $.trim(cookies[i]);

                                // Does this cookie string begin with the name we want?
                                if (cookie.substring(0,name.length+1) == (name+'=')) {
                                    val = decodeURIComponent(cookie.substring(name.length+1));
                                    break;
                                }
                            }
                        }

                        return val; // Return cookie value
                    }
                };

                // If cookie is set, return false and don't display rejection
                if (_cookie(COOKIE_NAME) != null) return false;
            }

            // Load background overlay (jr_overlay) + Main wrapper (jr_wrap) +
            // Inner Wrapper (jr_inner) w/ opts.header (jr_header) +
            // opts.paragraph1/opts.paragraph2 if set
            var html = '<div id="jr_overlay"></div><div id="jr_wrap"><div id="jr_inner"><h2 id="jr_header">'+opts.header+'</h2>'+
            (opts.paragraph1 === '' ? '' : '<p>'+opts.paragraph1+'</p>')+(opts.paragraph2 === '' ? '' : '<p>'+opts.paragraph2+'</p>')+'<ul>';

            var displayNum = 0; // Tracks number of browsers being displayed
            // Generate the browsers to display
            for (var x in opts.display) {
                var browser = opts.display[x]; // Current Browser
                var info = opts.browserInfo[browser] || false; // Browser Information

                // If no info exists for this browser
                // or if this browser is not suppose to display to this user
                if (!info || (info['allow'] != undefined && !browserCheck(info['allow']))) continue;

                var url = info.url || '#'; // URL to link text/icon to
                // Generate HTML for this browser option
                html += '<li id="jr_'+browser+'"><div class="jr_icon"></div><div><a href="'+url+'">'+(info.text || 'Unknown')+'</a></div></li>';
                ++displayNum; // Increment number of browser being displayed
            }

            // Close list and #jr_list
            html += '</ul><div id="jr_close">'+(opts.close ? '<a href="'+opts.closeURL+'">'+opts.closeLink+'</a><p>'+opts.closeMessage+'</p>' : '')+'</div>'+ // Display close links/message if set
            '</div></div>'; // Close #jr_inner and #jr_wrap

            // This function handles closing this reject window
            var _closeReject = function() { // When clicked, fadeOut and remove all elements
                if (!opts.close) return false; // Make sure the ability to close is set
                if ($.isFunction(opts.beforeClose)) opts.beforeClose(opts); // Customized Function

                // Fade out background and modal wrapper
                $('#jr_overlay,#jr_wrap').fadeOut(opts.fadeOutTime,function() {
                    $(this).remove(); // Remove element from DOM

                    // afterClose: Customized Function
                    if ($.isFunction(opts.afterClose)) opts.afterClose(opts);
                });

                $('embed, object, select, applet').show(); // Show elements that were hidden

                if (opts.closeCookie) _cookie(COOKIE_NAME,'true'); // Set close cookie for next run
                if (opts.closeURL === '#') return false; // If plain anchor is set, return false so there is no page jump
            };

            var element = $('<div>'+html+'</div>'); // Create element
            var size = _pageSize(); // Get page size
            var scroll = _scrollSize(); // Get page scroll

            // Traverse through the DOM and
            // Apply CSS Rules to elements
            element.find('#jr_overlay').css({ // Creates 'background' (div)
                width: size[0],
                height: size[1],
                position: 'absolute',
                top: 0,
                left: 0,
                background: opts.overlayBgColor,
                zIndex: 200,
                opacity: opts.overlayOpacity,
                padding: 0,
                margin: 0
            }).next('#jr_wrap').css({ // Wrapper for our pop-up (div)
                position: 'absolute',
                width: '100%',
                top: scroll[1]+(size[3]/4),
                left: scroll[0],
                zIndex: 300,
                textAlign: 'center',
                padding: 0,
                margin: 0
            }).children('#jr_inner').css({ // Wrapper for inner centered content (div)
                background: '#FFF',
                border: '1px solid #CCC',
                fontFamily: '"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif',
                color: '#4F4F4F',
                margin: '0 auto',
                position: 'relative',
                height: 'auto',
                minWidth: displayNum*100,
                maxWidth: displayNum*140,
                width: $.layout.name == 'trident' ? displayNum*155 : 'auto', // min/maxWidth not supported by IE
                padding: 20,
                fontSize: 12
            }).children('#jr_header').css({ // Header (h1)
                display: 'block',
                fontSize: '1.3em',
                marginBottom: '0.5em',
                color: '#333',
                fontFamily: 'Helvetica,Arial,sans-serif',
                fontWeight: 'bold',
                textAlign: 'left',
                padding: 5,
                margin: 0
            }).nextAll('p').css({ // Paragraphs (p)
                textAlign: 'left',
                padding: 5,
                margin: 0
            }).siblings('ul').css({ // Browser list (ul)
                listStyleImage: 'none',
                listStylePosition: 'outside',
                listStyleType: 'none',
                margin: 0,
                padding: 0
            }).children('li').css({ // Browser list items (li)
                background: 'transparent url("'+opts.imagePath+'background_browser.gif") no-repeat scroll left top',
                cusor: 'pointer',
                float: 'left',
                width: 120,
                height: 122,
                margin: '0 10px 10px 10px',
                padding: 0,
                textAlign: 'center'
            }).children('.jr_icon').css({ // Icons (div)
                width: 100,
                height: 100,
                margin: '1px auto',
                padding: 0,
                background: 'transparent no-repeat scroll left top',
                cursor: 'pointer'
            }).each(function() { // Dynamically sets the icon background image
                var self = $(this);
                self.css('background','transparent url('+opts.imagePath+'browser_'+(self.parent('li').attr('id').replace(/jr_/,''))+'.gif) no-repeat scroll left top');
                self.click(function() {
                    window.open($(this).next('div').children('a').attr('href'),'jr_'+Math.round(Math.random()*11));
                    return false;
                });
            }).siblings('div').css({ // Text under the browser icon (div)
                color: '#808080',
                fontSize: '0.8em',
                height: 18,
                lineHeight: '17px',
                margin: '1px auto',
                padding: 0,
                width: 118,
                textAlign: 'center'
            }).children('a').css({ // Text link (a)
                color: '#333',
                textDecoration: 'none',
                padding: 0,
                margin: 0
            }).hover(function() { // Underline effect (a:hover)
                $(this).css('textDecoration','underline');
            },function() {
                $(this).css('textDecoration','none');
            }).click(function() { // Make links open in new window (a)
                window.open($(this).attr('href'),'jr_'+Math.round(Math.random()*11));
                return false;
            }).parents('#jr_inner').children('#jr_close').css({ // Close window option (div)
                margin: '0 0 0 50px',
                clear: 'both',
                textAlign: 'left',
                padding: 0,
                margin: 0
            }).children('a').css({ // Close window link (a)
                color: '#000',
                display: 'block',
                width: 'auto',
                margin: 0,
                padding: 0,
                textDecoration: 'underline'
            }).click(_closeReject).nextAll('p').css({ // Bind click event + Add padding to close link/text
                padding: '10px 0 0 0',
                margin: 0
            });

            // Hide elements that won't display properly
            $('embed, object, select, applet').hide();

            // Append element to body of document to display
            $('body').append(element);

            // Handle window resize/scroll events and update overlay dimensions
            $(window).bind('resize scroll',function() {
                var size = _pageSize(); // Get size

                // Update overlay dimensions based on page size
                $('#jr_overlay').css({ width: size[0],height: size[1] });

                var scroll = _scrollSize(); // Get page scroll

                // Update modal position based on scroll
                $('#jr_wrap').css({ top: scroll[1] + (size[3]/4),left: scroll[0] });
            });

            // Add optional ESC Key functionality
            if (opts.close && opts.closeESC) $(document).keydown(function(event) { if (event.keyCode == 27) _closeReject(); });

            // afterReject: Customized Function
            if ($.isFunction(opts.afterReject)) opts.afterReject(opts);

            return true;
        }
        else {
            // onFail: Customized Function
            if ($.isFunction(opts.onFail)) opts.onFail(opts);
            return false;
        }
    };

    // Based on compatibility data from quirksmode.com
    var _pageSize = function() {
        var xScroll = window.innerWidth && window.scrollMaxX ? window.innerWidth + window.scrollMaxX :
                        (document.body.scrollWidth > document.body.offsetWidth ?
                            document.body.scrollWidth : document.body.offsetWidth);

        var yScroll = window.innerHeight && window.scrollMaxY ? window.innerHeight + window.scrollMaxY :
                        (document.body.scrollHeight > document.body.offsetHeight ?
                            document.body.scrollHeight : document.body.offsetHeight);

        var windowWidth = window.innerWidth ? window.innerWidth :
                            (document.documentElement && document.documentElement.clientWidth ?
                                document.documentElement.clientWidth : document.body.clientWidth);

        var windowHeight = window.innerHeight ? window.innerHeight :
                            (document.documentElement && document.documentElement.clientHeight ?
                            document.documentElement.clientHeight : document.body.clientHeight);

        return [
            xScroll < windowWidth ? xScroll : windowWidth, // Page Width
            yScroll < windowHeight ? windowHeight : yScroll, // Page Height
            windowWidth,windowHeight
        ];
    };


    // Based on compatibility data from quirksmode.com
    var _scrollSize = function() {
        return [
            // scrollSize X
            window.pageXOffset ? window.pageXOffset : (document.documentElement && document.documentElement.scrollTop ? document.documentElement.scrollLeft : document.body.scrollLeft),
            // scrollSize Y
            window.pageYOffset ? window.pageYOffset : (document.documentElement && document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop)
        ];
    };
})(jQuery);


/*
    * jQuery Browser Plugin
    * Version 2.3
    * 2008-09-17 19:27:05
    * URL: http://jquery.thewikies.com/browser
    * Description: jQuery Browser Plugin extends browser detection capabilities and can assign browser selectors to CSS classes.
    * Author: Nate Cavanaugh, Minhchau Dang, & Jonathan Neal
    * Copyright: Copyright (c) 2008 Jonathan Neal under dual MIT/GPL license.
*/
(function($){$.browserTest=function(a,z){var u='unknown',x='X',m=function(r,h){for(var i=0;i<h.length;i=i+1){r=r.replace(h[i][0],h[i][1]);}return r;},c=function(i,a,b,c){var r={name:m((a.exec(i)||[u,u])[1],b)};r[r.name]=true;r.version=(c.exec(i)||[x,x,x,x])[3];if(r.name.match(/safari/)&&r.version>400){r.version='2.0';}if(r.name==='presto'){r.version=($.browser.version>9.27)?'futhark':'linear_b';}r.versionNumber=parseFloat(r.version,10)||0;r.versionX=(r.version!==x)?(r.version+'').substr(0,1):x;r.className=r.name+r.versionX;return r;};a=(a.match(/Opera|Navigator|Minefield|KHTML|Chrome/)?m(a,[[/(Firefox|MSIE|KHTML,\slike\sGecko|Konqueror)/,''],['Chrome Safari','Chrome'],['KHTML','Konqueror'],['Minefield','Firefox'],['Navigator','Netscape']]):a).toLowerCase();$.browser=$.extend((!z)?$.browser:{},c(a,/(camino|chrome|firefox|netscape|konqueror|lynx|msie|opera|safari)/,[],/(camino|chrome|firefox|netscape|netscape6|opera|version|konqueror|lynx|msie|safari)(\/|\s)([a-z0-9\.\+]*?)(\;|dev|rel|\s|$)/));$.layout=c(a,/(gecko|konqueror|msie|opera|webkit)/,[['konqueror','khtml'],['msie','trident'],['opera','presto']],/(applewebkit|rv|konqueror|msie)(\:|\/|\s)([a-z0-9\.]*?)(\;|\)|\s)/);$.os={name:(/(win|mac|linux|sunos|solaris|iphone)/.exec(navigator.platform.toLowerCase())||[u])[0].replace('sunos','solaris')};if(!z){$('html').addClass([$.os.name,$.browser.name,$.browser.className,$.layout.name,$.layout.className].join(' '));}};$.browserTest(navigator.userAgent);})(jQuery);