(function($) {

    $(document).ready(function() {

        function showSection() {

            var menu = $('#menu-nav');
            var menuShow = $('#menu-block');

            function switchClass($myvar) {
                if ($myvar.hasClass('active')) {
                    $myvar.removeClass('active');
                } else {
                    $myvar.addClass('active');
                }
            }

            menu.on('click', function() {
                switchClass($(this));
                menuShow.slideToggle().resize();
            });

        }

        $(window).on('load', showSection);
    });

    /*
     * A function to move the image above the entry-title if post format is image.
     * A function to move the video above the entry-title if post format is video.
     */
    function post_format() {
        var image = $('.format-image.hentry img'),
            video = $('.hentry.format-video .jetpack-video-wrapper');

        image.each(function() {
            $(this).first().prependTo($(this).closest('.format-image.hentry'));
            $(this).addClass('active');
            $(this).show();
        });

        video.each(function() {
            $(this).first().prependTo($(this).closest('.hentry.format-video'));
            $(this).addClass('active');
            $(this).show();
        });
    }
    $(window).load(post_format);
    $(document).on('post-load', post_format);

})(jQuery);