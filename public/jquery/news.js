(function($) {

	'use strict';

    $('.add-news-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-news-button');
    	var spinner = $('.add-news-spinner');
    	var message = $('.add-news-message');
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

        	}else if (response.status === 'invalid-title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), 'Title must be between 3 - 255 characters.');

            } else if (response.status === 'invalid-category') {
                handleButton(button, spinner);
                handleErrors($('.category'), $('.category-error'), 'Please select category');

            } else if (response.status === 'invalid-author') {
                handleButton(button, spinner);
                handleErrors($('.author'), $('.author-error'), 'Invalid author name');

            } else if (response.status === 'invalid-image') {
                handleButton(button, spinner);
                handleErrors($('.image'), $('.image-error'), 'Invalid image. Image must be maximum size of 4MB and only jpg, jpeg, png, gif formats are allowed');

            } else if (response.status === 'invalid-content') {
                handleButton(button, spinner);
                handleErrors($('.content'), $('.content-error'), 'News content must be between 50 - 1500 characters.');

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
            alert('System Error');
        });
    });

})(jQuery);