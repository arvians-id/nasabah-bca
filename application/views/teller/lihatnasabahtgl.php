<div class="content">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="my-auto">
                                Data Transaksi
                            </div>
                            <div>
                                <span class="btn btn-secondary font-weight-bold btn-disabled">
                                    <?= $this->input->post('daritgl') . ' <i class="fa fa-minus"></i> ' . $this->input->post('sampaitgl') ?>
                                </span>
                                <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary text-white"><i class="fas fa-calendar"></i> Pilih Tanggal Kembali</a>
                                <button class="btn btn-secondary" onclick="printTable()">Print Seluruh Table</button>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="canvas-wrapper table-responsive">
                            <table class="table table-bordered no-margin bg-lighter-grey" border="1" id="datatables">
                                <thead class="success">
                                    <tr>
                                        <th>#</th>
                                        <th>ID Nasabah</th>
                                        <th>NIK/No.Rek</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nominal</th>
                                        <th>Keterangan Transaksi</th>
                                        <th>Produk yang Ditawarkan</th>
                                        <th>Tanggal Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($nasabah_bytgl as $n) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $n['id_nasabah'] ?></td>
                                            <td><?= $n['nik_norek'] ?></td>
                                            <td><?= $n['nama'] ?></td>
                                            <td><?= $n['jenis_kelamin'] ?></td>
                                            <td style="text-align: center;"><?= $n['nominal'] == null ? '-' : 'Rp.' . number_format($n['nominal'], 2, ',', '.')  ?></td>
                                            <td style="text-align: center;"><?= $n['perihal'] == null ? '-' : $n['perihal'] ?></td>
                                            <td style="text-align: center;"><?= $n['produk'] == null ? '-' : $n['produk']  ?></td>
                                            <td><?= $n['tanggal_transaksi'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="8" style="text-align: right;"><strong>Jumlah Transaksi</strong></td>
                                        <td><?= count($nasabah_bytgl) ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" style="text-align: right;"><strong>Jumlah Nasabah</strong></td>
                                        <td><?= $nasabah_bytgl_numrows; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" style="text-align: right;"><strong>Jumlah Setoran</strong></td>
                                        <td>Rp <?= $jumlah_setoran == null ? 0 : $jumlah_setoran; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" style="text-align: right;"><strong>Jumlah Tarikan</strong></td>
                                        <td>Rp <?= $jumlah_tarikan == null ? 0 : $jumlah_tarikan; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" style="text-align: right;"><strong>Jumlah Pemindahan</strong></td>
                                        <td>Rp <?= $jumlah_pemindahan == null ? 0 : $jumlah_pemindahan; ?></td>
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
            <form action="<?= base_url() ?>teller/lihatnasabahtgl" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="daritgl">Dari Tanggal</label>
                        <input type="date" name="daritgl" id="daritgl" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sampaitgl">Sampai Tanggal</label>
                        <input type="date" name="sampaitgl" id="sampaitgl" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-danger text-white">Cari</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function printTable() {
        var divToPrint = document.getElementById("datatables");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }
</script>