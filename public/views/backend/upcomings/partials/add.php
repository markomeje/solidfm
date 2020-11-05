<!-- Modal -->
<div class="modal fade" id="add-upcoming" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Add upcoming</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="add-upcoming-form" data-action="<?= DOMAIN; ?>/upcomings/addUpcoming" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Title</label>
                            <input type="text" name="title" class="form-control title" placeholder="e.g., Night of jazz">
                            <small class="error title-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Presenter</label>
                            <input type="text" name="presenter" class="form-control presenter" placeholder="e.g., Mc. john">
                            <small class="error presenter-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Time</label>
                            <input type="time" name="time" class="form-control time" placeholder="e.g., Night of jazz">
                            <small class="error time-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input image form-control" id="upcoming-image">
                                <label class="custom-file-label h-100" for="upcoming-image">Choose file</label>
                            </div>
                            <small class="error image-error text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg add-upcoming-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none add-upcoming-spinner mb-1">
                            Add
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded add-upcoming-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>