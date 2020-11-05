(function ($) {

	'use strict';

    $('.add-music-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-music-button');
    	var spinner = $('.add-music-spinner');
    	var message = $('.add-music-message');
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
                handleErrors($('.title'), $('.title-error'), 'Invalid title');

            }else if (response.status === 'invalid-picture') {
                handleButton(button, spinner);
                handleErrors($('.picture'), $('.picture-error'), 'Invalid picture. Image must be maximum size of 4MB and only jpg, jpeg, png, gif formats are allowed');

            } else if (response.status === 'invalid-artist') {
                handleButton(button, spinner);
                handleErrors($('.artist'), $('.artist-error'), 'Artist name is required.');

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

    $('.delete-music').click(function() {
        var music = $(this);
        if (confirm("Are you sure")) {
            var request = $.ajax({
                url: music.attr('data-url'),
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