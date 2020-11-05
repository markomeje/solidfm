<div class="col-12 col-md-6 col-lg-4 mb-4">
	<div class="card">
		<?php $id = empty($programme->id) ? 0 : $programme->id; ?>
		<div class="card-body">
			<div class="font-weight-bold d-flex justify-content-between border-bottom pb-2 align-items-center mb-2">
				<a href="javascript:;" class="" data-toggle="modal" data-target="#edit-programme-<?= $id; ?>">
					<?= empty($programme->title) ? "No Ttile" : Application\Core\Help::limitStringLength(ucfirst($programme->title), 19); ?>
				</a>
				<div class="d-flex align-items-center">
					<div class="text-dark mr-2 cursor-pointer">
		            	<div class="dropdown">
		            		<div class=""  data-toggle="dropdown">
		            			<i class="icofont-caret-down mt-1"></i>
		            			<div class="dropdown-menu dropdown-menu-right add-title-dropdown">
									<a class="dropdown-item" href="javascript:;">Nill</a>
								</div>
		            		</div>
		            	</div>
		            </div>
				</div>
			</div>
			<div class="d-flex justify-content-between align-items-center">
				<small class="text-muted">
					<?= empty($programme->day) ? "Nill" : ucfirst($programme->day); ?>
				</small>
				<small class="text-muted">
					<?= empty($programme->starts) ? "00:00" : strtoupper(Application\Core\Help::formatTime($programme->starts)); ?> - <?= empty($programme->ends) ? "00:00" : strtoupper(Application\Core\Help::formatTime($programme->ends)); ?>
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
			<div class="custom-control custom-switch">
                <input type="checkbox" <?= isset($programme->status) && strtolower($programme->status) === "active" ? 'checked=""' : '' ; ?> class="custom-control-input" id="<?= $id; ?>">
                <label class="custom-control-label" for="<?= $id; ?>"></label>
            </div>
        	<div class="text-white d-flex align-items-center">
            	<small class="mr-2 cursor-pointer" data-toggle="modal" data-target="#edit-programme-<?= $id; ?>">
            		<i class="icofont-edit"></i>
            	</small>
            	<small class="cursor-pointer delete-programme" data-url="<?= DOMAIN; ?>/programmes/deleteProgramme/<?= $id; ?>">
            		<i class="icofont-ui-delete"></i>
            	</small>
            </div>
		</div>
	</div>
</div>