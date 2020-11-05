<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card position-relative">
		<?php $id = empty($advert->id) ? 0 : $advert->id; ?>
		<div class="dropdown position-absolute cursor-pointer rounded" style="right: 12px; top: 8px;">
    		<div class=""  data-toggle="dropdown" data-boundary="window">
    			<i class="icofont-caret-down bg-white text-muted"></i>
    			<div class="dropdown-menu dropdown-menu-right stop-propergation p-4" style="width: 288px !important;">
				    <form action="javascript:;" class="change-advert-image-form" method="post" enctype="multipart/formdata" data-action="<?= DOMAIN; ?>/adverts/changeAdvertImage/<?= $id; ?>">
				    	<div class="form-group input-group-sm m-0">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input advert-image form-control" id="advert-image-<?= $id; ?>">
                                <label class="custom-file-label h-100" for="advert-image-<?= $id; ?>">Change image</label>
                            </div>
                            <small class="error advert-image-error text-danger"></small>
                        </div>
                        <button type="submit" class="btn mt-4 bg-dark text-white btn-sm change-advert-image-button px-4 btn-block">
				            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none change-advert-image-spinner mb-1">
				            Save
				        </button>
				    </form>
				</div>
    		</div>
    	</div>
		<img src="<?= PUBLIC_URL; ?>/images/adverts/<?= empty($advert->image) ? 'default.jpg' : $advert->image; ?>" class="card-img-top img-fluid w-100 cursor-pointer">
		<div class="card-body">
			<div class="font-weight-bold border-bottom mb-2 pb-2">
				<small class="text-muted">Starts <?= empty($advert->start) ? "Nill" : Application\Core\Help::formatDate($advert->start); ?></small>
			</div>
			<small class="text-muted">
				Expires <?= empty($advert->expiry) ? "Nill" : Application\Core\Help::formatDate($advert->expiry); ?>
			</small>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">    <?php $status = empty($advert->status) ? "" : $advert->status; ?>
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="<?= $id; ?>; ?>" <?= $status === 'active' ? 'checked=""' : ''; ?>>
                <label class="custom-control-label" for="<?= $id; ?>; ?>"></label>
            </div>
        	<div class="text-white cursor-pointer d-flex">
			    <small class="delete-advert mr-2" data-url="<?= DOMAIN; ?>/adverts/deleteAdvert/<?= $id; ?>"><i class="icofont-ui-delete"></i></small>
			    <small class="edit-advert" data-toggle="modal" data-target="#edit-advert-<?= $id; ?>"><i class="icofont-edit"></i></small>
            </div>
		</div>
	</div>
</div>