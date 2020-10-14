<div class="qt-parentcontainer">
	<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
	<div id="maincontent" class="qt-main">
		<?php require FRONTEND_PATH . DS . "home" . DS . "partials" . DS . "slider.php"; ?>
		<?php require FRONTEND_PATH . DS . "home" . DS . "partials" . DS . "upcoming.php"; ?>
		<?php if(empty($allNews)): ?>
			<h3 class="qt-caption-med"></h3>
		<?php else: ?>
			<?php $latestNews = array_slice($allNews, 0, 1); ?>
			<?php foreach($latestNews as $news): ?>
				<div class="qt-container qt-spacer-m qt-section">
					<h3 class="qt-caption-med"><span>News highlights</span></h3>
					<hr class="qt-spacer-s">
					<div class="qt-part-archive-item qt-part-item-post-hero">
						<div class="qt-item-header">
							<div class="qt-header-mid qt-vc">
								<div class="qt-vi">
									<div class="qt-the-content qt-spacer-s small hide-on-med-and-down ">
										<p class="qt-spacer-s qt-text-shadow">.</p>
										<p><a href="<?= DOMAIN; ?>/news/read/<?= empty($news->id) ? 0 : $news->id; ?>" class="qt-btn qt-btn-l qt-btn-primary "><i class="dripicons-align-justify"></i></a></p>
									</div>
								</div>
							</div>
							<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/news/<?= empty($news->image) ? 'default.jpg' : $news->image; ?>">
								<img src="<?= PUBLIC_URL; ?>/images/news/<?= empty($news->image) ? 'default.jpg' : $news->image; ?>" alt="Featured image" width="1170" height="512">
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
		<div class="qt-container qt-spacer-m">
			<h5 class="qt-caption-small"><span>Featured News</span></h5>
			<hr class="qt-spacer-s">
			<?php require FRONTEND_PATH . DS . "home" . DS . "partials" . DS . "news.php"; ?>
		</div>
		<div class="qt-container qt-spacer-m qt-section">
			<h3 class="qt-caption-med"><span>Video story</span></h3>
			<hr class="qt-spacer-s">
			<div class="qt-part-archive-item qt-part-item-post-hero">
				<div class="qt-item-header">
					<div class="qt-header-mid qt-vc">
						<div class="qt-vi">
						<iframe width="1280" height="720" src="https://www.youtube.com/embed/lRpBLAwIbeA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="qt-container qt-spacer-m qt-section">
			<div class="row">
				<?php require FRONTEND_PATH . DS . "home" . DS . "partials" . DS . "youtube.php"; ?>
			</div>
		</div>
		<hr class="qt-spacer-m">
		<div class="qt-vertical-padding-l qt-content-primary-dark qt-section">
			<div class="qt-container qt-negative">
				<?php if(empty($allMusic)): ?>
					<h5 class="qt-caption-med"><span>No Music Available</span></h5>
				<?php else: ?>
					<h3 class="qt-caption-med"><span>Music Chart</span></h3>
					<ul class="collapsible qt-chart-tracklist qt-spacer-m" data-collapsible="accordion">
						<?php $topThreeMusic = array_slice($allMusic, 0, 3); ?>
						<?php foreach($topThreeMusic as $music): ?>
							<li class="qt-part-chart qt-chart-track qt-negative qt-card-s">
								<div class="qt-chart-table collapsible-header qt-content-primary">
									<div class="qt-position">
										<img src="<?= PUBLIC_URL; ?>/images/music/<?= empty($music->image) ? 'abc123def4.jpg' : $music->image; ?>" class="qt-chart-cover" alt="Chart track" width="170" height="170">
										<span>8</span>
									</div>
									<div class="qt-titles">
										<h3 class="qt-ellipsis qt-t">
											<?= empty($music->title) ? "No Title" : ucwords($music->title); ?>
										</h3>
										<p><?= empty($music->artist) ? "No Title" : ucwords($music->artist); ?></p>
									</div>
								</div>
								<div class="collapsible-body qt-paper">
									<p>
										Top of its chart this week
									</p>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
					<p class="aligncenter qt-spacer-m">
						<a href="" class="qt-btn qt-btn qt-btn-l qt-btn-primary">View full chart</a>
					</p>
				<?php endif; ?>
			</div>
			<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/music/default.jpg">
				<img src="<?= PUBLIC_URL; ?>/images/music/default.jpg" alt="Featured image" width="690" height="302">
			</div>
		</div>
		<p></p>
			<hr class="qt-spacer-s">
		</div>
	</div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>

		
