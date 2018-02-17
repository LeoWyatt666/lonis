$(document).ready(function () {
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
}
