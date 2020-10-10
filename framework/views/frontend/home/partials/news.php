<div class="qt-slickslider-container qt-slickslider-externalarrows">
	<div class="row">
		<div class="qt-slickslider qt-slickslider-multiple qt-text-shadow " data-slidestoshow="3" data-variablewidth="false" data-arrows="true" data-dots="false" data-infinite="true" data-centermode="false" data-pauseonhover="true" data-autoplay="false" data-arrowsmobile="false" data-centermodemobile="true" data-dotsmobile="false" data-slidestoshowmobile="1" data-variablewidthmobile="true" data-infinitemobile="false">
			<?php if(empty($allNews)): ?>
				<h3 class="qt-caption-med"><span>No News Yet</span></h3>
			<?php else: ?>
				<?php $sixLatestNews = array_slice($allNews, 0, 6); ?>
				<?php foreach($sixLatestNews as $news): ?>
					<div class="qt-item">
						<div class="qt-part-archive-item qt-vertical">
							<div class="qt-item-header">
								<div class="qt-header-top">
									<ul class="qt-tags">
										<li>
											<a href="<?= DOMAIN; ?>/news/read/<?= empty($news->id) ? 0 : $news->id; ?>">Read News</a>
										</li>
									</ul>
								</div>
								<div class="qt-header-mid qt-vc">
									<div class="qt-vi">
										<h3 class="qt-title">
											<a href="#" class="qt-text-shadow">
											    <?= empty($news->title) ? 0 : Application\Core\Help::limitStringLength($news->title); ?>
											</a>
										</h3>
									</div>
								</div>
								<div class="qt-header-bottom">
									<div class="qt-item-metas">
										<a class="qt-author-thumb" href="#">
											<img src="<?= PUBLIC_URL; ?>/imagestemplate/author-thumbnail.jpg" alt="" width="30" height="30">
										</a>
										<div class="qt-texts">
											<p class="qt-date">
												<?= empty($news->date) ? "1st January 1880" : Application\Core\Help::formatDate($news->date); ?>
											</p>
										</div>
									</div>
									<a href="<?= DOMAIN; ?>" class="qt-btn qt-btn-primary qt-readmore">
										<i class="dripicons-align-justify"></i>
									</a>
								</div>
								<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/news/<?= empty($news->image) ? 'default.jpg' : $news->image; ?>">
									<img src="<?= PUBLIC_URL; ?>/images/news/<?= empty($news->image) ? 'default.jpg' : $news->image; ?>" alt="Solid100.9 FM">
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>