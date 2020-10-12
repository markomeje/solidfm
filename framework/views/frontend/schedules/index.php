<div class="qt-parentcontainer">
    <?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div id="maincontent" class="qt-main">
        <div class="qt-container qt-spacer-m">
            <h5 class="qt-caption-small"><span>Upcoming shows</span></h5>
            <hr class="qt-spacer-s">
            <?php if(empty($allUpcomingProgrammes)): ?>
                <div class="">No Upcoming Shows</div>
            <?php else: ?>
                <div class="qt-slickslider-container qt-slickslider-externalarrows">
                    <div class="row">
                        <div class="qt-slickslider qt-slickslider-multiple qt-slickslider-podcast" data-slidestoshow="3" data-variablewidth="false" data-arrows="true" data-dots="false" data-infinite="true" data-centermode="false" data-pauseonhover="true" data-autoplay="false" data-arrowsmobile="false" data-centermodemobile="true" data-dotsmobile="false" data-slidestoshowmobile="1" data-variablewidthmobile="true" data-infinitemobile="false">
                            <?php foreach($allUpcomingProgrammes as $upcoming): ?>
                            <!-- SLIDESHOW ITEM -->
                                <div class="qt-item">
                                    <!-- SHOW UPCOMING ITEM ========================= -->
                                    <div class="qt-part-archive-item qt-part-archive-item-show qt-negative">
                                        <div class="qt-item-header">
                                            <div class="qt-header-mid qt-vc">
                                                <div class="qt-vi">
                                                    <h5 class="qt-time">
                                                        <?= empty($upcoming->starts) ? "00:00" : Application\Core\Help::formatTime($upcoming->starts); ?>
                                                    </h5>
                                                    <h3 class="qt-ellipsis qt-t qt-title">
                                                        <a href="#read" class="qt-text-shadow">
                                                            <?= empty($upcoming->title) ? "No Title" : $upcoming->title; ?>
                                                        </a>
                                                    </h3>
                                                    <p class="qt-small qt-ellipsis">
                                                        By <?= empty($upcoming->presenter) ? "No Presenter" : $upcoming->presenter; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="qt-header-bottom">
                                                <a href="#read" class="qt-btn qt-btn-primary qt-readmore"><i class="dripicons-headset"></i></a>
                                            </div>
                                            <div class="qt-header-bg" data-bgimage="imagestemplate/medium-690-302.jpg">
                                                <img src="imagestemplate/medium-690-302.jpg" alt="Featured image" width="690" height="302">
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
        <!-- ======================= SCHEDULE  SECTION ======================= -->
        <div class="qt-container qt-spacer-l">
            <h5 class="qt-caption-small"><span>Programme Schedule</span></h5>
            <hr class="qt-spacer-s">
            <?php if(empty($allProgrammes)): ?>
                <div class="">No Programme Schedules</div>
            <?php else: ?>
                <!-- SCHEDULE ================================================== -->
                <div class="qt-show-schedule">
                    <hr class="qt-spacer-s">
                    <div id="dayfriday" class="qt-show-schedule-day">
                        <div class="qt-show-schedule-day row">
                            <?php foreach($allProgrammes as $programme): ?>
                                <div class="col s12 m4 l4">
                                    <div class="qt-part-archive-item qt-part-show-schedule-day-item">
                                        <div class="qt-item-header">
                                            <div class="qt-header-mid qt-vc">
                                                <div class="qt-vi">
                                                    <h4 class="qt-item-title qt-title">
                                                        <a href="javascript:;" class="qt-ellipsis  qt-t">
                                                            <?= empty($programme->title) ? "No Title" : $programme->title; ?>
                                                        </a>
                                                    </h4>
                                                    <p class="qt-item-det">
                                                        <span class="qt-time">
                                                            <?= empty($programme->starts) ? "00:00" : strtoupper(Application\Core\Help::formatTime($programme->starts)); ?>
                                                        </span>
                                                        <span class="qt-day qt-capfont">
                                                            <?= empty($programme->day) ? "No Day" : $programme->day; ?>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/banners/card.jpg">
                                                <img src="<?= PUBLIC_URL; ?>/images/banners/card.jpg" alt="Featured image" width="690" height="302">
                                            </div>
                                        </div>
                                        <div class="qt-overinfo qt-paper">
                                            <p class="qt-item-det qt-accent">
                                                <span class="qt-time">
                                                    <?= empty($programme->starts) ? "00:00" : strtoupper(Application\Core\Help::formatTime($programme->starts)); ?>
                                                </span>
                                                <span class="qt-day qt-capfont">
                                                    <?= empty($programme->day) ? "No Day" : $programme->day; ?>
                                                </span>
                                            </p>
                                            <div class="qt-more">
                                                <p class="qt-ellipsis-2">
                                                    <?= empty($programme->description) ? "No Description" : $programme->description; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- SCHEDULE SHOW END ========================= -->
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- TAB CONTENTS END ======================================== -->
                </div>
            <?php endif; ?>
        </div>
        <hr class="qt-spacer-l">
    </div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>
