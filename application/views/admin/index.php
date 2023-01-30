<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-header">
                <h2 class="page-title text-center">Dashboard</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="teal fas fa-handshake"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="detail">
                                    <p class="detail-subtitle">Total Transaksi Nasabah</p>
                                    <span class="number"><?= $total_transaksi_nasabah ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-calendar"></i> For all the time
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="olive fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="detail">
                                    <p class="detail-subtitle">Total Nasabah Saat Ini</p>
                                    <span class="number"><?= $total_nasabah ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-calendar"></i> For all time
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="violet fas fa-handshake"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="detail">
                                    <p class="detail-subtitle">Total Transaksi Hari Ini</p>
                                    <span class="number"><?= $transaksi_hariini ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-calendar"></i> For today
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="orange fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="detail">
                                    <p class="detail-subtitle">Total nasabah hari ini</p>
                                    <span class="number"><?= $nasabah_hariini; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-calendar"></i> For today
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <div class="head">
                            <h5 class="mb-0">Cari Total Transaksi dan Nasabah sesuai tanggal</h5>
                            <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary text-white mt-2"><i class="fas fa-calendar"></i> Pilih Tanggal</a>
                        </div>
                        <div class="canvas-wrapper">
                        </div>
                        <div class="ui hidden divider"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>admin/lihatnasabahtgl" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="daritgl">Dari Tanggal</label>
                        <input type="date" name="daritgl" id="daritgl" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary text-white">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>