(function($) {

	'use strict';

    $('.add-advert-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-advert-button');
    	var spinner = $('.add-advert-spinner');
    	var message = $('.add-advert-message');
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
        	if (response === undefined || response === null) {
        		handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();

            } else if (response.status === 'invalid-image') {
                handleButton(button, spinner);
                handleErrors($('.image'), $('.image-error'), 'Invalid image. Image must be maximum size of 4MB and only jpg, jpeg, png, gif formats are allowed');

        	}else if (response.status === 'invalid-status') {
                handleButton(button, spinner);
                handleErrors($('.status'), $('.status-error'), 'Please select status');

            }else if (response.status === 'invalid-start') {
                handleButton(button, spinner);
                handleErrors($('.start'), $('.start-error'), 'Advert start date is required');

            }else if (response.status === 'invalid-expiry') {
                handleButton(button, spinner);
                handleErrors($('.expiry'), $('.expiry-error'), 'Advert expiry date is required.');

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

    $('.delete-advert').on('click', function() {
        var caller = $(this);
        if(confirm('Are you sure to delete?')) {
            var request = $.ajax({
                method: 'post',
                url: caller.attr('data-url'),
                processData: false,
                contentType: false,
                dataType: 'json'
            });

            request.done(function(response) {
                if (response === undefined || response === null) {
                    alert('Network Error');
                }else if (response.status === "success") {
                    window.location.reload();
                } else if (response.status === "error") {
                    alert('An error ocurred. Try again');
                }
            });

            request.fail(function() {
                alert('System Error');
            });
        };
    });

    $('.change-advert-image-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.change-advert-image-button');
        var spinner = $('.change-advert-image-spinner');
        button.attr('disabled', true);
        spinner.removeClass('d-none');

        var request = $.ajax({
            method: form.attr('method'),
            url: form.attr('data-action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json'
        });

        request.done(function(response){
            if (response === undefined || response === null) {
                handleButton(button, spinner);
                alert('Network Error');

            } else if (response.status === 'invalid-image') {
                handleButton(button, spinner);
                handleErrors($('.advert-image'), $('.advert-image-error'), 'Invalid image. Image must be maximum size of 4MB and only jpg, jpeg, png, gif formats are allowed');

            } else if (response.status === 'success') {
                handleButton(button, spinner);
                window.location.reload();

            } else if (response.status === 'error') {
                handleButton(button, spinner);
                alert('An error occured. Try again');

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

    $('.edit-advert-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.edit-advert-button');
        var spinner = $('.edit-advert-spinner');
        var message = $('.edit-advert-message');
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
            if (response === undefined || response === null) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();

            }else if (response.status === 'invalid-start') {
                handleButton(button, spinner);
                handleErrors($('.start'), $('.start-error'), 'Advert start date is required');

            }else if (response.status === 'invalid-expiry') {
                handleButton(button, spinner);
                handleErrors($('.expiry'), $('.expiry-error'), 'Advert expiry date is required.');

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