<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-at"></i> <span><?= $this->session->userdata('userid') == "" ? "UserSite" : "AdminSite"; ?></span></a>
					</div>

					<div class="clearfix"></div>
					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Menu - Menu</h3>
							<ul class="nav side-menu">
								<li><a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Beranda </a></li>
								<?php if (!$this->session->userdata('userid')) { ?>
									<li><a href="<?= site_url('logins'); ?>"><i class="fa fa-sign-in"></i> Login </a></li>
								<?php } else { ?>
									<li><a href="<?= site_url('syncs'); ?>"><i class="fa fa-random"></i> Sync </a></li>
									<li><a href="<?= site_url('petas'); ?>"><i class="fa fa-map-marker"></i> Peta Persebaran </a></li>
									<li><a href="<?= site_url('mahasiswas'); ?>"><i class="fa fa-group"></i> Data Mahasiswa </a></li>
									<li><a><i class="fa fa-home"></i> Geografis <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="<?= site_url('provinsis'); ?>">Provinsi</a></li>
											<li><a href="<?= site_url('kabupatens'); ?>">Kota / Kabupaten</a></li>
											<li><a href="<?= site_url('kecamatans'); ?>">Kecamatan</a></li>
											<!--li><a href="<?= site_url('desas'); ?>">Desa</a></li-->
										</ul>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= config_item('config_base_url'); ?>logins/logout">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<!--nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open" style="padding-left: 15px;">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									<img src="<?= config_item('base_theme') ?>production/images/img.jpg" alt="">John Doe
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item"  href="javascript:;"> Profile</a>
									<a class="dropdown-item"  href="javascript:;">Help</a>
									<a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
								</div>
							</li>
						</ul>
					</nav-->
				</div>
			</div>