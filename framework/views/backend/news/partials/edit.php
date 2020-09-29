<!-- Modal -->
<div class="modal fade" id="edit-news-<?= empty($news->id) ? 0 : $news->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Edit news</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="edit-news-form" data-action="<?= DOMAIN; ?>/news/editNews/<?= empty($news->id) ? 0 : $news->id; ?>">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Title</label>
                            <input type="text" name="title" class="form-control title" placeholder="e.g., Nigeria is blessed" value="<?= empty($news->title) ? 0 : $news->title; ?>">
                            <small class="error title-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Category</label>
                            <select class="custom-select form-control category">
                                <option value="">Select category</option>
                                <?php if(empty($categoriesList)): ?>
                                    <option value="">No categories yet</option>
                                <?php else: ?>
                                    <?php foreach($categoriesList as $category): ?>
                                        <option value="<?= $category->id; ?>" <?= ($news->category === $category->id) ? 'selected' : ''; ?>>
                                            <?= ucfirst($category->name); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error presenter-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-12">
                            <label class="text-muted">Author</label>
                            <input type="text" name="author" class="form-control author" placeholder="e.g., Solid100.9 FM" value="<?= empty($news->author) ? "No Author" : $news->author; ?>">
                            <small class="error author-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Content</label>
                        <textarea class="form-control" id="edit-news-content-<?= empty($news->id) ? 0 : $news->id; ?>"><?= empty($news->content) ? "No Content" : $news->content; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg edit-news-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none edit-news-spinner mb-1">
                            Save
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded edit-news-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>