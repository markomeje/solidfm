<!-- Modal -->
<?php $id = empty($advert->id) ? 0 : $advert->id; ?>
<div class="modal fade" id="edit-advert-<?= $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Edit advert</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="edit-advert-form" data-action="<?= DOMAIN; ?>/adverts/editAdvert/<?= $id; ?>">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <?php $start = empty($advert->start) ? "" : $advert->start; ?>
                            <label class="text-muted">Start (<?= Application\Core\Help::formatDate($start); ?>)</label>
                            <input type="date" name="start" value="<?= $start; ?>" class="form-control start">
                            <small class="error start-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <?php $expiry = empty($advert->expiry) ? "" : $advert->expiry; ?>
                            <label class="text-muted">Expiry (<?= Application\Core\Help::formatDate($expiry); ?>)</label>
                            <input type="date" name="expiry" value="<?= $expiry; ?>" class="form-control expiry">
                            <small class="error expiry-error text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg edit-advert-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none edit-advert-spinner mb-1">
                            Save
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded edit-advert-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>