<?php if(isset($pagination)): ?>
    <?php $totalPages  = $pagination->totalPages();?>
    <?php if($totalPages > 1): ?>
		<div class="qt-pagination qt-content-primary">
			<ul class="pagination qt-container" style="padding: 0 !important; margin: 0 !important;">
			    <?php $currentPage = $pagination->currentPage; $link = DOMAIN."/news/index/"; ?>
		  		<?php if($pagination->hasPreviousPage()): ?>
		  			<li class="item active">
						<a href="<?= $link.($currentPage - 1); ?>">Previous</a>
					</li>
				<?php endif; ?>
				<?php $visiblePages = (($currentPage - 1) > 1) ? ($currentPage - 1) : 1; ?>
		        <?php $pageEnd = (($currentPage + 1) < $totalPages) ? ($currentPage + 1) : $totalPages; ?>
			    <?php for($page = $visiblePages; $page <= $pageEnd; $page++): ?>
			    	<?php  $active = ($page === $currentPage) ? true : false; ?>
			    	<li class="item <?= ($active === true) ? 'active' : 'qt-black-bg '; ?>">
						<a href="<?= ($active) ? "javascript:;" : $link.$page; ?>">
							<?= ($page); ?>
						</a>
					</li>
				<?php endfor; ?>
				<?php if($pagination->hasNextPage()): ?>
					<li class="item waves-effect qt-black-bg">
						<a href="<?= $link.($currentPage + 1); ?>">Next</a>
					</li>
				<?php endif; ?>
		  	</ul>
		</div>
	<?php endif; ?>
<?php endif; ?>
