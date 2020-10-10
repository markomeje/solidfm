(function ($) {

	'use strict';

    $('.add-youtube-video-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-youtube-video-button');
    	var spinner = $('.add-youtube-video-spinner');
    	var message = $('.add-youtube-video-message');
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

        	}else if (response.status === 'invalid-link') {
                handleButton(button, spinner);
                handleErrors($('.link'), $('.link-error'), 'Invalid link');

            } else if (response.status === 'link-exists') {
                handleButton(button, spinner);
                handleErrors($('.link'), $('.link-error'), 'Link already exists');

            } else if (response.status === 'invalid-status') {
                handleButton(button, spinner);
                handleErrors($('.status'), $('.status-error'), 'Status is required.');

            } else if (response.status === 'invalid-description') {
                handleButton(button, spinner);
                handleErrors($('.description'), $('.description-error'), 'Description must be between 3 - 55 characters.');

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

    $('.edit-youtube-video-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.edit-youtube-video-button');
        var spinner = $('.edit-youtube-video-spinner');
        var message = $('.edit-youtube-video-message');
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

            }else if (response.status === 'invalid-link') {
                handleButton(button, spinner);
                handleErrors($('.link'), $('.link-error'), 'Invalid link');

            } else if (response.status === 'invalid-status') {
                handleButton(button, spinner);
                handleErrors($('.status'), $('.status-error'), 'Status is required.');

            } else if (response.status === 'invalid-description') {
                handleButton(button, spinner);
                handleErrors($('.description'), $('.description-error'), 'Description must be between 3 - 55 characters.');

            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful.').fadeIn();

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

})(jQuery)