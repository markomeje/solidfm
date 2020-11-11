<!-- Modal -->
<div class="modal fade" id="add-member" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Add member</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="add-member-form" data-action="<?= DOMAIN; ?>/members/addMember" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Fullname</label>
                            <input type="text" name="fullname" class="form-control fullname" placeholder="Enter fullname">
                            <small class="error fullname-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Photo</label>
                            <input type="file" name="photo" class="form-control photo">
                            <small class="error photo-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Facebook</label>
                            <input type="text" name="facebook" class="form-control facebook" placeholder="Enter facebook profile url">
                            <small class="error facebook-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Instagram</label>
                            <input type="text" name="instagram" class="form-control instagram" placeholder="Enter instagram profile url">
                            <small class="error instagram-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Twitter</label>
                            <input type="text" name="twitter" class="form-control twitter" placeholder="Enter twitter profile url">
                            <small class="error twitter-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Status</label>
                            <select class="custom-select form-control status" name="status">
                                <option value="">Select status</option>
                                <?php if(empty($memberStatus)): ?>
                                    <option value="">No status yet</option>
                                <?php else: ?>
                                    <?php foreach($memberStatus as $status): ?>
                                        <option value="<?= $status; ?>">
                                            <?= ucfirst($status); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error status-error text-danger"></small>
                        </div>
                    </div>
                    <div class="">
                        <label class="text-muted">Biography</label>
                        <textarea class="form-control biography" name="biography" placeholder="Enter content here" id="add-member-biography"></textarea>
                        <small class="error biography-error text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg add-member-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none add-member-spinner mb-1">
                            Add
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded add-member-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>