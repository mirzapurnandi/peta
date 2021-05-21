<?php
if ($this->session->userdata('userid')) {
?>
	<footer>
		<div class="pull-right">
			Powered by <a href="https://peta.tagun.xyz">Peta</a>
		</div>
		<div class="clearfix"></div>
	</footer>
<?php } ?>
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
<script src="<?= config_item('base_url') ?>asset/js/sync.js"></script>
<script src="<?= config_item('base_url') ?>asset/js/geografis.js"></script>
<script>
	var base_url = "<?= config_item('config_base_url') ?>";
	var base_url1 = "<?= config_item('base_url') ?>";
</script>
</body>

</html>