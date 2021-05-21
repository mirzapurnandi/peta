<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Data Geografis Mahasiswa</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Geografis</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?=site_url('mahasiswas/simpan'); ?>" method="POST">
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIM 
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="hidden" name="nim" id="nim" value="<?= $nim ?>">
									<input type="text" id="nim_" value="<?= $result['nim'] ?>" class="form-control" disabled>
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tempat Lahir 
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="tempat" value="<?= $result['tempat_lahir'] ?>" class="form-control" disabled>
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat 
								</label>
								<div class="col-md-6 col-sm-6 ">
									<textarea class="form-control" name="alamat" disabled><?= $result['alamat']; ?></textarea>
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Provinsi <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<?= form_dropdown('provinsiid', $provinsi, $provinsiid, 'class="form-control provinsiid" id="provinsiid" onChange="tampilKabupaten()" required'); ?>
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kabupaten
								</label>
								<div class="col-md-6 col-sm-6 ">
									<?= form_dropdown('kabupatenid', $kabupaten, $kabupatenid, 'class="form-control kabupatenid" id="kabupatenid" onChange="tampilKecamatan()" required'); ?>
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kecamatan
								</label>
								<div class="col-md-6 col-sm-6 ">
									<?= form_dropdown('kecamatanid', $kecamatan, $kecamatanid, 'class="form-control" id="kecamatanid" required'); ?>
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