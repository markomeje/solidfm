(function($) {

    'use strict';

    var inputs = $('input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="number"]');
    inputs.attr('autocomplete', 'off');
    $(window).on('shown.bs.modal', function() {
        inputs.attr('autocomplete', 'off');
    });

    $('.custom-file-input').change(function(event){
        if (typeof(event.target.files[0].name) !== 'null') {
            $('.custom-file-label').html(event.target.files[0].name);
        } 
    });

    $('a[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'bottom',
        html: true
    });
    var preview = $(".preview");
    $(".preview").hover(function () {
        alert("Here");
        $(".preview img").attr("src", $(this).attr("data-preview"));
    }, function () {
        $(".preview img").attr("src", "");
    });

    $('.stop-propergation').click(function(event){
        event.stopPropagation();
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
