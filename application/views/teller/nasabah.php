<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-header">
                <h2 class="page-title text-center"><?= $judul; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="content">
                        <div class="head">
                            <h5 class="mb-0">Data Nasabah</h5>
                            <p class="text-muted mb-0">Pendataan Nasabah BCA</p>
                            <a href="<?= base_url('admin/tambahnasabah') ?>" class="badge badge-primary mb-3" data-toggle="modal" data-target="#exampleModal">+ Input Nasabah</a>
                            <?= validation_errors(); ?>
                            <?php if ($this->session->flashdata('message')) : ?>
                                <?= $this->session->flashdata('message'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="canvas-wrapper">
                            <table class="table no-margin bg-lighter-grey" id="datatables">
                                <thead class="success">
                                    <tr>
                                        <th>#</th>
                                        <th>NIK/No.Rek</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Transaksi</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($nasabah as $n) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $n['nik_norek'] ?></td>
                                            <td><?= $n['nama'] ?></td>
                                            <td><?= $n['jenis_kelamin'] ?></td>
                                            <td><?= $n['ket_transaksi'] ?></td>
                                            <td><?= $n['tgl_masuk'] ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/detailnasabah/' . $n['nik_norek']) ?>" class="badge badge-warning"><span class="fas fa-eye"></span></a>
                                                <a href="<?= base_url('admin/ubahnasabah/' . $n['id_nasabah']) ?>" class="badge badge-primary"><span class="fas fa-pen"></span></a>
                                                <a href="<?= base_url('admin/hapusnasabah/' . $n['id_nasabah']) ?>" onclick="return confirm('Apakah anda yakin?')" class="badge badge-danger"><span class="fas fa-trash"></span></a>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nasabah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/nasabah') ?>" method="post">
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