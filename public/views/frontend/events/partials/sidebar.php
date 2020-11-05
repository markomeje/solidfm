<div class="qt-widget">
	<h5 class="qt-caption-small"><span>Adverts</span></h5>
	<?php if(empty($allActiveAdverts)): ?>
		<div>No current adverts</div>
	<?php else: ?>
		<?php $twoAdverts = array_slice($allActiveAdverts, 0, 2); ?>
		<?php foreach($twoAdverts as $advert): ?>
			<div class="qt-item" style="margin-bottom: 25px;">
				<a href="javascript:;" rel="nofollow">
					<img src="<?= PUBLIC_URL; ?>/images/adverts/<?= empty($advert->image) ? 'default.jpg' : $advert->image; ?>" alt="Sponsor">
				</a>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
<div class="qt-widget qt-spacer-m">
	<h5 class="qt-caption-small"><span>Upcoming Shows</span></h5>
	<?php if(empty($allUpcomingProgrammes)): ?>
		<div class="col s12 m3 l12">
			<h5 class="qt-caption-small"><span>No Upcoming shows</span></h5>
		</div>
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
</div>
<div class="qt-widget qt-spacer-m">
	<h5 class="qt-caption-small"><span>Adverts</span></h5>
	<?php if(empty($allActiveAdverts)): ?>
		<div>No current adverts</div>
	<?php else: ?>
		<?php $twoAdverts = array_slice($allActiveAdverts, 2, 4); ?>
		<?php foreach($twoAdverts as $advert): ?>
			<div class="qt-item" style="margin-bottom: 25px;">
				<a href="javascript:;" rel="nofollow">
					<img src="<?= PUBLIC_URL; ?>/images/adverts/<?= empty($advert->image) ? 'default.jpg' : $advert->image; ?>" alt="Sponsor">
				</a>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
