<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg-8">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-5" style="padding-bottom: 2px !important;">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Login Form</h1>
									<hr class="border-bottom-primary" />
								</div>

								<?= $this->session->flashdata('message'); ?>

								<form class="user" method="POST" action="">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="username" placeholder="Username..." name="username" value="<?= set_value('username'); ?>" />
										<?= form_error('username', "<small class='text-danger pl-3'>", "</small>"); ?>
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" />
										<?= form_error('password', "<small class='text-danger pl-3'>", "</small>"); ?>
									</div>
									<div class="form-group">
										<div class="text-center mb-1">
											<?= form_error('captcha', "<small class='text-danger pl-3 mb-2'>", "</small>"); ?>
										</div>
										<div class="text-center mb-3">
											<?= $captcha['image']; ?>
											<input type="text" name="captcha" class="mt-3" />
											<input type="hidden" value="<?php echo $captcha['word'] ?>" name="code">
										</div>
									</div>
									<button type='submit' name='login' class="btn btn-primary btn-user btn-block">
										Login
									</button>
									<hr>
								</form>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<p class="text-center">Copyright &copy;2019</p>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>
