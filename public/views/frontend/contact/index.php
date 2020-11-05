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
	                <li class=""><a href="https://www.facebook.com/Solid1009fm" target="_blank"><i class="qticon-facebook qt-socialicon"></i></a></li>
					<li class=""><a href="https://twitter.com/solid1009" target="_blank"><i class="qticon-twitter qt-socialicon"></i></a></li>
					<li class=""><a href="https://instagram.com/solid100.9fm" target="_blank"><i class="qticon-instagram qt-socialicon"></i></a></li>
	            </ul>
	        </div>
	        <div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/banners/card.jpg">
	            <img src="<?= PUBLIC_URL; ?>/images/banners/card.jpg" alt="Featured image" width="690" height="302">
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
	                                    <?php require FRONTEND_PATH . DS . "contact" . DS . "partials" . DS . "form.php"; ?>
	                                </div>
	                                <div id="contacts" class="row qt-contacts">
	                                    <div class="col s12">
	                                        <h3 class="left-align qt-vertical-padding-m">Our contacts</h3>
	                                        <p><i class="qt-bigicon dripicons-phone"></i><span>+234 (0) 909 054 5009</span></p>
	                                        <p><i class="qt-bigicon dripicons-phone"></i><span>info@solidfmradio.com</span></p>
	                                        <p><i class="qt-bigicon dripicons-phone"></i><span>10B Savage Cresent, GRA, Enugu</span></p>
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