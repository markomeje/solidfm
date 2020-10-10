<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card">
		<div class="card-body">
			<div class="font-weight-bold">
				<a href="Javascript:;" class="" target="_blank" data-toggle="modal" data-target="#edit-youtube-video-<?= empty($youtube->id) ? 0 : $youtube->id; ?>">
					<?= empty($youtube->description) ? "No Description" : Application\Core\Help::limitStringLength($youtube->description, 20); ?>
				</a>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="<?= empty($youtube->id) ? 0 : $youtube->id; ?>; ?>">
                <label class="custom-control-label" for="<?= empty($youtube->id) ? 0 : $youtube->id; ?>; ?>"></label>
            </div>
        	<div class="text-white cursor-pointer">
            	<i class="icofont-caret-down"></i>
            </div>
		</div>
	</div>
</div>