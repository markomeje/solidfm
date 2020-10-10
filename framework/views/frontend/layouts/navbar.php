<!-- QT MENUBAR TOP ================================ -->
<div class="qt-menubar-top  qt-content-primary hide-on-large-and-down">
	<ul>
		<li><a href="<?= DOMAIN; ?>/about"><i class="dripicons-chevron-right"></i>About</a></li>
		<li><a href="<?= DOMAIN; ?>/adverts"><i class="dripicons-chevron-right"></i>Adverts</a></li>
		<li><a href="<?= DOMAIN; ?>/contact"><i class="dripicons-chevron-right"></i>Contact</a></li>
		<li class="right"><a href="#"><i class="qticon-beatport qt-socialicon"></i></a></li>
		<li class="right"><a href="#"><i class="qticon-facebook qt-socialicon"></i></a></li>
		<li class="right"><a href="#"><i class="qticon-twitter qt-socialicon"></i></a></li>
		<li class="right"><a href="#"><i class="qticon-youtube qt-socialicon"></i></a></li>
		<li class="right"><a href="#"><i class="qticon-instagram qt-socialicon"></i></a></li>
	</ul>
</div>
<!-- QT MENUBAR  ================================ -->
<nav class="qt-menubar nav-wrapper qt-content-primary ">
	<!-- desktop menu  HIDDEN IN MOBILE AND TABLETS -->
	<ul class="qt-desktopmenu hide-on-xl-and-down">
		<li class="qt-logo-link">
			<a href="<?= DOMAIN; ?>">
				<img src="<?= PUBLIC_URL; ?>/images/logo.png" alt="SolidFM" title="">
			</a>
		</li>
		<li>
			<a href="<?= DOMAIN; ?>">Home</a>
		</li>
		<li>
			<a href="<?= DOMAIN; ?>/news">News</a>
		</li>
		<li>
			<a href="<?= DOMAIN; ?>/events">Events</a>
		</li>
		<li>
			<a href="<?= DOMAIN; ?>/schedules">Schedules</a>
		</li>
		<li><a href="<?= DOMAIN; ?>/contact">Contact</a></li>
		<li class="right">
			<a href="#!" data-expandable="#qtsearchbar" class="qt-btn qt-btn-l qt-scrolltop">
				<i class="icon dripicons-search"></i>
			</a>
		</li>
		<!-- <li class="right">
			<a href="<?= DOMAIN; ?>/popup" class="qt-popupwindow" data-name="Music Player" data-width="320" data-height="500">
				<i class="icon dripicons-duplicate"></i>Popup
			</a>
		</li> -->
		<li class="right">
			<a href="#!" class="button-playlistswitch" data-activates="channelslist"><i class="icon dripicons-media-play"></i>Listen</a>
		</li>
	</ul>
	<!-- mobile menu icon and logo VISIBLE ONLY TABLET AND MOBILE-->
	<ul class="qt-desktopmenu hide-on-xl-only ">
		<li>
			<a href="#" data-activates="qt-mobile-menu" class="button-collapse qt-menu-switch qt-btn qt-btn-primary qt-btn-m">
				<i class="dripicons-menu"></i>
			</a>
		</li>
		<li>
			<a href="#!">
				<img src="<?= PUBLIC_URL; ?>/images/logo.png" alt="" title="">
			</a>
		</li>
	</ul>
</nav>
<!-- mobile menu -->
<div id="qt-mobile-menu" class="side-nav qt-content-primary">
	<ul class=" qt-side-nav">
		<li>
			<a href="<?= DOMAIN; ?>">Home</a>
		</li>
		<li class="">
			<a href="<?= DOMAIN; ?>/news">News</a>
		</li>
		<li class="">
			<a href="<?= DOMAIN; ?>/events">Events</a>
		</li>
		<li>
			<a href="<?= DOMAIN; ?>/schedules">Schedules</a>
		</li>
		<li>
			<a href="<?= DOMAIN; ?>/contact">Contact</a>
		</li>
	</ul>
</div>
<!-- mobile toolbar -->
<ul class="qt-mobile-toolbar qt-content-primary-dark qt-content-aside hide-on-large-only">
	<li><a href="#!" data-expandable="#qtsearchbar" class="qt-scrolltop"><i class="icon dripicons-search"></i></a></li>
	<li><a href="page-popup.html" class="qt-popupwindow" data-name="Music Player" data-width="320" data-height="500"><i class="icon dripicons-duplicate"></i></a></li>
	<li><a href="#!" class="button-playlistswitch" data-activates="channelslist"><i class="icon dripicons-media-play"></i></a></li>
</ul>
<div id="qtsearchbar" class="qt-searchbar qt-content-primary qt-expandable">
	<div class="qt-expandable-inner">
		<form method="post" action="#search" class="qt-inline-form">
			<div class="row qt-nopadding">
				<div class="col s12 m8 l9">
					<input placeholder="Search" value="" id="searchtex" type="text" class="validate qt-input-l" style="color: #000 !important;">
				</div>
				<div class="col s12 m3 l2">
					<input type="button" value="Search" class="qt-btn qt-btn-primary qt-btn-l qt-fullwidth">
				</div>
				<div class="col s12 m1 l1">
					<a href="#!" class="qt-btn qt-btn-l qt-btn-secondary qt-fullwidth aligncenter" data-expandable="#qtsearchbar"><i class="dripicons-cross"></i></a>
				</div>
			</div>
		</form>
	</div>
</div>
