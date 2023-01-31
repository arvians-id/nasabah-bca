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
                    <form method="POST">
                        <input type="hidden" name="nik_norek" value="<?= $this->session->userdata('nik_norek') ?>" readonly>
                        <div class="row mb-3 px-4">
                            <button type="submit" class="btn btn-primary btn-block text-center">Selanjutnya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>