<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card">
		<div class="card-body">
			<div class="font-weight-bold">
				<a href="javascript:;" class="" data-toggle="modal" data-target="#edit-category-<?= empty($category->id) ? 0 : $category->id; ?>">
					<?= empty($category->name) ? "No Name" : $category->name; ?>
				</a>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="<?= empty($category->id) ? 0 : $category->id; ?>; ?>">
                <label class="custom-control-label" for="<?= empty($category->id) ? 0 : $category->id; ?>; ?>"></label>
            </div>
        	<div class="text-white cursor-pointer">
            	<i class="icofont-caret-down"></i>
            </div>
		</div>
	</div>
</div>