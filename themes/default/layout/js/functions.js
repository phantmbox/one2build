/**
 * execute at start on jquery loaded
 */
window.onload = function() {
    if (window.jQuery) {
        $(".slideIn").delay(1000).removeClass("slideInFromRight");
    }
};