(function ($) {

	'use strict';

    $('.add-video-story-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-video-story-button');
    	var spinner = $('.add-video-story-spinner');
    	var message = $('.add-video-story-message');
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

        	}else if (response.status === 'invalid-link') {
                handleButton(button, spinner);
                handleErrors($('.link'), $('.link-error'), 'Video story link must be between 3 - 255 characters.');

            } else if (response.status === 'video-exists') {
                handleButton(button, spinner);
                handleErrors($('.link'), $('.link-error'), 'Video story link already exists');

            } else if (response.status === 'invalid-status') {
                handleButton(button, spinner);
                handleErrors($('.status'), $('.status-error'), 'Video story status is required.');

            } else if (response.status === 'invalid-title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), 'Video story title is required.');

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

    $('.video-story-switch').change(function(event) {
        var checkbox = $(this);
        var state = checkbox.prop('checked') ? true : false;
        var status = checkbox.parent().parent().parent().find('.network-status');
        var request = $.ajax({
            url: checkbox.attr('data-url'),
            processData: false,
            contentType: false,
            dataType: 'json'
        });

        request.done(function(response) {
            if (response.status === 'error') {
                checkbox.prop('checked', !state);
                $(status[0]).text(response.video);
                alert('An error occured. Try again');
            }else if(response.status === 'success') {
                $(status[0]).text(response.video);
            }
        });

        request.fail(function() {
            alert('Network Error');
        });

    });

    $('.delete-video-story').click(function() {
        var video = $(this);
        if (confirm("Are you sure")) {
            var request = $.ajax({
                url: video.attr('data-url'),
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