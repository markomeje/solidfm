<?php $panels = [
	"news" => ["link" => "archive", "count" => $allNewsCount], 
	"programmes" => ["link" => "programmes", "count" => $allProgrammesCount], 
	"adverts" => ["link" => "adverts", "count" => $allAdvertsCount], 
	"youtube" => ["link" => "youtube", "count" => $allYoutubeVideosCount, "title" => "videos"], 
	"music" => ["link" => "music", "count" => $allMusicCount],
	"team" => ["link" => "members", "count" => $allMembersCount],
]; ?>
<?php if(empty($panels)): ?>
	<div class="alert alert-danger">A fatal error occured</div>
<?php else: ?>
	<div class="row">
		<?php foreach($panels as $key => $value): ?>
			<div class="col-12 col-md-6 col-lg-3 mb-4">
				<div class="card border-0 rounded bg-white shadow">
					<div class="card-body d-flex align-items-center">
						<div class="rounded bg-dark text-center mr-3 panel-icons">
							<i class="icofont-retro-music-disk text-white"></i>
						</div>
						<?php $key = empty($key) ? "None" : ucfirst($key); ?>
						<div class="">
							<a href="<?= !array_key_exists("link", $value) ? "javascript:;" : DOMAIN."/".$value["link"]; ?>" class="d-block">
								<?= ucfirst($key); ?>
							</a>
							<small class="text-muted">
								<?= empty($value["count"]) ? 0 : $value["count"]; ?> <?= empty($value["title"]) ? "Added" : $value["title"]; ?>
							</small>
						</div>
					</div>
					<div class="card-footer bg-dark">
						<small class="text-white"></small>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>