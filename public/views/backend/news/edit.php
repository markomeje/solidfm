<div class="wrapper">
	<?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
	<div class="w-100">
		<?php require BACKEND_PATH . DS . "layouts" . DS . "sidebar.php"; ?>
		<div class="float-right px-3 position-relative backend-area">
			<div class="row">
				<div class="col-12 mb-4">
					<?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
				</div>
			</div>
			<div class="mb-4">
	            <div class="alert alert-info">Edit news</div>
	            <form method="POST" action="javascript:;" class="edit-news-form" data-action="<?= DOMAIN; ?>/archive/editNews/<?= $id; ?>">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Title</label>
                            <input type="text" name="title" class="form-control title" placeholder="e.g., Nigeria is blessed" value="<?= empty($news->title) ? 0 : $news->title; ?>">
                            <small class="error title-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Category</label>
                            <select class="custom-select form-control category" name="category">
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
                            <small class="error category-error text-danger"></small>
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
                        <textarea class="form-control" name="content" id="edit-news-content"><?= empty($news->content) ? "No Content" : $news->content; ?></textarea>
                    </div>
                    <div class="d-flex justify-content-left mb-3">
                        <button type="submit" class="btn bg-dark text-white btn-lg edit-news-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none edit-news-spinner mb-1">
                            Save
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
	                <div class="alert mt-2 mb-4 rounded edit-news-message d-none"></div>
	            </form>
	        </div>
		</div>
	</div>
</div>