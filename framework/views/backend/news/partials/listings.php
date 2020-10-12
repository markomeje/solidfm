<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card position-relative">
		<?php $id = empty($news->id) ? 0 : $news->id; ?>
		<div class="dropdown position-absolute cursor-pointer rounded shadow" style="right: 12px; top: 8px;">
    		<div class=""  data-toggle="dropdown" data-boundary="window">
    			<i class="icofont-caret-down bg-white text-muted"></i>
    			<div class="dropdown-menu dropdown-menu-right stop-propergation p-4" style="width: 288px !important;">
				    <form action="javascript:;" class="change-news-image-form" method="post" enctype="multipart/formdata" data-action="<?= DOMAIN; ?>/archive/changeNewsImage/<?= $id; ?>">
				    	<div class="form-group input-group-sm m-0">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input news-image form-control" id="news-image-<?= $id; ?>">
                                <label class="custom-file-label h-100" for="news-image-<?= $id; ?>">Change image</label>
                            </div>
                            <small class="error news-image-error text-danger"></small>-+ jj
                        </div>
                        <button type="submit" class="btn mt-4 bg-dark text-white btn-sm change-news-image-button px-4 btn-block">
				            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none change-news-image-spinner mb-1">
				            Save
				        </button>
				    </form>
				</div>
    		</div>
    	</div>
		<img src="<?= PUBLIC_URL; ?>/images/news/<?= empty($news->image) ? 'default.jpg' : $news->image; ?>" class="card-img-top img-fluid w-100 cursor-pointer">
		<div class="card-body">
			<div class="font-weight-bold">
				<a href="javascript:;" data-toggle="modal" data-target="#edit-news-<?= $id; ?>">
					<?= empty($news->title) ? "No Title" : Application\Core\Help::limitStringLength($news->title, 18); ?>
				</a>
			</div>
			<div class="text-muted">
				<em>By</em> <?= empty($news->author) ? "No Author" : Application\Core\Help::limitStringLength($news->author, 18); ?>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
            <small class="text-white">
				<?= empty($news->date) ? "No Date" : Application\Core\Help::formatDate($news->date); ?>
			</small>
            <div class="d-flex align-items-center">
            	<div class="dropdown cursor-pointer">
					<div data-toggle="dropdown">
						<i class="icofont-caret-down text-white"></i>
						<div class="dropdown-menu dropdown-menu-right text-muted">
							<small class="dropdown-item delete-news" data-url="<?= DOMAIN; ?>/archive/deleteNews/<?= $id; ?>">Delete</small>
						</div>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>