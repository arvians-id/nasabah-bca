<div class="content">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div class="my-auto">
                            <?= $judul; ?>
                        </div>
                    </div>
                    <div class="content">
                        <div class="canvas-wrapper">
                            <table class="table no-margin table-bordered bg-lighter-grey">
                                <tr>
                                    <td>NIK / No. Rekening</td>
                                    <td>: <?= $nasabah['nik_norek'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?= $nasabah['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?= $nasabah['jenis_kelamin'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: <?= $nasabah['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td>
                                    <td>: <?= $nasabah['no_telp'] ?></td>
                                </tr>
                                <tr>
                                    <td>Keterangan Transaksi</td>
                                    <td>: <span class="badge badge-primary"><?= $nasabah['jumlah_transaksi'] ?></span></td>
                                </tr>
                                <tr>
                                    <td>Produk yang ditawarkan</td>
                                    <td>: <?= $nasabah['product_offered'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Masuk</td>
                                    <td>: <?= $nasabah['tgl_masuk'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Riwayat Transaksi Nasabah
                    </div>
                    <div class="content">
                        <div class="head mb-3">
                            <?php if ($this->session->flashdata('message')) : ?>
                                <?= $this->session->flashdata('message'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="canvas-wrapper table-responsive">
                            <table class="table no-margin bg-lighter-grey" id="datatables">
                                <thead class="success">
                                    <tr>
                                        <th>#</th>
                                        <th>ID Nasabah</th>
                                        <th>Nominal</th>
                                        <th>Perihal</th>
                                        <th>No Rekening - Nama</th>
                                        <th>Tanggal Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($transaksi as $t) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <?= $t['nasabah_id'] ?>
                                                <br>
                                                <a href="<?= base_url('admin/ubahtransaksi/' . $t['id_transaksi']) ?>" class="text-primary">Ubah</a> |
                                                <a href="<?= base_url('admin/hapustransaksi/' . $t['id_transaksi']) ?>" onclick="return confirm('Apakah anda yakin?')" class="text-primary">Hapus</a>
                                            </td>
                                            <td class="text-center"><?= $t['nominal'] == null ? '-' : $t['nominal'] ?></td>
                                            <td><?= $t['perihal'] ?></td>
                                            <td><?= $t['no_rekening'] . ' - ' . $t['nama_pemegang_rekening'] ?></td>
                                            <td><?= $t['tanggal_transaksi'] ?></td>
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