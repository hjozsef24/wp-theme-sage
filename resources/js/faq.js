import $ from 'jquery';

$(function () {
    const $section = $('section[style*="--cat-bg"]');
    const catBg = $section.css('--cat-bg').trim();
    const catText = $section.css('--cat-text').trim();
    const inactiveColor = catBg;

    function switchFaqCategory(targetId) {
        $('.faq-answer').hide();
        $('.faq-question').removeClass('font-bold').addClass('font-normal');
        $('.faq-item svg').removeClass('rotate-180');
        $('.faq-number').css('color', '');

        $('.faq-group').hide();
        $('#' + targetId).fadeIn(400);
    }

    $('.faq-category-btn').on('click', function () {
        const $btn = $(this);
        const targetId = $btn.data('target');

        $('.faq-category-btn').css({
            'background-color': 'transparent',
            'color': inactiveColor
        });

        $btn.css({
            'background-color': catBg,
            'color': catText
        });

        $('#faq-mobile-select').val(targetId);
        switchFaqCategory(targetId);
    });

    $('#faq-mobile-select').on('change', function () {
        const targetId = $(this).val();
        const $targetBtn = $(`.faq-category-btn[data-target="${targetId}"]`);

        $('.faq-category-btn').css({
            'background-color': 'transparent',
            'color': inactiveColor
        });

        $targetBtn.css({
            'background-color': catBg,
            'color': catText
        });

        switchFaqCategory(targetId);
    });

    $('.faq-item').on('click', function () {
        const $this = $(this);
        const $answer = $this.find('.faq-answer');
        const $question = $this.find('.faq-question');
        const $arrow = $this.find('svg');
        const $number = $this.find('.faq-number');

        if ($answer.is(':visible')) {
            $answer.slideUp(300);
            $question.removeClass('font-bold').addClass('font-normal');
            $arrow.removeClass('rotate-180');
            $number.css('color', '');
        } else {
            $('.faq-answer').slideUp(300);
            $('.faq-question').removeClass('font-bold').addClass('font-normal');
            $('.faq-item svg').removeClass('rotate-180');
            $('.faq-number').css('color', '');

            // Kinyitjuk az aktuálisat
            $answer.slideDown(300);
            $question.removeClass('font-normal').addClass('font-bold');
            $arrow.addClass('rotate-180');
            $number.css('color', catBg);
        }
    });
});