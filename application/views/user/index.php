			<!-- Begin Page Content -->
			<div class="container-fluid">

				<!-- Page Heading -->
				<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
				<p>Selamat datang, <strong><?= $this->session->userdata("username"); ?></strong></p>

				<div class="row">
					<div class="col-lg-6">
						<?= $this->session->flashdata('message'); ?>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->
