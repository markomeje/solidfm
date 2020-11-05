<!-- Modal -->
<?php $id = empty($event->id) ? 0 : $event->id; ?>
<div class="modal fade" id="edit-event-<?= $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Edit Event</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="post" action="javascript:;" class="edit-event-form" data-action="<?= DOMAIN; ?>/dashboard/editEvent/<?= $id; ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <?php $date = empty($event->date) ? 'Nill' : $event->date; ?>
                            <label class="text-muted">Date <?= date("F j, Y", strtotime($date)); ?></label>
                            <input type="date" name="date" class="form-control date" placeholder="Enter event date" value="<?= $date; ?>">
                            <small class="error date-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Location</label>
                            <input type="text" name="location" class="form-control location" placeholder="Enter event location" value="<?= empty($event->location) ? 'Nill' : $event->location; ?>">
                            <small class="error location-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <?php $time = empty($event->time) ? 'Nill' : $event->time; ?>
                            <label class="text-muted">Time <?= date("g:i a", strtotime($time)); ?></label>
                            <input type="time" name="time" class="form-control time" placeholder="Enter event time" value="<?= $time; ?>">
                            <small class="error time-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Title</label>
                            <input type="text" name="title" class="form-control title" placeholder="Enter event title" value="<?= empty($event->title) ? 'Nill' : $event->title; ?>">
                            <small class="error title-error text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg edit-event-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none edit-event-spinner mb-1">
                            Save
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded edit-event-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>