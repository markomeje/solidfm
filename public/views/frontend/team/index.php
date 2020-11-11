<div class="qt-parentcontainer">
	<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div id="maincontent" class="qt-main">
		<div class="qt-pageheader qt-negative">
			<div class="qt-container">
				<h1 class="qt-caption qt-spacer-s">
					SolidFM Staff
				</h1>
				<h4 class="qt-subtitle">
				    The Rock Station
				</h4>
			</div>
			<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/banners/staff.jpg">
				<img src="<?= PUBLIC_URL; ?>/images/banners/staff.jpg" alt="Solid100.9 FM" width="690" height="302">
			</div>
		</div>
		<div class="qt-container qt-vertical-padding-l qt-archive-team">
			<?php if(empty($allMembers)): ?>
				<div>SolidFM Team Members</div>
			<?php else: ?>
				<div class="row">
					<?php foreach ($allMembers as $member): ?>
						<?php require FRONTEND_PATH . DS . "team" . DS . "partials" . DS . "listings.php"; ?>
				    <?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
    </div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>