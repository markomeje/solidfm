<?php if(empty($allYoutubeVideos)): ?>
	<div class="">No Videos yet</div>
<?php else: ?>
	<?php $latestFourVideos = (count($allYoutubeVideos) > 4) ? array_slice($allYoutubeVideos, 0, 4) : $allYoutubeVideos; ?>
	<?php foreach($latestFourVideos as $video): ?>
		<div class="col s12 m6 l3">
			<div class="qt-part-archive-item qt-part-archive-item-small-text">
				<div class="qt-item-header">
					<iframe width="690" height="302" src="<?= empty($video->link) ? '' : $video->link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<h4 class="qt-title">
					<a href="javascript:;" class="qt-spacer-s qt-ellipsis-2 qt-t">
						<?= empty($video->description) ? 'No Video Title' : $video->description; ?>
					</a>
				</h4>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>