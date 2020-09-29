<div class="qt-vertical-padding-m qt-content-primary-light qt-negative">
	<div class="qt-container">
		<h5 class="qt-caption-small"><span>Upcoming shows</span></h5>
		<hr class="qt-spacer-s">
		<?php if(empty($allUpcomings)): ?>
			<div class="">No Upcoming Shows</div>
		<?php else: ?>
			<div class="qt-slickslider-container qt-slickslider-externalarrows">
				<div class="row">
					<div class="qt-slickslider qt-slickslider-multiple qt-slickslider-podcast" data-slidestoshow="3" data-variablewidth="false" data-arrows="true" data-dots="false" data-infinite="true" data-centermode="false" data-pauseonhover="true" data-autoplay="false" data-arrowsmobile="false" data-centermodemobile="true" data-dotsmobile="false" data-slidestoshowmobile="1" data-variablewidthmobile="true" data-infinitemobile="false">
						<?php foreach($allUpcomings as $upcomings): ?>
							<!-- SLIDESHOW ITEM -->
							<div class="qt-item">
								<!-- SHOW UPCOMING ITEM ========================= -->
								<div class="qt-part-archive-item qt-part-archive-item-show qt-negative">
									<div class="qt-item-header">
										<div class="qt-header-top">
											<ul class="qt-tags">
												<li><a href="#">Half Hour Show</a></li>
											</ul>
										</div>
										<div class="qt-header-mid qt-vc">
											<div class="qt-vi">
												<h5 class="qt-time">02:00pm</h5>
												<h3 class="qt-ellipsis qt-t qt-title">
													<a href="#read" class="qt-text-shadow">Half Hour Show</a>
												</h3>
												<p class="qt-small qt-ellipsis">By Justice Amah</p>
											</div>
										</div>
										<div class="qt-header-bottom">
											<a href="#read" class="qt-btn qt-btn-primary qt-readmore"><i class="dripicons-headset"></i></a>
										</div>
										<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/upcoming_2.jpg">
											<img src="<?= PUBLIC_URL; ?>/images/upcoming_2.jpg" alt="Featured image" width="690" height="302">
										</div>
									</div>
								</div>
								<!-- SHOW UPCOMING ITEM END ========================= -->
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<!-- SLIDESHOW UPCOMING SHOWS END ================================================== -->
	</div>
</div>