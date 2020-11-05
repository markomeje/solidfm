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
			<div class="panels">
				<?php require BACKEND_PATH . DS . "dashboard" . DS . "partials" . DS . "panels.php"; ?>
			</div>
			<div class="mb-4">
				<div class="alert alert-info d-flex justify-content-between mb-4">
					<div class="">Banner sliders</div>
                    <div class="pl-2">
                    	<a href="javascript:;" data-toggle="modal" data-target="#add-slider">Add slider</a>
                    </div>
				</div>
				<?php require BACKEND_PATH . DS . "dashboard" . DS . "sliders" . DS . "add.php"; ?>
				<?php if(empty($allSliders)): ?>
					<div class="text-muted">No slider</div>
				<?php else: ?>
					<div class="row">
						<?php foreach($allSliders as $slider): ?>
							<?php require BACKEND_PATH . DS . "dashboard" . DS . "sliders" . DS . "listings.php"; ?>
						<?php endforeach; ?>
					</div>
					<?php foreach($allSliders as $slider): ?>
						<?php require BACKEND_PATH . DS . "dashboard" . DS . "sliders" . DS . "edit.php"; ?>
					<?php endforeach; ?>
					<?php foreach($allSliders as $slider): ?>
						<?php require BACKEND_PATH . DS . "dashboard" . DS . "sliders" . DS . "image.php"; ?>
					<?php endforeach; ?>
			    <?php endif; ?>
			</div>
			<div class="">
				<div class="alert alert-info d-flex justify-content-between mb-4">
					<div class="">Events Manager</div>
                    <div class="pl-2">
                    	<a href="javascript:;" data-toggle="modal" data-target="#add-event">Add event</a>
                    </div>
				</div>
				<?php require BACKEND_PATH . DS . "dashboard" . DS . "events" . DS . "add.php"; ?>
				<?php if(empty($allEvents)): ?>
					<div class="text-muted">No event</div>
				<?php else: ?>
					<div class="row">
						<?php foreach($allEvents as $event): ?>
							<?php require BACKEND_PATH . DS . "dashboard" . DS . "events" . DS . "listings.php"; ?>
						<?php endforeach; ?>
					</div>
					<?php foreach($allEvents as $event): ?>
						<?php require BACKEND_PATH . DS . "dashboard" . DS . "events" . DS . "edit.php"; ?>
					<?php endforeach; ?>
			    <?php endif; ?>
			</div>
			<div class="">
				<div class="alert alert-info d-flex justify-content-between mb-4">
					<div class="">Video Story</div>
                    <div class="pl-2">
                    	<a href="javascript:;" data-toggle="modal" data-target="#add-video-story">Add video</a>
                    </div>
				</div>
				<?php require BACKEND_PATH . DS . "dashboard" . DS . "stories" . DS . "add.php"; ?>
				<?php if(empty($allVideoStories)): ?>
					<div class="text-muted mb-4">No video story</div>
				<?php else: ?>
					<div class="row">
						<?php foreach($allVideoStories as $video): ?>
							<?php require BACKEND_PATH . DS . "dashboard" . DS . "stories" . DS . "listings.php"; ?>
						<?php endforeach; ?>
					</div>
			    <?php endif; ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>