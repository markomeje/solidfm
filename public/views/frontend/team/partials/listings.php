<?php $fullname = empty($member->fullname) ? "Nill" : $member->fullname; ?>
    <?php $rawFullname = implode("-", explode(" ", strtolower($fullname))); ?>
	<?php $id = empty($member->id) ? 0 : $member->id; ?>
	<div class="col s12 m4 l3">
		<div class="qt-part-archive-item qt-item-member">
			<div class="qt-item-header" style="height: 360px !important;">
				<div class="qt-header-top">
					<ul class="qt-tags">
						<li><a href="<?= DOMAIN; ?>/team/member/<?= $id; ?>/<?= $rawFullname; ?>"></a></li>
					</ul>
				</div>
				<div class="qt-header-mid qt-vc">
					<div class="qt-vi">
						<h4 class="qt-ellipsis qt-title">
							<a href="<?= DOMAIN; ?>/team/member/<?= $id; ?>/<?= $rawFullname; ?>" class="qt-text-shadow">
								<?= ucwords($fullname); ?>
							</a>
						</h4>
					</div>
				</div>
				<div class="qt-header-bg" data-bgimage="<?= PUBLIC_URL; ?>/images/members/<?= $member->photo; ?>">
					<img src="<?= PUBLIC_URL; ?>/images/members/<?= $member->photo; ?>" alt="Featured image">
				</div>
			</div>
			<div class="qt-item-content-xs qt-card">
				<p class="qt-ellipsis-3">
					<a href="<?= DOMAIN; ?>/team/member/<?= $id; ?>/<?= $rawFullname; ?>" class="" style="color: #333 !important;">
						<?= empty($member->biography) ? "Nill" : Application\Core\Help::limitStringLength(strip_tags($member->biography), 60); ?>
					</a>
				</p>
			</div>
		</div>
    </div>