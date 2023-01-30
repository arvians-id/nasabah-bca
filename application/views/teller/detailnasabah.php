<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-header">
                <h2 class="page-title text-center"><?= $judul; ?></h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="content">
                        <div class="head">
                            <h5 class="text-center">Data Nasabah <?= $nasabah['nama'] ?></h5>
                            <a href="<?= base_url('admin/nasabah') ?>">
                                <h6 class="text-center text-primary">Kembali</h6>
                            </a>
                        </div>
                        <div class="canvas-wrapper">
                            <table class="table no-margin bg-lighter-grey">
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
                                    <td>: <span class="badge badge-primary"><?= $nasabah['ket_transaksi'] ?></span></td>
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
            </div>
        </div>
    </div>
</div>