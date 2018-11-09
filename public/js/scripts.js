$(window).scroll(function() {
    if($(this).scrollTop()>5) {
        $( ".navbar" ).addClass("fixed");
    } else {
        $( ".navbar" ).removeClass("fixed");
    }
});

$(document).ready(function() {
    $(".carousel").swipe({

        swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

            if (direction == 'left') $(this).carousel('next');
            if (direction == 'right') $(this).carousel('prev');

        },
        allowPageScroll:"vertical"

    });
});

$(document).ready(function () {
    if ( window.location.pathname == '/' ){
        $(document).on("scroll", onScroll);

        //smoothscroll
        $('a[href^="/#"]').on('click', function (e) {
            e.preventDefault();
            $(document).off("scroll");

            $('a').each(function () {
                $(this).removeClass('active');
            })
            $(this).addClass('active');

            $('.navbar-toggler').click();

            var target = this.hash,
                menu = target;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top+2
            }, 500, 'swing', function () {
                window.location.hash = target;
                $(document).on("scroll", onScroll);
            });
        });
    }
});

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('#navbarMenuContent a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("scroll-href"));
        if (refElement.position().top <= scrollPos+60 && refElement.position().top + refElement.height() > scrollPos) {
            $('#navbarMenuContent ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}