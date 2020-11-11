<!-- Modal -->
<?php $id = empty($member->id) ? 0 : $member->id; ?>
<div class="modal fade" id="edit-member-<?= $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Edit member</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="edit-member-form" data-action="<?= DOMAIN; ?>/members/editMember/<?= $id; ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Fullname</label>
                            <input type="text" name="fullname" class="form-control fullname" placeholder="Enter fullname" value="<?= empty($member->fullname) ? 'Nill' : $member->fullname; ?>">
                            <small class="error fullname-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Twitter</label>
                            <input type="text" name="twitter" class="form-control twitter" placeholder="Enter twitter profile url" value="<?= empty($member->twitter) ? 'Nill' : $member->twitter; ?>">
                            <small class="error twitter-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Facebook</label>
                            <input type="text" name="facebook" class="form-control facebook" placeholder="Enter facebook profile url" value="<?= empty($member->facebook) ? 'Nill' : $member->facebook; ?>">
                            <small class="error facebook-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Instagram</label>
                            <input type="text" name="instagram" class="form-control instagram" placeholder="Enter instagram profile url" value="<?= empty($member->instagram) ? 'Nill' : $member->instagram; ?>">
                            <small class="error instagram-error text-danger"></small>
                        </div>
                    </div>
                    <div class="">
                        <label class="text-muted">Biography</label>
                        <textarea class="form-control biography" name="biography" placeholder="Enter content here" id="edit-member-biography-<?= $id; ?>"><?= empty($member->biography) ? 'Nill' : $member->biography; ?></textarea>
                        <small class="error biography-error text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg edit-member-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none edit-member-spinner mb-1">
                            Save
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded edit-member-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>