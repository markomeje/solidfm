<?php $id = empty($slider->id) ? 0 : $slider->id; ?>
<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card">
		<a href="javascript:;" data-toggle="modal" data-target="#change-slider-image-<?= $id; ?>">
			<img class="card-img-top border-bottom" src="<?= PUBLIC_URL; ?>/images/sliders/<?= $slider->image; ?>" alt="Slider">
		</a>
		<div class="card-body">
			<div class="d-flex justify-content-between">
				<a href="javascript:;" class="" data-toggle="modal" data-target="#edit-slider-<?= $id; ?>">
					<?= empty($slider->title) ? "No Name" : Application\Core\Help::limitStringLength($slider->title, 18); ?>
				</a>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input slider-switch" id="slider-<?= $id; ?>" data-url="<?= DOMAIN; ?>/dashboard/deleteSlider/<?= $id; ?>" <?= (isset($slider->status) && strtolower($slider->status) === "active") ? 'checked=""' : ''; ?>>
                <label class="custom-control-label" for="slider-<?= $id; ?>"></label>
            </div>
        	<div class="dropdown dropleft">
            	<i class="icofont-caret-down text-white" data-toggle="dropdown"></i>
            	<div class="dropdown-menu">
            		<a href="javascript:;" class="delete-slider dropdown-item" data-url="<?= DOMAIN; ?>/dashboard/deleteSlider/<?= $id; ?>">Delete</a>
            	</div>
            </div>
		</div>
	</div>
</div>