(function ($) {

	'use strict';

    $('.add-skill-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-skill-button');
    	var spinner = $('.add-skill-spinner');
    	var message = $('.add-skill-message');
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
        	if (typeof(response) === 'undefined') {
        		handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();
        	}else if (response.status === 'invalid-name') {
                handleButton(button, spinner);
                handleErrors($('.name'), $('.name-error'), 'Skill name must be between 3 - 10 characters.');
            } else if (response.status === 'skill-exists') {
                handleButton(button, spinner);
                handleErrors($('.name'), $('.name-error'), 'Skill already exists');
            } else if (response.status === 'invalid-percent') {
                handleButton(button, spinner);
                handleErrors($('.percent'), $('.percent-error'), 'Skill percent is required.');
            } else if (response.status === 'percentage-error') {
                handleButton(button, spinner);
                handleErrors($('.percent'), $('.percent-error'), 'Percent must be less than 100');
            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful.').fadeIn();
                // window.location.reload();
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

    $('.edit-skill-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.edit-skill-button');
        var spinner = $('.edit-skill-spinner');
        var message = $('.edit-skill-message');
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
            if (typeof(response) === 'undefined') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html('An error occured. Try again.').fadeIn();
            }else if (response.status === 'invalid-name') {
                handleButton(button, spinner);
                handleErrors($('.name'), $('.name-error'), 'Skill name must be between 3 - 10 characters.');
            } else if (response.status === 'skill-exists') {
                handleButton(button, spinner);
                handleErrors($('.name'), $('.name-error'), 'Skill already exists');
            } else if (response.status === 'invalid-percent') {
                handleButton(button, spinner);
                handleErrors($('.percent'), $('.percent-error'), 'Skill percent is required.');
            } else if (response.status === 'percentage-error') {
                handleButton(button, spinner);
                handleErrors($('.percent'), $('.percent-error'), 'Percent must be less than 100');
            } else if (response.status === 'skill-exists') {
                handleButton(button, spinner);
                handleErrors($('.name'), $('.name-error'), 'Skill already exists');
            } else if (response.status === 'success') {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html('Operation successful.').fadeIn();
                // window.location.reload();
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

    $('.toggle-skill-status').on('change', function(event){
        event.preventDefault();
        var checkbox = $(this);
        var request = $.ajax({
            url: checkbox.attr('data-url'),
            processData: false,
            contentType: false,
            dataType: 'json'
        });
        
        request.done(function(response){
            if (typeof(response) === 'undefined') {
                toggleCheckbox(checkbox);
                alert('Operation Failed');
            }else if (response.status === 'success') {
                return true;
            } else if (response.status === 'error') {
                toggleCheckbox(checkbox);
                alert('Operation Failed');
            } else {
                toggleCheckbox(checkbox);
                alert('Network Error');
            }
        });

        request.fail(function() {
            toggleCheckbox(checkbox);
            alert('Network Error');
        });
    });

})(jQuery);
