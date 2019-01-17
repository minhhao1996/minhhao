
    $(document).ready(function () {
        $('.menu-product li.child .open-close').on('click', function () {
            $(this).removeAttr('href');
            var element = $(this).parent('li');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.children('ul').slideUp();
            }
            else {
                element.addClass('open');
                element.children('ul').slideDown();
            }
        });
    });
    $(document).ready(function () {
        $('.adv').ready(function () {
            $('#sale').owlCarousel({
                margin: 5,
                dots: false,
                navigation: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1.5,
                        nav: false,
                    },
                    600: {
                        items: 4,
                        nav: true
                    },
                    1000: {
                        items: 5,
                        nav: true,

                    }
                }

            });
        })
    });



