<div class="frontend">
	<div class="login">
		<div class="container position-relative">
			<div class="row justify-content-center py-5">
				<div class="col-12 col-md-6 col-lg-6">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
				<div class="col-12 col-md-6 col-lg-6">
					<div class="my-4">
						<h3 class="text-prussian">Login Here</h3>
						<form action="javascript:;" method="POST" class="login-form" data-action="<?= DOMAIN; ?>/login/login">
							<div class="alert my-3 px-3 login-message d-none"></div>
							<?php $hash = Application\Library\Generate::hash(); ?>
							<input type="hidden" name="csrf" value="<?= Application\Library\Session::set("csrf", $hash); ?>">
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
							<div class="form-group input-group-lg">
								<div class="custom-control custom-switch">
									<input type="checkbox" value="on" name="rememberme" class="custom-control-input rememberme" id="remember-me">
									<label class="custom-control-label text-muted cursor-pointer" for="remember-me">Remember Login</label>
								</div>
							</div>
							<button type="submit" class="btn btn-lg border-0 bg-orange border-raduis-sm text-white login-button btn-block">
								<img src="<?= PUBLIC_URL; ?>/images/banners/spinner.svg" class="mr-2 d-none login-spinner mb-1">
								Login
							</button>
							<div class="pt-3 pb-5">
								<a href="javascript:;" class="text-muted float-left">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

