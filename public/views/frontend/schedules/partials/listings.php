<div class="qt-show-schedule-day row">
    <br>
    <?php if(empty($programmes)): ?>
        <br>
        <div class="" style="color: #333;">No Programme For <?= ucfirst($day); ?></div>
    <?php else: ?>
        <?php foreach($programmes as $programme): ?>
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
    <?php endif; ?>
</div>