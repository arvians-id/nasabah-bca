<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-header">
                <h2 class="page-title text-center">Lihat Transaksi dan Nasabah Sesuai Tanggal <?= $this->input->post('daritgl') ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <div class="head d-flex justify-content-between mb-3">
                            <h5 class="mb-0">Tanggal : <?= $this->input->post('daritgl') ?></h5>
                            <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary text-white"><i class="fas fa-calendar"></i> Pilih Tanggal Kembali</a>
                        </div>
                        <div class="canvas-wrapper">
                            <table class="table no-margin bg-lighter-grey" id="datatables">
                                <thead class="success">
                                    <tr>
                                        <th>#</th>
                                        <th>ID Nasabah</th>
                                        <th>NIK/No.Rek</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nominal</th>
                                        <th>Perihal</th>
                                        <th>Tanggal Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $total = 0;
                                    foreach ($nasabah_bytgl as $n) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $n['id_nasabah'] ?></td>
                                            <td><?= $n['nik_norek'] ?></td>
                                            <td><?= $n['nama'] ?></td>
                                            <td><?= $n['jenis_kelamin'] ?></td>
                                            <td class="text-center"><?= $n['nominal'] == null ? '-' : $n['nominal'] ?></td>
                                            <td><?= $n['perihal'] ?></td>
                                            <td><?= $n['tanggal_transaksi'] ?></td>
                                        </tr>
                                    <?php $total += $n['ket_transaksi']++;
                                    endforeach;
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td colspan="6" class="text-right"><strong>Jumlah Transaksi</strong></td>
                                        <td><?= $total ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="6" class="text-right"><strong>Jumlah Nasabah</strong></td>
                                        <td><?= $nasabah_bytgl_numrows; ?></td>
                                    </tr>
                                </tfoot>
                            </table>
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
                    <button type="submit" name="submit" class="btn btn-danger text-white">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>