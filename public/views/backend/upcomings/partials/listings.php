<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card">
		<img src="<?= PUBLIC_URL; ?>/images/upcomings/<?= empty($upcoming->image) ? 'default.jpg' : $upcoming->image; ?>" class="card-img-top img-fluid w-100 cursor-pointer">
		<div class="card-body">
			<div class="font-weight-bold">
				<a href="javascript:;" class="" data-toggle="modal" data-target="#edit-upcoming-<?= empty($upcoming->id) ? 0 : $upcoming->id; ?>">
					<?= empty($upcoming->title) ? "No Title" : $upcoming->title; ?>
				</a>
			</div>
			<div class="text-muted">
				<em>By</em> <?= empty($upcoming->presenter) ? "No Presenter" : $upcoming->presenter; ?>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="<?= empty($upcoming->id) ? 0 : $upcoming->id; ?>; ?>">
                <label class="custom-control-label" for="<?= empty($upcoming->id) ? 0 : $upcoming->id; ?>; ?>"></label>
            </div>
            <div class="d-flex align-items-center">
            	<small class="text-white mr-2">
            		<?= empty($upcoming->time) ? "00:00" : date("G:ia", strtotime($upcoming->time)); ?>
            	</small>
            	<div class="text-white cursor-pointer">
	            	<i class="icofont-caret-down"></i>
	            </div>
            </div>
		</div>
	</div>
</div>