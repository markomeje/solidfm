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