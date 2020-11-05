<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card">
		<div class="card-body">
			<?php $id = empty($youtube->id) ? 0 : $youtube->id; ?>
			<div class="font-weight-bold">
				<a href="Javascript:;" class="" target="_blank" data-toggle="modal" data-target="#edit-youtube-video-<?= $id; ?>">
					<?= empty($youtube->description) ? "No Description" : Application\Core\Help::limitStringLength($youtube->description, 18); ?>
				</a>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" <?= (isset($youtube->status) && strtolower($youtube->status) === 'active') ? 'checked=""' : ''; ?> id="<?= $id; ?>">
                <label class="custom-control-label" for="<?= $id; ?>"></label>
            </div>
        	<small class="text-white cursor-pointer delete-youtube-video" data-url="<?= DOMAIN; ?>/youtube/deleteYoutubeVideo/<?= $id; ?>">
            	<i class="icofont-ui-delete"></i>
            </small>
		</div>
	</div>
</div>