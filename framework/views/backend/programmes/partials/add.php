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
                            <label class="text-muted">Year</label>
                            <select class="custom-select form-control year" name="year">
                                <?php $years = [date("Y"), (date("Y") + 1)]; ?>
                                <?php if(empty($years)): ?>
                                    <option value="">No years</option>
                                <?php else: ?>
                                    <?php foreach($years as $year): ?>
                                        <option value="<?= $year; ?>">
                                            <?= $year; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
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
                            <label class="text-muted">Presenter</label>
                            <input type="text" name="presenter" class="form-control presenter" placeholder="e.g., Team">
                            <small class="error presenter-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Starts</label>
                            <input type="time" name="starts" class="form-control starts">
                            <small class="error starts-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Ends</label>
                            <input type="time" name="ends" class="form-control ends">
                            <small class="error ends-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Status</label>
                            <select class="custom-select form-control status" name="status">
                                <?php if(empty($status)): ?>
                                    <option value="">No days</option>
                                <?php else: ?>
                                    <?php foreach($status as $value): ?>
                                        <option value="<?= $value; ?>">
                                            <?= ucfirst($value); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small class="error status-error text-danger"></small>
                        </div>
                        <div class="form-group input-group-lg col-md-6">
                            <label class="text-muted">Title</label>
                            <input type="text" name="title" class="form-control title" placeholder="e.g., Soul Sistaz">
                            <small class="error title-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="text-muted">Description</label>
                            <textarea class="form-control description" rows="4" placeholder="Enter description here" name="description"></textarea>
                            <small class="error description-error text-danger"></small>
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