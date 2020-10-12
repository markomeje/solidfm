<div class="qt-widgets qt-sidebar-main qt-text-secondary row">
	<div class="col s12 m3 l12">
		<?php if(empty($recentNews)): ?>
			<h5 class="qt-caption-small"><span>No Recent News</span></h5>
		<?php else: ?>
			<div class="qt-widget">
				<h5 class="qt-caption-small"><span>Recent News</span></h5>
				<div class="qt-part-archive-item qt-part-archive-item-small-title">
					<div class="qt-item-header">
						<div class="qt-header-top">
							<ul class="qt-tags">
								<li>Local News</li>
							</ul>
						</div>
						<div class="qt-header-mid qt-vc">
							<div class="qt-vi">
								<h4 class="qt-title">
									<a href="<?= DOMAIN; ?>/news/read/<?= empty($recentNews->id) ? 0 : $recentNews->id; ?>" class="qt-text-shadow">
										<?= empty($recentNews->title) ? "No News Title" : ucwords($recentNews->title); ?>
									</a>
								</h4>
							</div>
						</div>
						<div class="qt-header-bottom">
							<a href="<?= DOMAIN; ?>/news/read/<?= empty($recentNews->id) ? 0 : $recentNews->id; ?>" class="qt-btn qt-btn-primary qt-readmore"><i class="dripicons-media-play"></i></a>
						</div>
						<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/news/<?= empty($recentNews->image) ? 'default.jpg' : $recentNews->image; ?>">
							<img src="<?= PUBLIC_URL; ?>/images/news/<?= empty($recentNews->image) ? 'default.jpg' : $recentNews->image; ?>" alt="Solid100.9 FM" width="690" height="302">
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<?php if(empty($allUpcomingProgrammes)): ?>
		<div class="col s12 m3 l12">
			<h5 class="qt-caption-small"><span>No Upcoming shows</span></h5>
		</div>
	<?php else: ?>
		<div class="col s12 m3 l12">
			<div class="qt-widget">
				<h5 class="qt-caption-small"><span>Upcoming shows</span></h5>
				<?php foreach($allUpcomingProgrammes as $upcoming): ?>
					<ul class="qt-widget-upcoming">
						<li class="qt-card-s paper">
							<h5><?= empty($upcoming->presenter) ? "No Presenter" : $upcoming->presenter; ?></h5>
							<p>
								<?= empty($upcoming->starts) ? "00:00" : strtoupper(Application\Core\Help::formatTime($upcoming->starts)); ?>
							</p>
						</li>
					</ul>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
	<?php if(empty($allActiveAdverts)): ?>
	<?php else: ?>
		<div class="col s12 m3 l12">
			<div class="qt-widget">
				<h5 class="qt-caption-small"><span>Current Adverts</span></h5>
				<?php foreach($allActiveAdverts as $advert): ?>
					<div class="qt-widget-sponsor qt-card" style="margin-bottom: 25px;">
						<a href="javascript:;" rel="nofollow">
							<img src="<?= PUBLIC_URL; ?>/images/adverts/<?= empty($advert->image) ? 'default.jpg' : $advert->image; ?>" alt="Sponsor" width="235" height="132">
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
</div>