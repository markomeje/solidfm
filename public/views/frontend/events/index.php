<div class="qt-parentcontainer">
    <?php require FRONTEND_PATH . DS . "layouts" . DS . "navbar.php"; ?>
    <div id="maincontent" class="qt-main">
        <div class="qt-part-event-featured qt-card qt-negative qt-vertical-padding-l">
            <?php if(empty($nextEvent)): ?>
                <h5 class="qt-caption-med"><span>NO UPCOMING EVENT</span></h5>
            <?php else: ?>
                <div class="qt-event-featured-content">
                    <h5 class="qt-caption-med"><span>NEXT EVENT</span></h5>
                    <h1 class="qt-spacer-s">
                        <?= empty($nextEvent->title) ? "Nill" : $nextEvent->title; ?>
                    </h1>
                    <h3>
                        <?= empty($nextEvent->location) ? "Nill" : $nextEvent->location; ?>
                    </h3>
                    <div class="qt-countdown-container">
                        <div id="countdown" class="ClassyCountdownDemo qt-countdown" data-end="<?= $nextEvent->date; ?>"></div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="qt-countdown-background">
                <div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/banners/card.jpg">
                    <img src="<?= PUBLIC_URL; ?>/images/banners/card.jpg" alt="Featured image" width="690" height="302">
                </div>
            </div>
        </div>
        <hr class="qt-spacer-m">
        <!-- ======================= CONTENT SECTION ======================= -->
        <div class="qt-container qt-vertical-padding-m qt-archive-events">
            <div class="row">
                <div class="col s12 m12 l9">
                    <h5 class="qt-caption-small"><span>Events</span></h5>
                    <!-- EVENT ========================= -->
                    <?php if(empty($allEvents)): ?>
                        <div class="text-muted">No Events Yet</div>
                    <?php else: ?>
                        <?php foreach($allEvents as $event): ?>
                            <div class="qt-part-archive-item qt-item-event qt-negative qt-card-s">
                                <div class="qt-item-header">
                                    <div class="qt-header-mid qt-vc">
                                        <div class="qt-vi">
                                            <div class="row">
                                                <div class="col s12 m2">
                                                    <h4 class="qt-date ">
                                                        <?php $day = empty($event->date) ? "Nill" : date("j", strtotime($event->date)); ?>
                                                        <span class="qt-day">
                                                            <?= $day > 9 ? $day : "0".$day; ?>
                                                        </span>
                                                        <span class="qt-month">
                                                            <?= empty($event->date) ? "Nill" : date("F Y", strtotime($event->date)); ?>
                                                        </span>
                                                    </h4>
                                                </div>
                                                <div class="col s12 m8 qt-titles">
                                                    <div class="qt-vc">
                                                        <div class="qt-vi">
                                                            <h6 class="qt-spacer-xs">
                                                                <?= empty($event->location) ? "Nill" : $event->location; ?>
                                                            </h6>
                                                            <h4 class="qt-spacer-xs qt-ellipsis qt-t qt-title">
                                                                <a href="javascript:;" class="qt-text-shadow">
                                                                    <?= empty($event->title) ? "Nill" : $event->title; ?>
                                                                </a>
                                                            </h4>
                                                            <div>
                                                                <?= empty($event->time) ? "Nill" : strtoupper(date("g:i a", strtotime($event->time))); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="qt-header-bg" data-bgimage="">
                                        <img src="" alt="Featured image" width="690" height="302">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="col s12 m12 l3">
                    <?php require FRONTEND_PATH . DS . "events" . DS . "partials" . DS . "sidebar.php"; ?>
                </div>
            </div>
        </div>
    </div>
    <?php require FRONTEND_PATH . DS . "layouts" . DS . "bottom.php"; ?>
</div>