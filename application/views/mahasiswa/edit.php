<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Mahasiswa</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Mahasiswa</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="mhs-form" data-parsley-validate class="form-horizontal form-label-left" action="<?= site_url('mahasiswas/proses'); ?>" method="POST">
                            <input type="hidden" name="mahasiswaid" value="<?= $result['id']; ?>">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">NIM <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" readonly value="<?= $result['nim']; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Nama Lengkap <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="nama" value="<?= $result['nama']; ?>" required="required" class="form-control">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tanggal_lahir" value="<?= $result['tanggal_lahir']; ?>" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Tempat Lahir <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="tempat_lahir" value="<?= $result['tempat_lahir']; ?>" required="required" class="form-control">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Jenis Kelamin <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <p>
                                        Pria:
                                        <input type="radio" class="flat" name="jenis_kelamin" value="L" <?= $result['jenis_kelamin'] == "L" ? "checked" : ""; ?> /> &nbsp; &nbsp; Wanita:
                                        <input type="radio" class="flat" name="jenis_kelamin" value="P" <?= $result['jenis_kelamin'] == "P" ? "checked" : ""; ?> />
                                    </p>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Agama <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <?= form_dropdown('agama', $agama, $result['agama'], 'class="form-control" required'); ?>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="email" name="email" value="<?= $result['email'] ?>" required="required" class="form-control">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">No HP <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" name="no_hp" value="<?= $result['no_hp'] ?>" required="required" class="form-control">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Alamat <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" rows="2" placeholder="Alamat" name="alamat"><?= $result['alamat'] ?></textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Prodi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <?= form_dropdown('prodi', $prodi, $result['prodi'], 'class="form-control" required'); ?>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="">Tahun Masuk <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <?= form_dropdown('tahun', $tahun, $result['tahun_masuk'], 'class="form-control" required'); ?>
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