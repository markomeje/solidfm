<!-- Modal -->
<div class="modal fade" id="add-programme" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-raduis-lg">
            <div class="modal-header bg-light">
                <div class="modal-title text-dark">Add programme</div>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="POST" action="javascript:;" class="add-programme-form" data-action="<?= DOMAIN; ?>/programmes/addProgramme">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Year <em>(already filled)</em></label>
                            <input type="text" name="year" class="form-control year" value="<?= date("Y"); ?>">
                            <small class="error year-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Month</label>
                            <select class="custom-select form-control month" name="month">
                                <?php if(empty($monthsOfYear)): ?>
                                    <option value="">No months</option>
                                <?php else: ?>
                                    <?php foreach($monthsOfYear as $key => $value): ?>
                                        <option value="<?= $value; ?>">
                                            <?= ucfirst($value); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error month-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Day</label>
                            <select class="custom-select form-control day" name="day">
                                <?php if(empty($daysOfTheWeek)): ?>
                                    <option value="">No days</option>
                                <?php else: ?>
                                    <?php foreach($daysOfTheWeek as $key => $value): ?>
                                        <option value="<?= $value; ?>">
                                            <?= ucfirst($value); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error day-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Belt</label>
                            <select class="custom-select form-control belt" name="belt">
                                <?php if(empty($programmeBelts)): ?>
                                    <option value="">No belts</option>
                                <?php else: ?>
                                    <?php foreach($programmeBelts as $belt): ?>
                                        <option value="<?= $belt; ?>">
                                            <?= ucfirst($belt); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error belt-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Time</label>
                            <input type="text" name="time" class="form-control time" placeholder="e.g., 0500 - 1000 hours">
                            <small class="error time-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Status</label>
                            <select class="custom-select form-control status" name="status">
                                <?php if(empty($programmeStatus)): ?>
                                    <option value="">No status</option>
                                <?php else: ?>
                                    <?php foreach($programmeStatus as $status): ?>
                                        <option value="<?= $status; ?>">
                                            <?= ucfirst($status); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error status-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Presenter</label>
                            <input type="text" name="presenter" class="form-control presenter" placeholder="e.g., Miss. Cristi Nero">
                            <small class="error presenter-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Producer</label>
                            <input type="text" name="producer" class="form-control producer" placeholder="e.g., Engr. Kali John">
                            <small class="error producer-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Anchor</label>
                            <input type="text" name="anchor" class="form-control anchor" placeholder="e.g., Bose Lilian">
                            <small class="error anchor-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Host</label>
                            <input type="text" name="host" class="form-control host" placeholder="e.g., Chukwu Ike">
                            <small class="error host-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="text-muted">Synopsis</label>
                            <textarea class="form-control synopsis" rows="3" name="synopsis" placeholder="Enter synopsis here"></textarea>
                            <small class="error synopsis-error text-danger"></small>
                        </div>
                        <div class="form-group col-12">
                            <label class="text-muted">Title</label>
                            <textarea class="form-control title" rows="3" placeholder="Enter title here" name="title"></textarea>
                            <small class="form-text text-muted">Just add main or first title. After you add this schedule, you'll see an option for adding other titles.</small>
                            <small class="error title-error text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-orange">
                    <div class="d-flex justify-content-left">
                        <button type="submit" class="btn bg-dark text-white btn-lg add-programme-button px-4">
                            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none add-programme-spinner mb-1">
                            Add
                        </button>
                        <button type="button" class="btn bg-danger btn-lg text-white ml-3" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mt-2 mb-4 rounded add-programme-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>