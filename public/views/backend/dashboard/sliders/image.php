<?php $id = empty($slider->id) ? 0 : $slider->id; ?>
<div class="modal fade" id="change-slider-image-<?= $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Change image</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="change-slider-image-form" data-action="<?= DOMAIN; ?>/dashboard/changeSliderImage/<?= $id; ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group input-group-lg">
                        <label class="text-muted">Image</label>
                        <input type="file" name="image" class="form-control image" placeholder="Enter video url">
                        <small class="error image-error text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg change-slider-image-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none change-slider-image-spinner mb-1">
                            Save
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded change-slider-image-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>