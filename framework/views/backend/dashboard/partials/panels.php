<?php $panels = ["news" => [], "events" => [], "adverts" => [], "upcomings" => [], "schedules" => []]; ?>
<?php if(empty($panels)): ?>
	<div class="alert alert-info">A fatal error occured</div>
<?php else: ?>
	<div class="row">
		<?php foreach($panels as $panel => $value): ?>
			<div class="col-12 col-md-6 col-lg-3 mb-4">
				<div class="card border-0 rounded bg-white shadow">
					<div class="card-body d-flex align-items-center">
						<div class="rounded bg-dark text-center mr-3 panel-icons">
							<i class="icofont-retro-music-disk text-white"></i>
						</div>
						<div class="m-0">
							<div class="">
								<?php $panel = empty($panel) ? "" : $panel; ?>
								<a href="<?= DOMAIN; ?>/<?= $panel; ?>">
									<?= ucfirst($panel); ?>
								</a>
							</div>
							<small class="text-muted">
								<?= empty($applicantsCount) ? 0 : $applicantsCount; ?> Applied
							</small>
						</div>
					</div>
					<div class="card-footer bg-dark">
						<small class="text-white">
							<?= empty($femaleApplicantsPercentage) ? 0 : $femaleApplicantsPercentage; ?>% female applied
						</small>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>