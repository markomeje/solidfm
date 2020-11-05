<div class="qt-parentcontainer">
    <?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div id="maincontent" class="qt-main">
        <div class="qt-pageheader qt-negative">
            <div class="qt-container">
                <h1 class="qt-caption qt-spacer-s">
                    Solid100.9 FM 
                </h1>
                <h4 class="qt-subtitle">
                   Programmes
                </h4>
            </div>
            <div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/news/default.jpg">
                <img src="<?= PUBLIC_URL; ?>/images/news/default.jpg" alt="Solid100.9 FM" width="690" height="302">
            </div>
        </div>
        <div class="qt-container qt-spacer-m">
            <h5 class="qt-caption-small"><span>Upcoming shows</span></h5>
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
                                                        <?= empty($upcoming->title) ? "No Title" : $upcoming->title; ?>
                                                    </h3>
                                                    <p class="qt-small qt-ellipsis">
                                                        By <?= empty($upcoming->presenter) ? "No Presenter" : $upcoming->presenter; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="qt-header-bg" data-bgimage="">
                                                <img src="" alt="Featured image" width="690" height="380">
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
        </div>
        <!-- ======================= SCHEDULE  SECTION ======================= -->
        <hr class="qt-spacer-s">
        <div class="qt-container">
            <h5 class="qt-caption-small"><span>Programme Schedule</span></h5>
            <?php if(empty($allProgrammes)): ?>
                <div class="">No Programme Schedules</div>
            <?php else: ?>
                <?php $groupByDays = []; ?>
                <?php foreach($allProgrammes as $programme): ?>
                    <?php $groupByDays[$programme->day][] = $programme; ?>
                <?php endforeach; ?>
                <!-- SCHEDULE ================================================== -->
                <div class="qt-show-schedule">
                    <ul class="tabs">
                        <li class="tab"><a href="#monday">Monday</a></li>
                        <li class="tab"><a href="#tuesday">Tuesday</a></li>
                        <li class="tab"><a href="#wednesday">Wednesday</a></li>
                        <li class="tab"><a href="#thursday">Thursday</a></li>
                        <li class="tab"><a href="#friday">Friday</a></li>
                        <li class="tab"><a href="#saturday">Saturday</a></li>
                        <li class="tab"><a href="#sunday">Sunday</a></li>
                    </ul>
                    <?php foreach($groupByDays as $day => $programmes): ?>
                        <div id="<?= strtolower($day); ?>" class="qt-show-schedule-day">
                            <?php require FRONTEND_PATH . DS . "schedules" . DS . "partials" . DS . "listings.php"; ?>
                        </div>
                    <?php endforeach; ?>
                    <!-- TAB CONTENTS END ======================================== -->
                </div>
            <?php endif; ?>
        </div>
        <hr class="qt-spacer-l">
    </div>
</div>
<?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>
