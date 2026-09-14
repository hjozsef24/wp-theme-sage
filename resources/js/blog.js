import $ from 'jquery';

$(function () {
    $('.js-blog-list-section').each(function() {
        const $section = $(this);
        const $grid = $section.find('.js-blog-grid');
        const $button = $section.find('.js-load-more');
        const limit = parseInt($grid.data('limit'));

        $button.on('click', function(e) {
            e.preventDefault();

            const $hiddenItems = $grid.find('.js-blog-item.hidden');
            
            const $nextBatch = $hiddenItems.slice(0, limit);

            $nextBatch.hide().removeClass('hidden').fadeIn(400);

            if ($grid.find('.js-blog-item.hidden').length === 0) {
                $button.parent().fadeOut();
            }
        });
    });
});