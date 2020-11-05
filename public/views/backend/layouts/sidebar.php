<div class="float-left position-fixed p-3 backend-sidebar">
	<ul class="m-0 px-0">
		<?php if(empty($backendLinks)): ?>
			<li><a href="javascript:;">No Links</a></li>
		<?php else: ?>
			<?php foreach ($backendLinks as $link): ?>
				<?php $link = strtolower($link); ?>
				<li class="mb-3">
					<a href="<?= DOMAIN; ?>/<?= $link; ?>" class="d-block mb-3 p-3 <?= $link === $activeController ? 'bg-success' : 'bg-dark'; ?> text-white rounded">
						<?= $link === "archive" ? "News" : ucfirst($link); ?>
					</a>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>