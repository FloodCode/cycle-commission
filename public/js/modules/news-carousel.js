$(document).ready(function(){

    var newsCarousel = $('#newsCarousel');
    var clickEvent = false;
    newsCarousel.carousel({
        interval: 4000
    });

    newsCarousel.on('click', '.list-group li', function() {
        clickEvent = true;
        $('.list-group li').removeClass('active');
        $(this).addClass('active');
    });

    newsCarousel.on('slid.bs.carousel', function(e) {
        if(!clickEvent) {
            var count = $('.list-group').children().length - 1;
            var current = $('.list-group li.active');
            current.removeClass('active').next().addClass('active');
            var id = parseInt(current.data('slide-to'));

            if(count === id) {
                $('.list-group li').first().addClass('active');
            }
        }

        clickEvent = false;
    });

});