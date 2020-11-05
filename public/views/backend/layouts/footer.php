<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="<?= PUBLIC_URL; ?>/jquery/jquery.min.js" type="text/javascript"></script>
<!-- popper JS -->
<script src="<?= PUBLIC_URL; ?>/bootstrap/popper.min.js" type="text/javascript"></script>
<!-- Bootstrap JS -->
<script src="<?= PUBLIC_URL; ?>/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<!-- youtube-->
<script src="<?= PUBLIC_URL; ?>/jquery/youtube.js" type="text/javascript"></script>
<!-- USER LOGIN -->
<script src="<?= PUBLIC_URL; ?>/jquery/login.js" type="text/javascript"></script>
<!-- general-->
<script src="<?= PUBLIC_URL; ?>/jquery/general.js" type="text/javascript"></script>
<!-- news-->
<script src="<?= PUBLIC_URL; ?>/jquery/news.js" type="text/javascript"></script>
<!-- summernote-->
<script src="<?= PUBLIC_URL; ?>/summernote/summernote-bs4.min.js" type="text/javascript"></script>
<!-- adverts -->
<script src="<?= PUBLIC_URL; ?>/jquery/adverts.js" type="text/javascript"></script>
<!-- categories-->
<script src="<?= PUBLIC_URL; ?>/jquery/categories.js" type="text/javascript"></script>
<!-- stories-->
<script src="<?= PUBLIC_URL; ?>/jquery/stories.js" type="text/javascript"></script>
<!-- programmes-->
<script src="<?= PUBLIC_URL; ?>/jquery/programmes.js" type="text/javascript"></script>
<!-- sliders-->
<script src="<?= PUBLIC_URL; ?>/jquery/sliders.js" type="text/javascript"></script>
<!-- events-->
<script src="<?= PUBLIC_URL; ?>/jquery/events.js" type="text/javascript"></script>
<!-- music-->
<script src="<?= PUBLIC_URL; ?>/jquery/music.js" type="text/javascript"></script>
<script type="text/javascript">
	<?php $textareas = ["add-news-content" => ["height" => 300], "edit-news-content" => ["height" => 400]]; ?>
	<?php foreach($textareas as $area => $value): ?>
		var areaInput = $('#<?= $area; ?>');
		if (areaInput) {
			areaInput.summernote({
		        tabsize: 4,
		        height: <?= isset($value["height"]) ? $value["height"] : 200; ?>
		    });
		}
	<?php endforeach; ?>
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
