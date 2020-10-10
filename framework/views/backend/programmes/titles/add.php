<div class="dropdown-menu dropdown-menu-right stop-propergation p-4" style="width: 288px !important;">
	<form action="javascript:;" method="post" class="add-title-form" data-action="<?= DOMAIN; ?>/titles/addTitle">
		<input type="hidden" name="programme" value="<?= $id; ?>">
	    <div class="input-group-sm form-group">
	    	<label class="text-muted">More Title</label>
	    	<input type="text" name="title" class="form-control title" placeholder="e.g., Soul Music">
	    	<small class="error title-error text-danger"></small>
	    </div>
	    <div class="form-row">
	    	<div class="input-group-sm form-group col-md-6">
	    		<label class="text-muted">Starting Time</label>
		    	<input type="time" name="startingtime" class="form-control starting-time">
		    	<small class="error starting-time-error text-danger"></small>
		    </div>
		    <div class="input-group-sm form-group col-md-6">
		    	<label class="text-muted">Ending Time</label>
		    	<input type="time" name="endingtime" class="form-control ending-time">
		    	<small class="error ending-time-error text-danger"></small>
		    </div>
	    </div>
	    <button type="submit" class="btn mt-2 bg-dark text-white btn-sm add-title-button px-4 btn-block">
            <img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none add-title-spinner mb-1">
            Add
        </button>
        <div class="alert mt-4 rounded add-title-message d-none"></div>
	</form>
</div>