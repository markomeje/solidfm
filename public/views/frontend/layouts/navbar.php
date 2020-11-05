<div class="qt-menubar-top  qt-content-primary hide-on-large-and-down">
	<ul>
		<li><a href="<?= DOMAIN; ?>/about"><i class="dripicons-chevron-right"></i>About</a></li>
		<li><a href="<?= DOMAIN; ?>/contact"><i class="dripicons-chevron-right"></i>Contact</a></li>
		<li><a href="<?= DOMAIN; ?>/login"><i class="dripicons-chevron-right"></i>Login</a></li>
		<li class="right"><a href="https://www.facebook.com/Solid1009fm" target="_blank"><i class="qticon-facebook qt-socialicon"></i></a></li>
		<li class="right"><a href="https://twitter.com/solid1009" target="_blank"><i class="qticon-twitter qt-socialicon"></i></a></li>
		<li class="right"><a href="https://instagram.com/solid100.9fm" target="_blank"><i class="qticon-instagram qt-socialicon"></i></a></li>
	</ul>
</div>
<nav class="qt-menubar nav-wrapper qt-content-primary ">
	<ul class="qt-desktopmenu hide-on-xl-and-down">
		<li class="qt-logo-link">
			<a href="<?= DOMAIN; ?>">
				<img src="<?= PUBLIC_URL; ?>/images/logos/logo.png" alt="SolidFM" title="">
			</a>
		</li>
		<li>
			<a href="<?= DOMAIN; ?>">Home</a>
		</li>
		<li><a href="<?= DOMAIN; ?>/about">About</a></li>
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
		<li class="right">
			<a href="javascript:;" class="button-playlistswitch" data-activates="channelslist"><i class="icon dripicons-media-play"></i>Listen</a>
		</li>
	</ul>
	<!-- mobile menu icon and logo VISIBLE ONLY TABLET AND MOBILE-->
	<ul class="qt-desktopmenu hide-on-xl-only ">
		<li>
			<a href="javascript:;" data-activates="qt-mobile-menu" class="button-collapse qt-menu-switch qt-btn qt-btn-primary qt-btn-m">
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
		<li><a href="<?= DOMAIN; ?>/about">About</a></li>
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
	<li><a href="javascript:;" data-expandable="#qtsearchbar" class="qt-scrolltop"><i class="icon dripicons-search"></i></a></li>
	<li><a href="javascript:;" class="button-playlistswitch" data-activates="channelslist"><i class="icon dripicons-media-play"></i></a></li>
</ul>
<div id="qtsearchbar" class="qt-searchbar qt-content-primary qt-expandable">
	<div class="qt-expandable-inner">
		<form method="post" action="javascript:;" class="qt-inline-form">
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
