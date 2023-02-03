<div class="content">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="my-auto">
                                <?= $judul; ?>
                            </div>
                            <div>
                                <a href="<?= base_url('teller/tambahnasabah') ?>" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Input Nasabah</a>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="head mb-3">
                            <?= validation_errors(); ?>
                            <?php if ($this->session->flashdata('message')) : ?>
                                <?= $this->session->flashdata('message'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="canvas-wrapper table-responsive">
                            <table class="table table-bordered no-margin bg-lighter-grey" id="datatables">
                                <thead class="success">
                                    <tr>
                                        <th>#</th>
                                        <th>ID Nasabah</th>
                                        <th>NIK/No.Rek</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Transaksi</th>
                                        <th>Produk yang Ditawarkan</th>
                                        <th>Tanggal Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($nasabah as $n) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <?= $n['id_nasabah'] ?>
                                                <br>
                                                <a href="<?= base_url('teller/detailnasabah/' . $n['nik_norek']) ?>" class="text-primary">Detail</a> |
                                                <a href="<?= base_url('teller/ubahnasabah/' . $n['id_nasabah']) ?>" class="text-primary">Ubah</a>
                                                |
                                                <a href="<?= base_url('teller/hapusnasabah/' . $n['id_nasabah']) ?>" class="text-primary" onclick="return confirm('Jika anda menghapus nasabah ini, maka seluruh riwayat transaksinya akan terhapus. Apakah anda yakin?')">Hapus</a>
                                            </td>
                                            <td><?= $n['nik_norek'] ?></td>
                                            <td><?= $n['nama'] ?></td>
                                            <td><?= $n['jenis_kelamin'] ?></td>
                                            <td><?= $n['jumlah_transaksi'] ?></td>
                                            <td style="text-align: center;"><?= $n['product_offered'] == null ? '-' : $n['product_offered'] ?></td>
                                            <td><?= $n['tgl_masuk'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nasabah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('teller/nasabah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nik_norek">Nik/No.Rekening</label>
                        <input type="text" name="nik_norek" placeholder="Masukkan Nik / No. Rekening" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>