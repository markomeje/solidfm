<div class="row">
	<div class="col s12 m3 l12">
		<h5 class="qt-caption-small"><span>Recent News</span></h5>
		<?php if(empty($recentNews)): ?>
			<div><span>No Recent News</span></div>
		<?php else: ?>
			<div class="qt-widget">
				<?php $title = empty($recentNews->title) ? "Nill" : $recentNews->title; ?>
			    <?php $id = empty($recentNews->id) ? 0 : $recentNews->id; ?>
			    <?php $rawTitle = implode("-", explode(" ", strtolower($title))); ?>
				<div class="qt-part-archive-item qt-part-archive-item-small-title">
					<div class="qt-item-header">
						<div class="qt-header-top">
							<ul class="qt-tags">
								<li>
									<a href="<?= DOMAIN; ?>/news/read/<?= $id; ?>/<?= $rawTitle; ?>">Read News</a>
								</li>
							</ul>
						</div>
						<div class="qt-header-mid qt-vc">
						</div>
						<div class="qt-header-bottom">
							<a href="<?= DOMAIN; ?>/news/read/<?= $id; ?>/<?= $rawTitle; ?>" class="qt-btn qt-btn-primary qt-readmore">
								<i class="dripicons-align-justify"></i>
							</a>
						</div>
						<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/news/<?= empty($recentNews->image) ? 'default.jpg' : $recentNews->image; ?>">
							<img src="<?= PUBLIC_URL; ?>/images/news/<?= empty($recentNews->image) ? 'default.jpg' : $recentNews->image; ?>" alt="Solid100.9 FM" width="690" height="302">
						</div>
					</div>
					<hr class="qt-spacer-s">
					<a href="<?= DOMAIN; ?>/news/read/<?= $id; ?>/<?= $rawTitle; ?>" class="" style="color: #333;">
						<?= empty($recentNews->title) ? "No News Title. Solid100.9 FM" : $recentNews->title; ?>
					</a>
					<div class="" style="color: #999;">
					    <?= empty($recentNews->content) ? "No News Content. Solid100.9 FM" : Application\Core\Help::limitStringLength(strip_tags($recentNews->content), 50); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<h5 class="qt-caption-small"><span>Upcoming shows</span></h5>
		<?php if(empty($allUpcomingProgrammes)): ?>
		    <div><span>No Upcoming shows</span></div>
		    <hr class="qt-spacer-s">
		<?php else: ?>
			<div class="qt-widget">
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
		<?php endif; ?>
		<h5 class="qt-caption-small"><span>Adverts</span></h5>
		<?php if(empty($allActiveAdverts)): ?>
			<div><span>No Active Adverts</span></div>
		<?php else: ?>
			<div class="qt-widget">
				<?php foreach($allActiveAdverts as $advert): ?>
					<div class="" style="margin-bottom: 25px;">
						<a href="javascript:;" rel="nofollow">
							<img src="<?= PUBLIC_URL; ?>/images/adverts/<?= empty($advert->image) ? 'default.jpg' : $advert->image; ?>" alt="Sponsor" height="132">
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>