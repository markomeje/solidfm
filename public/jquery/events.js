(function ($) {

	'use strict';

    $('.add-event-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-event-button');
    	var spinner = $('.add-event-spinner');
    	var message = $('.add-event-message');
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
        	if (typeof response === 'undefined' || response === null) {
        		handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();

        	}else if (response.status === 'invalid-date') {
                handleButton(button, spinner);
                handleErrors($('.date'), $('.date-error'), 'Invalid date');

            } else if (response.status === 'invalid-title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), 'Title is required.');

            } else if (response.status === 'invalid-time') {
                handleButton(button, spinner);
                handleErrors($('.time'), $('.time-error'), 'Time is required.');

            } else if (response.status === 'invalid-location') {
                handleButton(button, spinner);
                handleErrors($('.location'), $('.location-error'), 'Location is required.');

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

    $('.edit-event-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.edit-event-button');
        var spinner = $('.edit-event-spinner');
        var message = $('.edit-event-message');
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
            if (typeof response === 'undefined' || response === null) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();

            }else if (response.status === 'invalid-date') {
                handleButton(button, spinner);
                handleErrors($('.date'), $('.date-error'), 'Invalid date');

            } else if (response.status === 'invalid-title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), 'Title is required.');

            } else if (response.status === 'invalid-time') {
                handleButton(button, spinner);
                handleErrors($('.time'), $('.time-error'), 'Time is required.');

            } else if (response.status === 'invalid-location') {
                handleButton(button, spinner);
                handleErrors($('.location'), $('.location-error'), 'Location is required.');

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

    $('.delete-event').click(function() {
        var event = $(this);
        if (confirm("Are you sure")) {
            var request = $.ajax({
                url: event.attr('data-url'),
                processData: false,
                contentType: false,
                dataType: 'json'
            });

            request.done(function(response) {
                if (response.status === 'error') {
                    alert('An error occured. Try again');
                }else if(response.status === 'success') {
                    window.location.reload();
                }
            });

            request.fail(function() {
                alert('Network Error');
            });
        } 

    });

})(jQuery);