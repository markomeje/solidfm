(function($) {

	'use strict';

    $('.add-member-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-member-button');
    	var spinner = $('.add-member-spinner');
    	var message = $('.add-member-message');
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

            }else if (response.status === 'invalid-fullname') {
                handleButton(button, spinner);
                handleErrors($('.fullname'), $('.fullname-error'), 'Fullname is required');

            } else if (response.status === 'invalid-photo') {
                handleButton(button, spinner);
                handleErrors($('.photo'), $('.photo-error'), 'Invalid image. Image must be maximum size of 4MB and only jpg, jpeg, png, gif formats are allowed');

            }else if (response.status === 'invalid-facebook') {
                handleButton(button, spinner);
                handleErrors($('.facebook'), $('.facebook-error'), 'Invalid facebook profile link.');

            }else if (response.status === 'invalid-instagram') {
                handleButton(button, spinner);
                handleErrors($('.instagram'), $('.instagram-error'), 'Invalid instagram profile link.');

            }else if (response.status === 'invalid-twitter') {
                handleButton(button, spinner);
                handleErrors($('.twitter'), $('.twitter-error'), 'Invalid twitter profile link.');

        	}else if (response.status === 'invalid-status') {
                handleButton(button, spinner);
                handleErrors($('.status'), $('.status-error'), 'Please select status');

            }else if (response.status === 'invalid-biograpgy') {
                handleButton(button, spinner);
                handleErrors($('.biograpgy'), $('.biograpgy-error'), 'Please enter biograpgy');

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

    $('.delete-member').on('click', function() {
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

    $('.edit-member-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.edit-member-button');
        var spinner = $('.edit-member-spinner');
        var message = $('.edit-member-message');
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

    $('.change-member-photo-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.change-member-photo-button');
        var spinner = $('.change-member-photo-spinner');
        var message = $('.change-member-photo-message');
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

            }else if (response.status === 'invalid-photo') {
                handleButton(button, spinner);
                handleErrors($('.photo'), $('.photo-error'), 'Invalid photo. Photo must be maximum size of 4MB and only jpg, jpeg, png, gif formats are allowed');

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