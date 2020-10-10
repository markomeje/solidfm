<div class="col-12 col-md-6 col-lg-4 mb-4">
	<div class="card">
		<?php $id = empty($programme->id) ? 0 : $programme->id; ?>
		<div class="card-body">
			<div class="font-weight-bold d-flex justify-content-between border-bottom pb-2 align-items-center mb-2">
				<a href="javascript:;" class="" data-toggle="modal" data-target="#edit-programme-<?= $id; ?>">
					<?= empty($programme->title) ? "No Ttile" : Application\Core\Help::limitStringLength(ucfirst($programme->title), 19); ?>
				</a>
				<?php if(isset($allTitles) && count($allTitles) > 0): ?>
				    <?php $moreTitles = []; ?>
					<?php foreach ($allTitles as $title): ?>
						<?php $moreTitles[$title->programme][] = $title; ?>
					<?php endforeach; ?>
				<?php endif; ?>
				<div class="d-flex align-items-center">
					<div class="text-dark mr-2 cursor-pointer">
		            	<div class="dropdown">
		            		<div class=""  data-toggle="dropdown" data-boundary="window">
		            			<i class="icofont-caret-down"></i>
		            			<div class="dropdown-menu dropdown-menu-right add-title-dropdown">
		            				<?php $moreProgrammeTitles = $moreTitles[$id]; ?>
				            		<?php if(empty($moreProgrammeTitles)): ?>
									    <a class="dropdown-item" href="javascript:;">No additional titles added.</a>
								    <?php else: ?>
								    	<?php $count = 0; ?>
								    	<?php foreach($moreProgrammeTitles as $key => $value): ?>
								    		<?php $count++; ?>
								    		<?php if($count > 1): ?>
									    		<div class="dropdown-divider"></div>
									    	<?php endif; ?>

									    	<?php $start = empty($value->startingtime) ? "00:00" : date("G:ia", strtotime($value->startingtime)); ?>
									    	<?php $end = empty($value->endingtime) ? "00:00" : date("G:ia", strtotime($value->endingtime)); ?>

									    	<a class="dropdown-item" href="javascript:;">
									    		<?= empty($value->title) ? "No Title" : $value->title; ?> (<?= $start."-".$end; ?>)
									    	</a>
									    <?php endforeach; ?>
								    <?php endif; ?>
								</div>
		            		</div>
		            	</div>
		            	<?php require BACKEND_PATH . DS . "programmes" . DS . "titles" . DS . "listings.php"; ?>
		            </div>
		            <div class="text-dark cursor-pointer">
		            	<div class="dropdown">
		            		<div class="" data-toggle="dropdown">
		            			<small><i class="icofont-plus"></i></small>
		            			<?php require BACKEND_PATH . DS . "programmes" . DS . "titles" . DS . "add.php"; ?>
		            		</div>
		            	</div>
		            </div>
				</div>
			</div>
			<div class="font-weight-bold d-flex justify-content-between align-items-center">
				<small class="text-muted">
					(<?= empty($programme->time) ? "00:00" : $programme->time; ?>) hours
				</small>
			</div>
		</div>
		<div class="card-footer bg-dark d-flex justify-content-between align-items-center">
			<div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="<?= empty($programme->id) ? 0 : $programme->id; ?>; ?>">
                <label class="custom-control-label" for="<?= empty($programme->id) ? 0 : $programme->id; ?>; ?>"></label>
            </div>
        	<div class="text-white cursor-pointer">
            	<i class="icofont-caret-down"></i>
            </div>
		</div>
	</div>
</div>