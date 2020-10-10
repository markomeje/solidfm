(function ($) {

	'use strict';

    $('.add-title-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-title-button');
    	var spinner = $('.add-title-spinner');
    	var message = $('.add-title-message');
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
        	if (typeof response === 'undefined' || typeof response === 'null') {
        		handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();

        	}else if (response.status === 'invalid-title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), 'Please enter title');

            }else if (response.status === 'invalid-starting-time') {
                handleButton(button, spinner);
                handleErrors($('.starting-time'), $('.starting-time-error'), 'Please enter starting time');

            }else if (response.status === 'invalid-ending-time') {
                handleButton(button, spinner);
                handleErrors($('.ending-time'), $('.ending-time-error'), 'Please enter ending time');

            } else if (response.status === 'invalid-programme') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occurred. Reload the page and try again. If it persists, please contact developer.').fadeIn();

            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful.').fadeIn();
                window.location.reload();

            } else if (response.status === 'error') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();

            } else {
            	alert('Network Error');
                handleButton(button, spinner);
            }
        });

        request.fail(function() {
            handleButton(button, spinner);
            alert('Network Error');
        });
    });

})(jQuery);