<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-code"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Site Title</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider mt-3">
	<!-- Heading MENU -->
	<div class='sidebar-heading'>
		Menu
	</div>

	<!-- Sub Heading Sesuai MENU -->
	<?php if ($this->session->userdata('level_id') == 1) : ?>
		<li class="nav-item">
			<a class="nav-link pb-0 pt-2" href="<?= base_url('admin'); ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link pb-0 pt-2" href="<?= base_url('admin'); ?>">
				<i class="fas fa-fw fa-user"></i>
				<span>Users</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link pb-0 pt-2" href="<?= base_url('admin'); ?>#">
				<i class="fas fa-fw fa-user-cog"></i>
				<span>Settings</span>
			</a>
		</li>
	<?php elseif ($this->session->userdata('level_id') == 2) : ?>
		<li class="nav-item">
			<a class="nav-link pb-0 pt-2" href="<?= base_url('user'); ?>#">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span>
			</a>
		</li>
	<?php endif; ?>
	<!-- Divider -->
	<hr class="sidebar-divider mt-3">

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('auth/logout'); ?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Logout</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
