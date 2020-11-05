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
        	if (response === null) {
        		handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();

        	}else if (response.status === 'invalid-starts') {
                handleButton(button, spinner);
                handleErrors($('.starts'), $('.starts-error'), 'Programme starting time is required');

            }else if (response.status === 'invalid-ends') {
                handleButton(button, spinner);
                handleErrors($('.ends'), $('.ends-error'), 'Programme ending time is required');

            }else if (response.status === 'invalid-presenter') {
                handleButton(button, spinner);
                handleErrors($('.presenter'), $('.presenter-error'), 'Programme presenter is required');

            }else if (response.status === 'invalid-title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), 'Programme title is required');

            }else if (response.status === 'invalid-description') {
                handleButton(button, spinner);
                handleErrors($('.description'), $('.description-error'), 'Programme description is required');

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
            if (response === null) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();

            }else if (response.status === 'invalid-starts') {
                handleButton(button, spinner);
                handleErrors($('.starts'), $('.starts-error'), 'Programme starting time is required');

            }else if (response.status === 'invalid-ends') {
                handleButton(button, spinner);
                handleErrors($('.ends'), $('.ends-error'), 'Programme ending time is required');

            }else if (response.status === 'invalid-presenter') {
                handleButton(button, spinner);
                handleErrors($('.presenter'), $('.presenter-error'), 'Programme presenter is required');

            }else if (response.status === 'invalid-title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), 'Programme title is required');

            }else if (response.status === 'invalid-description') {
                handleButton(button, spinner);
                handleErrors($('.description'), $('.description-error'), 'Programme description is required');

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

    $('.delete-programme').on('click', function() {
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
                if (response === null) {
                    alert('Network Error');
                }else if (response.status === "success") {
                    window.location.reload();
                } else if (response.status === "error") {
                    alert('An error ocurred. Try again');
                }
            });

            request.fail(function() {
                alert('Network Error');
            });
        };
    });

})(jQuery);