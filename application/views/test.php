<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">


                </h1>

                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->

            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-primary">
                            <i class="ion ion-paper-airplane"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Tugas Ter-Approve</h4>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($jml_tugas)) {
                                    echo $jml_tugas;
                                } else {
                                    echo '0';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-info">
                            <i class="ion ion-university"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Nilai</h4>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($nilai)) {
                                    echo $nilai;
                                } else {
                                    echo '0';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <?php if ($ket === 'Mendapat Tunjangan') : ?>
                        <div class="card card-sm-3">
                            <div class="card-icon bg-success">
                                <i class="ion ion-happy"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">

                                    <h4>Reports</h4>
                                </div>
                                <div class="card-body">
                                    <p style="font-size: 14px"><?= $ket ?></p>
                                </div>
                            </div>
                        </div>
                    <?php elseif (empty($nilai)) : ?>
                        <div class="card card-sm-3">
                            <div class="card-icon bg-warning">
                                <i class="ion ion-android-bulb"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">

                                    <h4>Reports</h4>
                                </div>
                                <div class="card-body">
                                    <p style="font-size: 14px">Anda Belum Dinilai</p>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="card card-sm-3">
                            <div class="card-icon bg-danger">
                                <i class="ion ion-sad"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">

                                    <h4>Reports</h4>
                                </div>
                                <div class="card-body">
                                    <p style="font-size: 14px"><?= $ket ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                </div>
            </div>