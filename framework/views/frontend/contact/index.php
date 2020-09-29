<!-- QT HEADER END ================================ -->
<div class="qt-parentcontainer">
	 <?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
	 <div id="maincontent" class="qt-main">
	    <!-- ======================= HEADER SECTION ======================= -->
	    <!-- HEADER CONTACTS ========================= -->
	    <div class="qt-pageheader qt-negative">
	        <div class="qt-container">
	            <h1 class="qt-caption qt-spacer-s">
	                    Contact Us
	                </h1>
	            <ul class="qt-menu-social qt-spacer-s">
	                <li><a href="#"><i class="qticon-beatport"></i></a></li>
	                <li><a href="#"><i class="qticon-facebook"></i></a></li>
	                <li><a href="#"><i class="qticon-twitter"></i></a></li>
	                <li><a href="#"><i class="qticon-youtube"></i></a></li>
	                <li><a href="#"><i class="qticon-soundcloud"></i></a></li>
	            </ul>
	        </div>
	        <div class="qt-header-bg" data-bgimage="imagestemplate/full-1600-700.jpg">
	            <img src="imagestemplate/full-1600-700.jpg" alt="Featured image" width="690" height="302">
	        </div>
	    </div>
	    <!-- HEADER CONTACTS END ========================= -->
	    <div class="qt-container qt-vertical-padding-l">
	        <div class="row">
	            <div class="col s12 m8 push-m2">
	                <!-- ====================== SECTION BOOKING AND CONTACTS ================================================ -->
	                <div id="booking" class="section qt-section-booking qt-card">
	                    <div class="qt-valign-wrapper">
	                        <div class="qt-valign flow-text">
	                            <div class="qt-booking-form" data-100p-top="opacity:0;" data-80p-top="opacity:0;" data-30p-top="opacity:1;">
	                                <ul class="tabs">
	                                    <li class="tab col s4">
	                                        <h5><a href="#form" class="active">Send a message</a></h5></li>
	                                    <li class="tab col s4">
	                                        <h5><a href="#contacts">Contacts</a></h5></li>
	                                    <li class="tab col s4">
	                                        <h5><a href="#map">Map</a></h5></li>
	                                </ul>
	                                <div id="form" class="row">
	                                    <form class="col s12" method="post" action="javascript:;">
	                                        <input type="hidden" name="antispam" value="x123">
	                                        <h3 class="left-align qt-vertical-padding-m">Send a message using the form below</h3>
	                                        <div class="row">
	                                            <div class="input-field col s6">
	                                                <input name="first_name" id="first_name" type="text" class="validate">
	                                                <label>First Name</label>
	                                            </div>
	                                            <div class="input-field col s6">
	                                                <input name="last_name" id="last_name" type="text" class="validate">
	                                                <label>Last Name</label>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="input-field col s12">
	                                                <input name="email" id="formemail" type="email" class="validate">
	                                                <label>Email</label>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="input-field col s12">
	                                                <textarea name="message" id="message" class="materialize-textarea" maxlength="300"></textarea>
	                                                <label for="message">Message</label>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="input-field col s12">
	                                                <input name="privacy" type="checkbox" id="privacy" value="1" />
	                                                <label>I red and accept the <a href="#" target="_blank">privacy terms</a>.</label>
	                                            </div>
	                                        </div>
	                                        <hr class="qt-spacer-s hide-on-med-and-up">
	                                        <div class="row">
	                                            <div class="input-field col s12">
	                                                <button class="qt-btn qt-btn-l qt-btn-primary qt-spacer-m waves-effect waves-light" type="submit" name="action">
	                                                    <span class="lnr lnr-rocket"></span> Submit
	                                                </button>
	                                            </div>
	                                        </div>
	                                    </form>
	                                </div>
	                                <div id="contacts" class="row qt-contacts">
	                                    <div class="col s12">
	                                        <h3 class="left-align qt-vertical-padding-m">Our contacts</h3>
	                                        <p><i class="qt-bigicon dripicons-phone"></i><span>+44 443 53 2324</span></p>
	                                        <p><i class="qt-bigicon dripicons-phone"></i><span>info@bookmenow.com</span></p>
	                                        <p><i class="qt-bigicon dripicons-phone"></i><span>Road Avenue, California</span></p>
	                                    </div>
	                                </div>
	                                <div id="map" class="qt-map">
	                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2823.9899192531298!2d-123.04142404893491!3d44.94387287592946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54bfff0c89be210f%3A0x79aa007f04406672!2s295+Center+St+NE%2C+Salem%2C+OR+97301%2C+USA!5e0!3m2!1sen!2ses!4v1478257655617" width="600" height="450" style="border:0" allowfullscreen></iframe>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- ====================== SECTION BOOKING AND CONTACTS END ================================================ -->
	            </div>
	        </div>
	    </div>
	</div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>