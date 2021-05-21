<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?= config_item('base_theme') ?>production/images/favicon.ico" type="image/ico" />

	<title>Site</title>

	<!-- Bootstrap -->
	<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="<?= config_item('base_theme') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?= config_item('base_theme') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?= config_item('base_theme') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="<?= config_item('base_theme') ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">

	<link href="<?= config_item('base_theme') ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

	<!-- bootstrap-progressbar -->
	<link href="<?= config_item('base_theme') ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
	<!-- JQVMap -->
	<link href="<?= config_item('base_theme') ?>vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
	<!-- bootstrap-daterangepicker -->
	<link href="<?= config_item('base_theme') ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="<?= config_item('base_theme') ?>build/css/custom.min.css" rel="stylesheet">
	<?= isset($_styles) ? $_styles : ""; ?>
</head>
<?php
$seg1 = $this->uri->segment('1') ? $this->uri->segment('1') : "";
?>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-at"></i> <span>AdminSite</span></a>
					</div>

					<div class="clearfix"></div>
					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Menu - Menu</h3>
							<ul class="nav side-menu">
								<li><a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Beranda </a></li>
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
			<!-- /top navigation -->

			<!-- page content -->
			<?= $contents; ?>
			<!-- /page content -->

			<!-- footer content -->
			<footer>
				<div class="pull-right">
					Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>

	<!-- jQuery -->
	<script src="<?= config_item('base_theme') ?>vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= config_item('base_theme') ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="<?= config_item('base_theme') ?>vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="<?= config_item('base_theme') ?>vendors/nprogress/nprogress.js"></script>
	<!-- Chart.js -->
	<script src="<?= config_item('base_theme') ?>vendors/Chart.js/dist/Chart.min.js"></script>
	<!-- gauge.js -->
	<script src="<?= config_item('base_theme') ?>vendors/gauge.js/dist/gauge.min.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="<?= config_item('base_theme') ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="<?= config_item('base_theme') ?>vendors/iCheck/icheck.min.js"></script>

	<script src="<?= config_item('base_theme') ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
	<!-- Skycons -->
	<script src="<?= config_item('base_theme') ?>vendors/skycons/skycons.js"></script>
	<!-- Flot -->
	<script src="<?= config_item('base_theme') ?>vendors/Flot/jquery.flot.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/Flot/jquery.flot.pie.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/Flot/jquery.flot.time.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/Flot/jquery.flot.stack.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/Flot/jquery.flot.resize.js"></script>
	<!-- Flot plugins -->
	<script src="<?= config_item('base_theme') ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/flot.curvedlines/curvedLines.js"></script>
	<!-- DateJS -->
	<script src="<?= config_item('base_theme') ?>vendors/DateJS/build/date.js"></script>
	<!-- JQVMap -->
	<script src="<?= config_item('base_theme') ?>vendors/jqvmap/dist/jquery.vmap.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="<?= config_item('base_theme') ?>vendors/moment/min/moment.min.js"></script>
	<script src="<?= config_item('base_theme') ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

	<!-- Custom Theme Scripts -->
	<script src="<?= config_item('base_theme') ?>build/js/custom.js"></script>
	<script>
		var base_url = "<?= config_item('config_base_url') ?>";
		var base_url1 = "<?= config_item('base_url') ?>";
	</script>
	<?= isset($_scripts) ? $_scripts : ""; ?>

</body>

</html>