<?php $id = empty($music->id) ? 0 : $music->id; ?>
<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card">
		<a href="javascript:;" data-toggle="modal" data-target="#change-music-image-<?= $id; ?>">
			<img class="card-img-top border-bottom" src="<?= PUBLIC_URL; ?>/images/music/<?= $music->picture; ?>" alt="music">
		</a>
		<div class="card-body">
			<div class="d-flex justify-content-between">
				<a href="javascript:;" class="" data-toggle="modal" data-target="#edit-music-<?= $id; ?>">
					<?= empty($music->title) ? "No Name" : Application\Core\Help::limitStringLength($music->title, 18); ?>
				</a>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
			<small class="text-white">
				<?= empty($music->date) ? "Nill" : date("F j, Y", strtotime($music->date)); ?>
			</small>
        	<div class="dropdown dropleft">
            	<i class="icofont-caret-down text-white" data-toggle="dropdown"></i>
            	<div class="dropdown-menu">
            		<a href="javascript:;" class="delete-music dropdown-item" data-url="<?= DOMAIN; ?>/music/deleteMusic/<?= $id; ?>">Delete</a>
            	</div>
            </div>
		</div>
	</div>
</div>