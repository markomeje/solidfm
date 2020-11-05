<div class="qt-part-archive-item qt-featured">
	<div class="qt-item-header">
		<div class="qt-header-top">
			<ul class="qt-tags">
				<li>
					<a href="<?= DOMAIN; ?>/news/read/<?= $id; ?>/<?= $rawTitle; ?>">Read News</a>
				</li>
			</ul>
		</div>
		<div class="qt-header-mid qt-vc">
		</div>
		<div class="qt-header-bottom">
			<div class="qt-item-metas">
				<a class="qt-author-thumb" href="javascript:;">
					<img src="" alt="" width="30" height="30">
				</a>
				<div class="qt-texts">
					<p class="qt-author">
						<?= empty($news->author) ? "Solid100.9 FM" : $news->author; ?>
					</p>
					<p class="qt-date">
						<?= empty($news->date) ? Application\Core\Help::formatDate() : Application\Core\Help::formatDate($news->date); ?>
					</p>
				</div>
			</div>
			<a href="<?= DOMAIN; ?>/news/read/<?= $id; ?>/<?= $rawTitle; ?>" class="qt-btn qt-btn-primary qt-readmore">
				<i class="dripicons-align-justify"></i>
			</a>
		</div>
		<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/news/<?= empty($news->image) ? 'default.jpg' : $news->image; ?>">
			<img src="<?= PUBLIC_URL; ?>/images/news/<?= empty($news->image) ? 'default.jpg' : $news->image; ?>" alt="Solid100.9 FM" width="690" height="302">
		</div>
	</div>
	<hr class="qt-spacer-s">
	<a href="<?= DOMAIN; ?>/news/read/<?= $id; ?>/<?= $rawTitle; ?>" class="" style="color: #333;">
		<?= $news->title; ?>
	</a>
	<div class="" style="color: #999;">
	    <?= empty($news->content) ? "No News Content. Solid100.9 FM" : Application\Core\Help::limitStringLength(strip_tags($news->content), 50); ?>
	</div>
</div>