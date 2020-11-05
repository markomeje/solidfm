<div class="qt-slickslider-container">
	<div class="qt-slickslider qt-slickslider-single qt-text-shadow qt-black-bg" data-variablewidth="true" data-arrows="true" data-dots="true" data-infinite="true" data-centermode="true" data-pauseonhover="true" data-autoplay="true" data-arrowsmobile="true" data-centermodemobile="true" data-dotsmobile="false" data-variablewidthmobile="true">
		<?php if(empty($allSliders)): ?>
			<!-- SLIDESHOW ITEM -->
			<div class="qt-slick-opacity-fx qt-item">
				<!-- POST HERO ITEM ========================= -->
				<div class="qt-part-archive-item qt-part-item-post-hero">
					<div class="qt-item-header">
						<div class="qt-header-mid qt-vc">
							<div class="qt-vi">
								<h2 class="qt-title">
									<a href="#read" class="qt-text-shadow">
										Welcome to Solid Fm 100.9
									</a>
								</h2>
								<div class="qt-the-content qt-spacer-s small hide-on-med-and-down ">
									<p class="qt-spacer-s qt-text-shadow">
										Enjoy Music, Sports and News updates.
									</p>
								</div>
							</div>
						</div>
						<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/sliders/1.jpg">
							<img src="<?= PUBLIC_URL; ?>/images/sliders/default.jpg" alt="Featured image" width="1170" height="512">
						</div>
					</div>
				</div>
				<!-- POST HERO ITEM END ========================= -->
			</div>
		<?php else: ?>
			<?php foreach($allSliders as $slider): ?>
				<!-- SLIDESHOW ITEM -->
				<div class="qt-slick-opacity-fx qt-item">
					<!-- POST HERO ITEM ========================= -->
					<div class="qt-part-archive-item qt-part-item-post-hero">
						<div class="qt-item-header">
							<div class="qt-header-mid qt-vc">
								<div class="qt-vi">
									<h2 class="qt-title">
										<a href="#read" class="qt-text-shadow">
											 <?= empty($slider->title) ? "Solid 100.9 FM" : $slider->title; ?>
										</a>
									</h2>
									<div class="qt-the-content qt-spacer-s small hide-on-med-and-down ">
										<p class="qt-spacer-s qt-text-shadow">
											<?= empty($slider->description) ? "Music | Sports | Entertainment" : $slider->description; ?>
										</p>
									</div>
								</div>
							</div>
							<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/sliders/<?= $slider->image; ?>">
								<img src="<?= PUBLIC_URL; ?>/images/sliders/<?= $slider->image; ?>" alt="Featured image" width="1170" height="512">
							</div>
						</div>
					</div>
					<!-- POST HERO ITEM END ========================= -->
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>