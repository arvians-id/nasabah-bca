<div class="content">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <?= $judul; ?>
                    </div>
                    <div class="content">
                        <div class="head mb-3">
                            <?php if ($this->session->flashdata('message')) : ?>
                                <?= $this->session->flashdata('message'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="canvas-wrapper">
                            <table class="table no-margin bg-lighter-grey" id="datatables">
                                <thead class="success">
                                    <tr>
                                        <th>#</th>
                                        <th>ID Nasabah</th>
                                        <th>Nominal</th>
                                        <th>Perihal</th>
                                        <th>No Rekening - Nama</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($transaksi as $t) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $t['nasabah_id'] ?></td>
                                            <td class="text-center"><?= $t['nominal'] == null ? '-' : $t['nominal'] ?></td>
                                            <td><?= $t['perihal'] ?></td>
                                            <td><?= $t['no_rekening'] . ' - ' . $t['nama_pemegang_rekening'] ?></td>
                                            <td><?= $t['tanggal_transaksi'] ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/ubahtransaksi/' . $t['id_transaksi']) ?>" class="badge badge-primary"><span class="fas fa-pen"></span></a>
                                                <a href="<?= base_url('admin/hapustransaksi/' . $t['id_transaksi']) ?>" onclick="return confirm('Apakah anda yakin?')" class="badge badge-danger"><span class="fas fa-trash"></span></a>
                                            </td>
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