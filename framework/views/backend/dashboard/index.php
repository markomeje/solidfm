<div class="wrapper">
    <div class="">
	    <?php require BACKEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
	</div>
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
				                <div class="col-10">
				                    <div class="form-group input-group-lg mb-0">
				                        <input type="search" name="query" class="form-control backend-search-input border" placeholder="Search here" autocomplete="on" value="<?= empty($query) ? '' : $query; ?>">
				                    </div>
				                </div>
				                <div class="col-2">
				                    <button type="submit" class="btn btn-lg btn-dark btn-block text-white mb-0 backend-search-button border">
				                        <i class="icofont-ui-search"></i>
				                    </button>
				                </div>
				            </div>
				        </form>
				    </div>
				</div>
			</div>
			<div class="panels">
				<?php require BACKEND_PATH . DS . "dashboard" . DS . "partials" . DS . "panels.php"; ?>
			</div>
		</div>
	</div>
</div>