<div class="qt-parentcontainer">
	<?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
	<div id="maincontent" class="qt-main">
		<div class="qt-container qt-vertical-padding-l">
			<div class="row">
				<div class="col s12 m12 l1 qt-pushpin-container">
					<?php require FRONTEND_PATH . DS . "news" . DS . "partials" . DS . "icons.php"; ?>
				</div>
				<div class="col s12 m12 l8">
					<?php if(empty($singleNews)): ?>
						<div class="row">
						   <div class="col s12">
						   	   <div class="qt-black-bg" style="color: #fff; display: block; padding: 10px 15px; margin-bottom: 15px;">News Not Found</div>
						   </div>
						</div>
					<?php else: ?>
						<div class="row">
							<div class="col s12">
								<div class="qt-part-archive-item qt-featured">
									<div class="qt-item-header">
										<div class="qt-header-top">
											<ul class="qt-tags">
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
										</div>
										<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/news/<?= empty($singleNews->image) ? 'default.jpg' : $singleNews->image; ?>">
											<img src="<?= PUBLIC_URL; ?>/images/news/<?= empty($singleNews->image) ? 'default.jpg' : $singleNews->image; ?>" alt="Solid100.9 FM" width="690" height="302">
										</div>
									</div>
									<hr class="qt-spacer-s">
									<div class="" style="color: #333;">
										<?= empty($singleNews->title) ? "No News Title. Solid100.9 FM" : $singleNews->title; ?>
									</div>
									<div class="" style="color: #999;">
									    <?= empty($singleNews->content) ? "No News Content. Solid100.9 FM" : $singleNews->content; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<div class="">
						<h4 style="margin-bottom: 10px;">Related News</h4>
						<?php require FRONTEND_PATH . DS . "news" . DS . "partials" . DS . "related.php"; ?>
					</div>
				</div>
				<div class="qt-sidebar col s12 m12 l3">
					<?php require FRONTEND_PATH . DS . "news" . DS . "partials" . DS . "aside.php"; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>
