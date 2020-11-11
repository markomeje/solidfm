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
			<div class="buttons mb-4">
				<div class="d-flex justify-content-between">
					<div class="bg-dark text-white px-3 rounded cursor-pointer d-flex align-items-center" data-toggle="modal" data-target="#add-member">
						<small class="font-sm">
							<i class="icofont-plus"></i>
						</small>
						<div class="pl-2">Add member</div>
					</div>
					<div class="d-flex">
						<a href="javascript:;" class="btn bg-dark text-white">
							<i class="icofont-caret-down"></i>
						</a>
					</div>
				</div>
				<?php require BACKEND_PATH . DS . "members" . DS . "partials" . DS . "add.php"; ?>
			</div>
			<?php if(empty($allMembers)): ?>
				<div class="alert alert-info d-block">No members yet.</div>
			<?php else: ?>
				<div class="row">
					<?php foreach($allMembers as $member): ?>
						<?php require BACKEND_PATH . DS . "members" . DS . "partials" . DS . "listings.php"; ?>
					<?php endforeach; ?>
				</div>
				<?php foreach($allMembers as $member): ?>
					<?php require BACKEND_PATH . DS . "members" . DS . "partials" . DS . "edit.php"; ?>
				<?php endforeach; ?>
				<?php foreach($allMembers as $member): ?>
					<?php require BACKEND_PATH . DS . "members" . DS . "partials" . DS . "photo.php"; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>