<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="<?= PUBLIC_URL; ?>/jquery/jquery.min.js" type="text/javascript"></script>
<!-- popper JS -->
<script src="<?= PUBLIC_URL; ?>/bootstrap/popper.min.js" type="text/javascript"></script>
<!-- Bootstrap JS -->
<script src="<?= PUBLIC_URL; ?>/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<!-- USER LOGIN -->
<script src="<?= PUBLIC_URL; ?>/jquery/login.js" type="text/javascript"></script>
<!-- CKEDITOR-->
<script src="<?= PUBLIC_URL; ?>/ckeditor/ckeditor.js" type="text/javascript"></script>
<!-- general-->
<script src="<?= PUBLIC_URL; ?>/jquery/general.js" type="text/javascript"></script>
<!-- news-->
<script src="<?= PUBLIC_URL; ?>/jquery/news.js" type="text/javascript"></script>
<!-- summernote-->
<script src="<?= PUBLIC_URL; ?>/summernote/summernote-bs4.min.js" type="text/javascript"></script>
<!-- upcomings-->
<script src="<?= PUBLIC_URL; ?>/jquery/upcomings.js" type="text/javascript"></script>
<!-- categories-->
<script src="<?= PUBLIC_URL; ?>/jquery/categories.js" type="text/javascript"></script>
<script type="text/javascript">
	var addNews = $('#add-news-content');
	if (addNews) {
		addNews.summernote({
	        tabsize: 4,
	        height: 300
	    });
	}
	<?php if(isset($allNews)): ?>
		<?php foreach($allNews as $news): ?>
	        var editPackage = $('#edit-news-content-<?= empty($news->id) ? 0 : $news->id; ?>');
			editPackage.summernote({
		        tabsize: 4,
		        height: 300
		    });
		<?php endforeach; ?>
    <?php endif; ?>
</script>
</body>
</html>
<?php ob_end_flush(); ?>
