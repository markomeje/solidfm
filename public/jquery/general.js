(function($) {

    'use strict';

    var inputs = $('input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="number"]');
    inputs.attr('autocomplete', 'off');
    $(window).on('shown.bs.modal', function() {
        inputs.attr('autocomplete', 'off');
    });

    $(window).on('load', function() {
        localStorage.clear();
        var preloader = $('.preloader');
        if (preloader.length) {
            preloader.delay(200).fadeOut(500);
        }
    });

    $('.custom-file-input').change(function(event){
        if (typeof(event.target.files[0].name) !== 'null') {
            $('.custom-file-label').html(event.target.files[0].name);
        } 
    });

    $('.hanburger-icon').on('click', function() {
        $('.navbar-menu').toggleClass('navbar-toggle');
        $('.hanburger-icon').toggleClass('slide');
    });

    backendLinksNavigation();

})(jQuery);

function backendLinksNavigation() {
    var event = 'change' || 'popstate';
    $('.backend-links').on(event, function() {
        localStorage.clear();
        var link = $('.backend-links').val();
        window.location.href = $(this).attr('data-url')+'/'+link;
    });
}

function handleButton(button, spinner) {
    button.attr('disabled', false);
    spinner.addClass('d-none');
}

function handleErrors(input, span, message = '') {
    input.addClass('is-invalid');
    span.html(message);
    input.focus(function() {
        input.removeClass('is-invalid');
        span.html('');
    });
}

function toggleCheckbox(checkbox) {
    checkbox.is(':checked') ? checkbox.prop('checked', false) : checkbox.prop('checked', true);
}
