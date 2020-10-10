<div class="wrapper">
	<?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
	<div class="content">
		<div class="container pt-5">
			<div class="pt-5">
				<div class="row">
					<div class="col-12 col-md-6 mb-4">
						<?php require BACKEND_PATH . DS . "layouts" . DS . "links.php"; ?>
					</div>
					<div class="col-12 col-md-6 mb-4">
				        <form action="<?= DOMAIN; ?>" method="GET" class="search-dashboard">
				            <div class="row no-gutters">
				                <div class="col-10 col-md-9 col-lg-10">
				                    <div class="form-group input-group-lg mb-0">
				                        <input type="search" name="query" class="form-control backend-search-input border border-right-0" placeholder="Search youtube video" autocomplete="on" value="<?= empty($searchQuery) ? '' : $searchQuery; ?>">
				                    </div>
				                </div>
				                <div class="col-2 col-md-3 col-lg-2">
				                    <button type="submit" class="btn btn-lg btn-block btn-dark text-white mb-0 backend-search-button border-dark">
				                        <i class="icofont-ui-search"></i>
				                    </button>
				                </div>
				            </div>
				        </form>
				    </div>
				</div>
			</div>
			<div class="buttons mb-4">
				<div class="d-flex justify-content-between">
					<div class="bg-dark text-white px-3 rounded cursor-pointer d-flex align-items-center" data-toggle="modal" data-target="#add-youtube-video">
						<small class="font-sm">
							<i class="icofont-plus"></i>
						</small>
						<div class="pl-2">Add youtube video</div>
					</div>
					<div class="d-flex">
						<a href="javascript:;" class="btn bg-dark ml-3 text-white">
							<small class="text-danger">
								<i class="icofont-ui-delete"></i>
							</small>
						</a>
					</div>
				</div>
				<?php require BACKEND_PATH . DS . "youtube" . DS . "partials" . DS . "add.php"; ?>
			</div>
			<?php if(empty($allYoutubeVideos)): ?>
				<div class="alert alert-info d-block">No youtube videos.</div>
			<?php else: ?>
				<div class="row">
					<?php foreach($allYoutubeVideos as $youtube): ?>
						<?php require BACKEND_PATH . DS . "youtube" . DS . "partials" . DS . "listings.php"; ?>
					<?php endforeach; ?>
				</div>
				<?php foreach($allYoutubeVideos as $youtube): ?>
					<?php require BACKEND_PATH . DS . "youtube" . DS . "partials" . DS . "edit.php"; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>