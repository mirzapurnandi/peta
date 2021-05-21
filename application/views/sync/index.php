<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Sinkron Data Mahasiswa</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Mulai <button type="button" class="btn btn-success btn-sm sync"> Sync </button></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<span class="tampil"></span>
						<br />
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?=site_url('syncs/filter'); ?>" method="POST">

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Data Sync <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<?= form_dropdown('datasync', $datasync, '', 'class="form-control" id="datasync" required'); ?>
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Prodi
								</label>
								<div class="col-md-6 col-sm-6 ">
									<?= form_dropdown('prodi', $prodi, '', 'class="form-control" id="prodi"'); ?>
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tahun Masuk
								</label>
								<div class="col-md-6 col-sm-6 ">
									<?= form_dropdown('tahun', $tahun, '', 'class="form-control" id="tahun"'); ?>
								</div>
							</div>
						
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<button type="submit" class="btn btn-success"> Simpan </button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>