<?php if(empty($allNews)): ?>
	<div class="row">
	   <div class="col s12">
	   	   <div class="qt-black-bg" style="color: #fff; display: block; padding: 10px 15px;">No Related New</div>
	   </div>
	</div>
<?php else: ?>
	<div class="row">
		<?php foreach($allNews as $news): ?>
			<?php if($news->id !== $newsId): ?>
				<div class="col s12 m6">
					<div class="qt-part-archive-item qt-featured">
						<div class="qt-item-header">
							<div class="qt-header-top">
								<ul class="qt-tags">
									<li><a href="javascript:;">Local News</a></li>
								</ul>
							</div>
							<div class="qt-header-mid qt-vc">
							</div>
							<div class="qt-header-bottom">
								<div class="qt-item-metas">
									<a class="qt-author-thumb" href="javascript:;">
										<img src="<?= PUBLIC_URL; ?>/imagestemplate/author-thumbnail.jpg" alt="" width="30" height="30">
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
								<a href="<?= DOMAIN; ?>/news/read/<?= empty($news->id) ? 'nonews' : $news->id; ?>" class="qt-btn qt-btn-primary qt-readmore">
									<i class="dripicons-align-justify"></i>
								</a>
							</div>
							<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/news/<?= empty($news->image) ? 'default.jpg' : $news->image; ?>">
								<img src="<?= PUBLIC_URL; ?>/images/news/<?= empty($news->image) ? 'default.jpg' : $news->image; ?>" alt="Solid100.9 FM" width="690" height="302">
							</div>
						</div><br>
						<div class="">
							<a href="<?= DOMAIN; ?>/news/read/<?= empty($news->id) ? 'nonews' : $news->id; ?>" class="" style="color: #444;">
								<?= empty($news->title) ? "No News Title. Solid100.9 FM" : $news->title; ?>
							</a>
						</div><br>
						<div class="" style="color: #666;">
						    <?= empty($news->content) ? "No News Content. Solid100.9 FM" : Application\Core\Help::limitStringLength(strip_tags($news->content), 50); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<?php require FRONTEND_PATH . DS . "news" . DS . "pagination" . DS . "index.php"; ?>
<?php endif; ?>
<hr class="qt-spacer-m">