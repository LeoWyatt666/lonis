$(document).ready(function () {

    // Semantic
    $('.ui.sidebar').sidebar({
        transition: 'overlay',
        mobileTransition: 'overlay'
    }).sidebar('attach events', 'a#hamburger-link');

    $('.home .item').tab();
    //$('.ui.dropdown').dropdown({action: "nothing", on: "hover"});

    $("#computer_menu_user").clone().appendTo("#tablet_menu_user");
    $("#sidebar_menu_main").append($("#computer_menu_main").html());

    // init Infinite Scroll
    var $pagination = $('.pagination-feed').infiniteScroll({
        path: '.pagination__next',
        append: '.pagination-item',
        status: '.scroller-status',
        hideNav: '.pagination',
        checkLastPage: true,
    });

    $('.pagination__next').click(function () {
        $pagination.infiniteScroll('loadNextPage');
        return false;
    });

    // ???
    $('nav.blog-nav a').each(function () {
        var location = window.location.href;
        var link = this.href;
        if (location == link) {
            $(this).addClass('active');
        }
    });
  
    $('#right_menu a').each(function () {
        var location = window.location.href;
        var link = this.href;
        if (location == link) {
            $(this).parent('li').addClass('active');
        }
    });

    // CSRF
    $.ajaxSetup({
        data: {
            'csrf_token_lonis' : $.cookie('csrf_cookie_lonis')
        }
    });

});
