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
		<div class="qt-container qt-archive-team">
			<div class="row">
				<div class="col s12 m12 l9">
					<div class="qt-widget qt-spacer-m">
						<h5 class="qt-caption-small"><span>Team Member</span></h5>
						<?php if(empty($singleMember)): ?>
							<div class="">Team Member Not Found</div>
						<?php else: ?>
							<div class="row">
								<div class="col s12 m12 l4">
									<img src="<?= PUBLIC_URL; ?>/images/members/<?= $singleMember->photo; ?>" alt="Featured image"><br>
								</div>
								<div class="col s12 m12 l8">
									<h3>
										<?= empty($singleMember->fullname) ? "Nill" : $singleMember->fullname; ?>
									</h3><br>
									<div><?= empty($singleMember->biography) ? "Nill" : $singleMember->biography; ?></div>
									<ul class="" style="font-size: 35px !important; margin-top: 12px;">
										<li class="left">
											<a href="<?= empty($singleMember->facebook) ? 'https://www.facebook.com/Solid1009fm' : $singleMember->facebook; ?>" target="_blank">
												<i class="qticon-facebook qt-socialicon"></i>
											</a>
										</li>
										<li class="left">
											<a href="<?= empty($singleMember->twitter) ? 'https://twitter.com/solid1009' : $singleMember->twitter; ?>"  target="_blank">
												<i class="qticon-twitter qt-socialicon"></i>
											</a>
										</li>
										<li class="left">
											<a href="<?= empty($singleMember->instagram) ? 'https://instagram.com/solid100.9fm' : $singleMember->instagram; ?>" target="_blank">
												<i class="qticon-instagram qt-socialicon"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="col s12 m12 l3">
					<?php require FRONTEND_PATH . DS . "team" . DS . "partials" . DS . "sidebar.php"; ?>
				</div>
			</div>
		</div>
    </div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>