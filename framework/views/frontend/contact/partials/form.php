<form class="col s12" method="post" class="contact-form" action="<?= DOMAIN; ?>/contact" data-action="<?= DOMAIN; ?>/contact/request">
    <input type="hidden" name="antispam" value="x123">
    <h3 class="left-align qt-vertical-padding-m">Send a message using the form below</h3>
    <?php if(!empty($validationMessage) && $validationMessage !== ""): ?>
		<div class="" style="background-color: #ff0000; color: #fff; padding: 10px 15px;">
			<?= $validationMessage; ?></div>
	<?php endif; ?>
    <div class="row">
        <div class="input-field col s6">
            <input name="firstname" id="first_name" type="text" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>" class="firstname" required="">
            <label>First Name</label>
            <span class="firstname-error d-none"></span>
        </div>
        <div class="input-field col s6">
            <input name="lastname" id="last_name" type="text" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>" class="lastname" required="">
            <label>Last Name</label>
            <span class="lastname-error d-none"></span>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="email" id="formemail" type="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" class="email" required="">
            <label>Email</label>
            <span class="email-error d-none"></span>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <textarea name="message" id="message" class="materialize-textarea message" maxlength="300" required=""><?= isset($_POST['message']) ? $_POST['message'] : ''; ?></textarea>
            <label for="message">Message</label>
            <span class="message-error d-none"></span>
        </div>
    </div>
    <hr class="qt-spacer-s hide-on-med-and-up">
    <div class="row">
        <div class="input-field col s12">
            <button class="qt-btn qt-btn-l qt-btn-primary contact-button qt-spacer-m waves-effect waves-light" type="submit" name="action" style="display: flex; align-items: center;">
            	<img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="d-none  contact-spinner" style="margin-right: 5px;">
                <span class="lnr lnr-rocket"></span> Submit
            </button>
        </div>
    </div>
    <div class="row">
    	<div style="padding: 10px;" class="contact-message"></div>
    </div>
</form>