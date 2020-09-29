<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card">
		<img src="<?= PUBLIC_URL; ?>/images/news/<?= empty($news->image) ? 'default.jpg' : $news->image; ?>" class="card-img-top img-fluid w-100 cursor-pointer">
		<div class="card-body">
			<div class="font-weight-bold">
				<a href="javascript:;" class="" data-toggle="modal" data-target="#edit-news-<?= empty($news->id) ? 0 : $news->id; ?>">
					<?= empty($news->title) ? "No Title" : Application\Core\Help::limitStringLength($news->title, 18); ?>
				</a>
			</div>
			<div class="text-muted">
				<em>By</em> <?= empty($news->author) ? "No Author" : Application\Core\Help::limitStringLength($news->author, 18); ?>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="<?= empty($news->id) ? 0 : $news->id; ?>; ?>">
                <label class="custom-control-label" for="<?= empty($news->id) ? 0 : $news->id; ?>; ?>"></label>
            </div>
            <div class="d-flex align-items-center">
            	<div class="text-white cursor-pointer">
	            	<i class="icofont-caret-down"></i>
	            </div>
            </div>
		</div>
	</div>
</div>