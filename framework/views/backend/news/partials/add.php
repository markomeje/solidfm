<!-- Modal -->
<div class="modal fade" id="add-news" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Add news</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="add-news-form" data-action="<?= DOMAIN; ?>/archive/addNews" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Title</label>
                            <input type="text" name="title" class="form-control title" placeholder="e.g., Nigeria is blessed">
                            <small class="error title-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Category (<a href="<?= DOMAIN; ?>/categories">Add more</a>)</label>
                            <select class="custom-select form-control category" name="category">
                                <option value="">Select category</option>
                                <?php if(empty($categoriesList)): ?>
                                    <option value="">No categories yet</option>
                                <?php else: ?>
                                    <?php foreach($categoriesList as $category): ?>
                                        <option value="<?= empty($category->id) ? 0 : $category->id; ?>">
                                            <?= empty($category->name) ? "No Category" : ucfirst($category->name); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error category-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Author</label>
                            <input type="text" name="author" class="form-control author" placeholder="e.g., Solid100.9 FM">
                            <small class="error author-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input image form-control" id="news-image">
                                <label class="custom-file-label h-100" for="news-image">Choose file</label>
                            </div>
                            <small class="error image-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted">Content</label>
                        <textarea class="form-control content" name="content" id="add-news-content"></textarea>
                        <small class="error content-error text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg add-news-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none add-news-spinner mb-1">
                            Add
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded add-news-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>