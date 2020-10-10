<!-- Modal -->
<div class="modal fade" id="edit-youtube-video-<?= empty($youtube->id) ? 0 : $youtube->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Edit youtube video</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="edit-youtube-video-form" data-action="<?= DOMAIN; ?>/youtube/editYoutubeVideo/<?= empty($youtube->id) ? 0 : $youtube->id; ?>">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Link</label>
                            <input type="text" name="link" class="form-control link" placeholder="e.g., https://www.youtube.com" value="<?= empty($youtube->link) ? "No Link" : $youtube->link; ?>">
                            <small class="error link-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Status</label>
                            <select class="custom-select form-control status" name="status">
                                <option value="">Select status</option>
                                <?php if(empty($youtubeVideoStatus)): ?>
                                    <option value="">No status yet</option>
                                <?php else: ?>
                                    <?php foreach($youtubeVideoStatus as $status): ?>
                                        <option value="<?= $status; ?>" <?= ($youtube->status === $status) ? 'selected' : ''; ?>>
                                            <?= ucfirst($status); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error status-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Description</label>
                        <textarea class="form-control description" rows="2" name="description" placeholder="e.g., Enter video description here"><?= empty($youtube->description) ? "No Description" : $youtube->description; ?></textarea>
                        <small class="error description-error text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg edit-youtube-video-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none edit-youtube-video-spinner mb-1">
                            Save
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded edit-youtube-video-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>