<div class="qt-parentcontainer">
	<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
	<div id="maincontent" class="qt-main">
		<?php require FRONTEND_PATH . DS . "home" . DS . "partials" . DS . "slider.php"; ?>
		<?php require FRONTEND_PATH . DS . "home" . DS . "partials" . DS . "upcoming.php"; ?>
		<div class="qt-container">
			<div class="row">
				<div class="col s12 m12 l9">
						<?php if(empty($allNews)): ?>
							<h3 class="qt-caption-med"></h3>
						<?php else: ?>
							<?php $latestNews = array_slice($allNews, 0, 1); ?>
							<?php foreach($latestNews as $news): ?>
								<div class="qt-vertical-padding-m qt-section">
									<h5 class="qt-caption-small">
										<span>News Highlight</span>
									</h5>
									<?php $title = empty($news->title) ? "Nill" : $news->title; ?>
									<?php $id = empty($news->id) ? 0 : $news->id; ?>
									<div class="qt-part-archive-item qt-part-item-post-hero">
										<div class="qt-item-header">
											<div class="qt-header-mid qt-vc">
												<div class="qt-vi">
													<div class="qt-the-content qt-spacer-s small hide-on-med-and-down ">
														<p class="qt-spacer-s qt-text-shadow">.</p>
														<?php $rawTitle = implode("-", explode(" ", strtolower($title))); ?>
														<p><a href="<?= DOMAIN; ?>/news/read/<?= $id; ?>/<?= $rawTitle; ?>" class="qt-btn qt-btn-l qt-btn-primary "><i class="dripicons-align-justify"></i></a></p>
													</div>
												</div>
											</div>
											<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/news/<?= empty($news->image) ? 'default.jpg' : $news->image; ?>">
												<img src="<?= PUBLIC_URL; ?>/images/news/<?= empty($news->image) ? 'default.jpg' : $news->image; ?>" alt="Featured image" width="1170" height="512">
											</div>
											<div class="qt-header-bottom" style="position: relative; top: -15px;">
												<div class="qt-item-metas">
													<a class="qt-author-thumb" style="margin-top: 10px;" href="javascript:;">
														<img src="" alt="" width="30" height="30">
													</a>
													<div class="qt-texts">
														<h6><a href="<?= DOMAIN; ?>/news/read/<?= $id; ?>/<?= $rawTitle; ?>" class="" style="">
															<?= $title; ?>
														</a></h6><br>
														<p class="qt-date">
															<?= empty($news->date) ? "1st January 1880" : Application\Core\Help::formatDate($news->date); ?>
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
						<h5 class="qt-caption-small"><span>Featured News</span></h5>
						<?php if(empty($allNews)): ?>
							<h3 class="qt-caption-med"><span>No News Yet</span></h3>
						<?php else: ?>
							<div class="row">
								<?php $sixLatestNews = (count($allNews) > 3) ? array_slice($allNews, 0, 3) : $allNews; ?>
								<?php foreach($sixLatestNews as $news): ?>
									<div class="col s12 m6 l4">
										<?php $title = empty($news->title) ? "Nill" : $news->title; ?>
									    <?php $id = empty($news->id) ? 0 : $news->id; ?>
									    <?php $rawTitle = implode("-", explode(" ", strtolower($title))); ?>
									        <?php require FRONTEND_PATH . DS . "home" . DS . "partials" . DS . "news.php"; ?>
									</div>
								<?php endforeach; ?>
							</div>
				        <?php endif; ?>
						<?php if(!empty($latestVideoStory)): ?>
							<div class=" qt-section">
								<h5 class="qt-caption-small"><span>Video Story</span></h5>
								<hr class="qt-spacer-s">
								<div class="qt-part-archive-item qt-part-item-post-hero">
									<div class="qt-item-header">
										<div class="qt-header-mid qt-vc">
											<div class="qt-vi">
											<iframe width="1280" height="720" src="<?= $latestVideoStory->link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<div class="qt-section">
							<div class="row">
								<?php require FRONTEND_PATH . DS . "home" . DS . "partials" . DS . "youtube.php"; ?>
							</div>
						</div>
						<h5 class="qt-caption-small"><span>Music Chart</span></h5>
						<div class="qt-vertical-padding-l qt-content-primary-dark qt-section">
							<div class="qt-container qt-negative">
								<?php if(empty($allMusicChart)): ?>
									<h5 class="qt-caption-med"><span>No Music Available</span></h5>
								<?php else: ?>
									<ul class=" qt-chart-tracklist qt-spacer-m">
										<?php $topThreeMusic = (count($allMusicChart) > 4) ? array_slice($allMusicChart, 0, 4) : $allMusicChart; ?>
										<?php foreach($topThreeMusic as $music): ?>
											<li class="qt-part-chart qt-chart-track qt-negative qt-card-s">
												<div class="qt-chart-table qt-content-primary">
													<div class="qt-position">
														<img src="<?= PUBLIC_URL; ?>/images/music/<?= empty($music->picture) ? 'default.jpg' : $music->picture; ?>" class="qt-chart-cover" alt="Chart track" width="170" height="170">
													</div>
													<div class="qt-titles">
														<h3 class="qt-ellipsis qt-t">
															<?= empty($music->title) ? "No Title" : ucwords($music->title); ?>
														</h3>
														<p><?= empty($music->artist) ? "No Title" : ucwords($music->artist); ?></p>
													</div>
												</div>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
							<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/music/default.jpg">
								<img src="<?= PUBLIC_URL; ?>/images/music/default.jpg" alt="Featured image" width="690" height="302">
							</div>
						</div>
						<hr class="qt-spacer-m">
					</div>
				</div>
				<div class="col s12 m12 l3">
					<?php require FRONTEND_PATH . DS . "home" . DS . "partials" . DS . "sidebar.php"; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>

		
