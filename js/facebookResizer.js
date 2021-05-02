function setupFBframe(frame) {
    var container = frame.parentNode;

    var containerWidth = container.offsetWidth;
    var containerHeight = container.offsetHeight;

    var src =
        "https://www.facebook.com/plugins/page.php" +
        "?href=https%3A%2F%2Fwww.facebook.com%2Famitiecevenole" +
        "&tabs=timeline,messages" +
        "&width=" +
        containerWidth +
        "&height=" +
        containerHeight +
        "&small_header=false" +
        "&adapt_container_width=false" +
        "&hide_cover=false" +
        "&hide_cta=true" +
        "&show_facepile=true" +
        "&appId";

    frame.width = containerWidth;
    frame.height = containerHeight;
    frame.src = src;
}

/* begin Document Ready                                     
############################################ */

document.addEventListener('DOMContentLoaded', function() {
    var facebookIframe = document.querySelector('#facebook_iframe');
    setupFBframe(facebookIframe);

    /* begin Window Resize                                    
    ############################################ */
    (function() {
        window.addEventListener("resize", resizeThrottler, false);

        var resizeTimeout;

        function resizeThrottler() {
            if (!resizeTimeout) {
                resizeTimeout = setTimeout(function() {
                    resizeTimeout = null;
                    actualResizeHandler();
                }, 66);
            }
        }

        function actualResizeHandler() {
            document.querySelector('#facebook_iframe').removeAttribute('src');
            setupFBframe(facebookIframe);
        }
    })();
    /* end Window Resize
    ############################################ */
});