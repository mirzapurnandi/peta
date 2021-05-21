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
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
	<script src="<?= config_item('base_url') ?>asset/js/leaflet.ajax.js"></script>
	<?= isset($_styles) ? $_styles : ""; ?>
	<style type="text/css">
		#mapid {
			height: 600px;
		}

		.legend {
			background: white;
			line-height: 1.5em;
		}

		.legend i {
			width: 5em;
			float: left;
		}

		.btn-xs {
			padding: 1px 5px;
			font-size: 12px;
			line-height: 1.5;
			border-radius: 3px;
		}
	</style>
</head>