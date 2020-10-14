(function ($) {

    'use strict';

    $('.login-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.login-button');
        var spinner = $('.login-spinner');
        var message = $('.login-message');
        button.attr('disabled', true);
        spinner.removeClass('d-none');
        message.hasClass('d-none') ? '' : message.fadeOut();

        var request = $.ajax({
            method: form.attr('method'),
            url: form.attr('data-action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json'
        });

        request.done(function(response){
            if (response.status === 'invalid-email') {
                handleButton(button, spinner);
                handleErrors($('.email'), $('.email-error'), 'Please fill in your email.');

            } else if (response.status === 'invalid-password') {
                handleButton(button, spinner);
                handleErrors($('.password'), $('.password-error'), 'Please fill in your password');

            }else if (response.status === 'invalid-user') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('Invalid details.').fadeIn();
                handleErrors($('.password'), $('.password-error'), '');
                handleErrors($('.email'), $('.email-error'), '');

            }else if (response.status === 'invalid-login') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                handleErrors($('.password'), $('.password-error'), '');
                handleErrors($('.email'), $('.email-error'), '');
                message.html('Invalid login details.').fadeIn();

            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful.').fadeIn();
                window.location.href = response.redirect;

            } else if (response.status === 'error') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();
            } else {
                handleButton(button, spinner);
            }
        });

        request.fail(function() {
            handleButton(button, spinner);
            alert('System Error');
        });
    });

})(jQuery);
