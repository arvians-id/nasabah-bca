<div class="content">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <?= $judul; ?>
                    </div>
                    <div class="content">
                        <div class="head">
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
                                        <th>Nominal</th>
                                        <th>Keterangan Transaksi</th>
                                        <th>No Rekening Penerima</th>
                                        <th>Nama Nasabah Penerima</th>
                                        <th>Produk yang Ditawarkan</th>
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
                                            <td class="text-center"><?= $t['perihal'] == null ? '-' : $t['perihal']  ?></td>
                                            <td class="text-center"><?= $t['no_rekening'] == null ? '-' : $t['no_rekening']   ?></td>
                                            <td class="text-center"><?= $t['nama_pemegang_rekening'] == null ? '-' : $t['nama_pemegang_rekening']  ?></td>
                                            <td style="text-align: center;"><?= $t['product_offered'] == null ? '-' : $t['product_offered'] ?></td>
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