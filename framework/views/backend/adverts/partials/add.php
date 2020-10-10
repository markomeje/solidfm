<!-- Modal -->
<div class="modal fade" id="add-advert" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Add advert</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="add-advert-form" data-action="<?= DOMAIN; ?>/adverts/addAdvert" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input image form-control" id="advert-image">
                                <label class="custom-file-label h-100" for="advert-image">Choose file</label>
                            </div>
                            <small class="error image-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Status</label>
                            <select type="status" name="status" class="form-control custom-select status" >
                                <option value="">Select status</option>
                                <?php if(empty($advertsStatus)): ?>
                                    <option value="">No status</option>
                                <?php else: ?>
                                    <?php foreach($advertsStatus as $status): ?>
                                        <option value="<?= $status; ?>">
                                            <?= ucfirst($status); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error status-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Start</label>
                            <input type="date" name="start" class="form-control start">
                            <small class="error start-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Expiry</label>
                            <input type="date" name="expiry" class="form-control expiry">
                            <small class="error expiry-error text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg add-advert-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none add-advert-spinner mb-1">
                            Add
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded add-advert-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>