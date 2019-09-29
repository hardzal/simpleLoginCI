<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg-8">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="pl-5 pr-5 pt-5 pb-0">
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
											<input type="text" name="captcha" />
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
					<div class="text-center">
						<p>&copy;2019 PT Website</p>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>
