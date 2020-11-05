<!-- Modal -->
<?php $id = empty($slider->id) ? 0 : $slider->id; ?>
<div class="modal fade" id="edit-slider-<?= $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Edit slider</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="edit-slider-form" data-action="<?= DOMAIN; ?>/dashboard/editSlider/<?= $id; ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-12">
                            <label class="text-muted">Title</label>
                            <input type="text" name="title" class="form-control title" value="<?= empty($slider->title) ? '' : $slider->title; ?>">
                            <small class="error title-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Description</label>
                        <textarea class="form-control description" name="description" rows="3"><?= empty($slider->description) ? '' : $slider->description; ?></textarea>
                        <small class="error description-error text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg edit-slider-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none edit-slider-spinner mb-1">
                            Save
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded edit-slider-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>