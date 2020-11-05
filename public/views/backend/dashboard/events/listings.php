<?php $id = empty($event->id) ? 0 : $event->id; ?>
<div class="col-12 col-md-6 col-lg-4 mb-4">
	<div class="card">
		<div class="card-body">
			<div class="d-flex justify-content-between align-items-center pb-2 mb-2 border-bottom">
				<a href="javascript:;" class="" data-toggle="modal" data-target="#edit-event-<?= $id; ?>">
					<?= empty($event->title) ? "No Name" : Application\Core\Help::limitStringLength($event->title, 18); ?>
				</a>
				<div class="text-muted">
					<?= empty($event->time) ? "Nill" : strtoupper(date("g:i a", strtotime($event->time))); ?>
				</div>
			</div>
			<div class="d-flex">
				<div>
					<?= empty($event->location) ? "Nill" : Application\Core\Help::limitStringLength(ucfirst($event->location), 18); ?>
				</div>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
			<small class="text-white">
				<?= empty($event->date) ? "Nill" : date("F j, Y", strtotime($event->date)); ?>
			</small>
        	<div class="dropdown dropleft">
            	<i class="icofont-caret-down cursor-pointer text-white" data-toggle="dropdown"></i>
            	<div class="dropdown-menu">
            		<a href="javascript:;" class="delete-event dropdown-item" data-url="<?= DOMAIN; ?>/dashboard/deleteEvent/<?= $id; ?>">Delete</a>
            	</div>
            </div>
		</div>
	</div>
</div>