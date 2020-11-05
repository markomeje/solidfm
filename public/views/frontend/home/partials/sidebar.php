<div class="qt-widget qt-spacer-m">
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
	<h5 class="qt-caption-small"><span>Events</span></h5>
	<?php if(empty($allEvents)): ?>
		<div>No current adverts</div>
	<?php else: ?>
		<?php $threeEvents = array_slice($allEvents, 0, 3); ?>
		<div class="qt-widget">
			<?php foreach($threeEvents as $event): ?>
				<ul class="qt-widget-upcoming">
					<li class="qt-card-s paper">
						<h5><?= empty($event->location) ? "No Presenter" : $event->location; ?></h5>
						<p>
							<?= empty($event->date) ? "00:00" : strtoupper(Application\Core\Help::formatDate($event->date)); ?>
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
<div class="qt-widget qt-spacer-m">
	<h5 class="qt-caption-small"><span>Events</span></h5>
	<?php if(empty($allEvents)): ?>
		<div>No current adverts</div>
	<?php else: ?>
		<?php $threeEvents = array_slice($allEvents, 3, 2); ?>
		<div class="qt-widget">
			<?php foreach($threeEvents as $event): ?>
				<ul class="qt-widget-upcoming">
					<li class="qt-card-s paper">
						<h5><?= empty($event->location) ? "No Presenter" : $event->location; ?></h5>
						<p>
							<?= empty($event->date) ? "00:00" : strtoupper(Application\Core\Help::formatDate($event->date)); ?>
						</p>
					</li>
				</ul>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>