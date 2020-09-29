(function($) {


	'use strict';

    $('.add-upcoming-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-upcoming-button');
    	var spinner = $('.add-upcoming-spinner');
    	var message = $('.add-upcoming-message');
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
        	if (typeof response === 'undefined') {
        		handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();

        	}else if (response.status === 'invalid-title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), 'Title must be between 3 - 55 characters.');

            }else if (response.status === 'invalid-presenter') {
                handleButton(button, spinner);
                handleErrors($('.presenter'), $('.presenter-error'), 'Presenter must be between 3 - 55 characters.');

            }else if (response.status === 'invalid-time') {
                handleButton(button, spinner);
                handleErrors($('.time'), $('.time-error'), 'Invalid time format.');

            } else if (response.status === 'invalid-image') {
                handleButton(button, spinner);
                handleErrors($('.image'), $('.image-error'), 'Invalid image. Image must be maximum size of 4MB and only jpg, jpeg, png, gif formats are allowed');

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
            alert('System Error');
        });
    });

    $('.edit-upcoming-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.edit-upcoming-button');
        var spinner = $('.edit-upcoming-spinner');
        var message = $('.edit-upcoming-message');
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
            if (typeof response === 'undefined') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();

            }else if (response.status === 'invalid-title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), 'Title must be between 3 - 55 characters.');

            }else if (response.status === 'invalid-presenter') {
                handleButton(button, spinner);
                handleErrors($('.presenter'), $('.presenter-error'), 'Presenter must be between 3 - 55 characters.');

            }else if (response.status === 'invalid-time') {
                handleButton(button, spinner);
                handleErrors($('.time'), $('.time-error'), 'Invalid time format.');

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
            alert('System Error');
        });
    });



})(jQuery);