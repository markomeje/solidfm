<div class="qt-parentcontainer">
	<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
	<div id="maincontent" class="qt-main">
		<div class="qt-pageheader qt-negative">
			<div class="qt-container">
				<h1 class="qt-caption qt-spacer-s">
					Solid100.9 FM News
				</h1>
				<h4 class="qt-subtitle">
				   We Rock
				</h4>
			</div>
			<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/news/default.jpg">
				<img src="<?= PUBLIC_URL; ?>/images/news/default.jpg" alt="Solid100.9 FM" width="690" height="302">
			</div>
		</div>
		<div class="qt-container qt-vertical-padding-l">
			<div class="row">
				<div class="col s12 m12 l1 qt-pushpin-container">
					<?php require FRONTEND_PATH . DS . "news" . DS . "partials" . DS . "icons.php"; ?>
				</div>
				<div class="col s12 m12 l8">
					<?php require FRONTEND_PATH . DS . "news" . DS . "partials" . DS . "listings.php"; ?>
				</div>
				<div class="qt-sidebar col s12 m12 l3">
					<?php require FRONTEND_PATH . DS . "news" . DS . "partials" . DS . "aside.php"; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>
