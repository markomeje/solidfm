<?php $id = empty($member->id) ? 0 : $member->id; ?>
<div class="modal fade" id="change-member-photo-<?= $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Change photo</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="change-member-photo-form" data-action="<?= DOMAIN; ?>/members/changeMemberPhoto/<?= $id; ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group input-group-lg">
                        <input type="file" name="photo" class="form-control photo">
                        <small class="error photo-error text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg change-member-photo-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none change-member-photo-spinner mb-1">
                            Save
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded change-member-photo-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>