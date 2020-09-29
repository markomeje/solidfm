<div class="qt-parentcontainer">    
	<!-- PLAYER ========================= -->
	<div id="channelslist" class="side-nav qt-content-primary qt-right-sidebar">
		<a href="#" class="qt-btn qt-btn-secondary button-playlistswitch-close qt-close-sidebar-right" data-activates="channelslist"><i class="icon dripicons-cross"></i></a>
		<!-- PLAYER ========================= -->
		<div id="qtplayercontainer" data-playervolume="true" data-accentcolor="#dd0e34" data-accentcolordark="#ff0442" data-textcolor="#ffffff" data-soundmanagerurl="./components/soundmanager/swf/" class="qt-playercontainer qt-playervolume qt-clearfix qt-content-primary">
			<div class="qt-playercontainer-content qt-vertical-padding-m">
				<div class="qt-playercontainer-header">
					<h5 class="qt-text-shadow small">Now on</h5>
					<h3 id="qtradiotitle" class="qt-text-shadow">Solid Fm 100.9</h3>
					<h4 id="qtradiosubtitle" class="qt-thin qt-text-shadow small">Beat the rythem</h4>
				</div>
				<div class="qt-playercontainer-musicplayer" id="qtmusicplayer">
					<div class="qt-musicplayer">
						<div class="ui360 ui360-vis qt-ui360">
							<iframe src="https://mixlr.com/1009solidfm/embed" width="100%" height="180px" scrolling="no" frameborder="no" marginheight="0" marginwidth="0"></iframe><small><a href="http://mixlr.com/1009solidfm" style="color:#1a1a1a;text-align:left; font-family:Helvetica, sans-serif; font-size:11px;">100.9solidfm is on Mixlr</a></small>
						</div>
					</div>
				</div>
			</div>
			<div id="playerimage" class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/imagestemplate/full-1600-700.jpg">
				<img src="<?= PUBLIC_URL; ?>/imagestemplate/full-1600-700.jpg" alt="Featured image" width="690" height="302">
			</div>
		</div>
		<!-- this is for xml radio feed -->
		<div id="qtShoutcastFeedData" class="hidden" data-style="" data-channel="1" data-host="173.192.105.231" data-port="3540"></div>
		<!-- PLAYER END ========================= -->
	</div>
	<!-- CHANNELS LIST END ========================= -->
</div>