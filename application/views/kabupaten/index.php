<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Data Kabupaten</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Lihat <small>Data</small></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box table-responsive">
									<table id="datatable" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Kabupaten</th>
												<th>Provinsi</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											foreach ($result as $key => $val) { ?>
												<tr>
													<td><?= $key+1; ?></td>
													<td><?= $val['nama']; ?></td>
													<td><?= $val['nama_provinsi']; ?></td>
													<td>act</td>
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