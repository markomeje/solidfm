<?php $id = empty($video->id) ? 0 : $video->id; ?>
<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card">
		<div class="card-body">
			<div class="">
				<a href="javascript:;" class="" data-toggle="modal" data-target="#edit-video-story-<?= empty($video->id) ? 0 : $video->id; ?>">
					<?= empty($video->title) ? "No Name" : Application\Core\Help::limitStringLength($video->title, 18); ?>
				</a>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input video-story-switch" id="<?= $id; ?>" data-url="<?= DOMAIN; ?>/dashboard/toggleVideoStatus/<?= $id; ?>" <?= (isset($video->status) && strtolower($video->status) === "active") ? 'checked=""' : ''; ?>>
                <label class="custom-control-label" for="<?= $id; ?>"></label>
            </div>
        	<div class="dropdown dropleft">
            	<i class="icofont-caret-down text-white" data-toggle="dropdown"></i>
            	<div class="dropdown-menu">
            		<a href="javascript:;" class="delete-video-story dropdown-item" data-url="<?= DOMAIN; ?>/dashboard/deleteVideoStory/<?= $id; ?>">Delete</a>
            	</div>
            </div>
		</div>
	</div>
</div>