<?php $id = empty($member->id) ? 0 : $member->id; ?>
<div class="col-12 col-md-6 col-lg-3 mb-4">
	<div class="card">
		<div class="card-header d-flex justify-content-between align-items-center">
			<a href="javascript:;" data-toggle="modal" data-target="#change-member-photo-<?= $id; ?>">
				Change Photo
			</a>
			<div class="dropdown dropleft">
	        	<i class="icofont-caret-down cursor-pointer text-dark" data-toggle="dropdown"></i>
	        	<div class="dropdown-menu" style="width: auto !important; height: auto !important;">
	        		<a href="javascript:;" class="dropdown-item p-3">
						<img class="h-100 w-100" src="<?= PUBLIC_URL; ?>/images/members/<?= $member->photo; ?>" alt="member">
					</a>
	        	</div>
	        </div>
		</div>
		<div class="card-body">
			<div class="d-flex justify-content-between">
				<a href="javascript:;" class="" data-toggle="modal" data-target="#edit-member-<?= $id; ?>">
					<?= empty($member->fullname) ? "No Name" : Application\Core\Help::limitStringLength(ucwords(strtolower($member->fullname)), 16); ?>
				</a>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input member-switch" id="member-<?= $id; ?>" data-url="<?= DOMAIN; ?>/members/deleteMember/<?= $id; ?>" <?= (isset($member->status) && strtolower($member->status) === "active") ? 'checked=""' : ''; ?>>
                <label class="custom-control-label" for="member-<?= $id; ?>"></label>
            </div>
        	<div class="dropdown dropleft">
            	<i class="icofont-caret-down text-white" data-toggle="dropdown"></i>
            	<div class="dropdown-menu">
            		<a href="javascript:;" class="delete-member dropdown-item" data-url="<?= DOMAIN; ?>/members/deleteMember/<?= $id; ?>">Delete</a>
            	</div>
            </div>
		</div>
	</div>
</div>