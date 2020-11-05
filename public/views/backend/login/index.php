<div class="frontend">
	<div class="login">
		<div class="container position-relative">
			<div class="row justify-content-center py-5">
				<div class="col-12 col-md-6 col-lg-4">
					<a href="<?= DOMAIN; ?>">
						<img src="<?= PUBLIC_URL; ?>/images/logos/logo.png" alt="SolidFM" class="img-fluid">
					</a>
					<div class="my-3">
						<h3 class="text-prussian">Login Here</h3>
						<form action="javascript:;" method="POST" class="login-form" data-action="<?= DOMAIN; ?>/login/login">
							<div class="alert my-3 px-3 login-message d-none"></div>
							<div class="form-group input-group-lg">
								<label for="" class="text-muted mb-2">Email</label>
								 <input type="email" name="email" class="form-control email" placeholder="e.g., john@doe.com">
								 <small class="error email-error text-danger"></small>
							</div>
							<div class="form-group input-group-lg">
								<label for="" class="text-muted mb-2">Password</label>
								<input type="password" name="password" class="form-control password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
								<small class="error password-error text-danger"></small>
							</div>
							<button type="submit" class="btn mt-4 btn-lg border-0 bg-dark text-white login-button btn-block">
								<img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none login-spinner mb-1">
								Login
							</button>
							<!-- <div class="pt-3 pb-5">
								<a href="javascript:;" class="text-muted float-left">Forgot Password?</a>
							</div> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

