(function ($) {

	'use strict';

    $('.add-programme-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-programme-button');
    	var spinner = $('.add-programme-spinner');
    	var message = $('.add-programme-message');
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

        	}else if (response.status === 'invalid-year') {
                handleButton(button, spinner);
                handleErrors($('.year'), $('.year-error'), 'Programme year is required');

            }else if (response.status === 'invalid-time') {
                handleButton(button, spinner);
                handleErrors($('.time'), $('.time-error'), 'Programme time is required');

            }else if (response.status === 'invalid-synopsis') {
                handleButton(button, spinner);
                handleErrors($('.synopsis'), $('.synopsis-error'), 'Programme synopsis is required');

            }else if (response.status === 'invalid-title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), 'Programme title is required');

            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful.').fadeIn();
                // window.location.reload();
                // 
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

    $('.edit-programme-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.edit-programme-button');
        var spinner = $('.edit-programme-spinner');
        var message = $('.edit-programme-message');
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

            }else if (response.status === 'invalid-name') {
                handleButton(button, spinner);
                handleErrors($('.name'), $('.name-error'), 'programme name must be between 3 - 55 characters.');

            } else if (response.status === 'programme-exists') {
                handleButton(button, spinner);
                handleErrors($('.name'), $('.name-error'), 'programme already exists');

            } else if (response.status === 'invalid-status') {
                handleButton(button, spinner);
                handleErrors($('.status'), $('.status-error'), 'programme status is required.');

            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful.').fadeIn();
                // window.location.reload();
                // 
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