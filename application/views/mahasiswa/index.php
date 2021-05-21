<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Data Mahasiswa</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<a href="<?= site_url('mahasiswas/entry'); ?>" class="btn btn-success">Tambah</a>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-sm-12">
								<font class="info"><?= $this->session->flashdata('pesan'); ?></font>
								<div class="card-box table-responsive">
									<table id="datatable" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<th>NIM</th>
												<th>Nama</th>
												<th>J. Kelamin</th>
												<th>Prodi</th>
												<th>Kota Asal</th>
												<th>Tahun Masuk</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($result as $key => $val) { ?>
												<tr>
													<td><?= $key + 1; ?></td>
													<td><?= $val['nim']; ?></td>
													<td><?= $val['nama']; ?></td>
													<td><?= $val['jenis_kelamin'] == "L" ? "Laki-laki" : "Wanita"; ?></td>
													<td><?= $val['nama_prodi']; ?></td>
													<td>
														<a href="<?= site_url('mahasiswas/geografis/' . $val['nim']); ?>">
															<?= $val['nama_kabupaten'] == "" ? "<i>== Masih Kosong ==</i>" : $val['nama_kabupaten']; ?>
														</a>

													</td>
													<td><?= $val['tahun_masuk']; ?></td>
													<td>
														<a href="<?= site_url('mahasiswas/entry/' . $val['id']) ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
														<a href="<?= site_url('mahasiswas/delete/' . $val['id']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Mau Menghapus Data ini... ?')"><i class="fa fa-trash-o"></i> Delete </a>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>