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
                            <form action="<?= base_url('teller/ubahnasabah/' . $nasabah['id_nasabah']) ?>" method="post">
                                <div class="form-group">
                                    <label for="id_nasabah">Id Nasabah</label>
                                    <input type="text" name="id_nasabah" class="form-control" value="<?= $nasabah['id_nasabah'] ?>" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nik_norek">Nik/No.Rekening</label>
                                    <input type="text" name="nik_norek" class="form-control" value="<?= $nasabah['nik_norek'] ?>" required>
                                    <?= form_error('nik_norek', '<small class="text-danger ml-2">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" placeholder="Masukkan nama" class="form-control" value="<?= $nasabah['nama'] ?>" required>
                                    <?= form_error('nama', '<small class="text-danger ml-2">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="Laki-laki" <?= $nasabah['jenis_kelamin'] == "Laki-laki" ? "selected" : "" ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= $nasabah['jenis_kelamin'] == "Perempuan" ? "selected" : "" ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" placeholder="Alamat" class="form-control"><?= $nasabah['alamat'] ?></textarea>
                                    <?= form_error('alamat', '<small class="text-danger ml-2">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No Telepon</label>
                                    <input type="text" name="no_telp" placeholder="Masukkan No. Telepon" class="form-control" value="<?= $nasabah['no_telp'] ?>" required>
                                    <?= form_error('no_telp', '<small class="text-danger ml-2">', '</small>') ?>
                                </div>
                                <fieldset class="form-group row">
                                    <legend class="col-form-label col-sm-3 float-sm-left pt-0">Produk yang ditawarkan</legend>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="product_offered" id="product_offered1" value="KKB" <?= ($nasabah['product_offered'] == 'KKB') ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="product_offered1">
                                                KKB
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="product_offered" id="product_offered2" value="Asuransi" <?= ($nasabah['product_offered'] == 'Asuransi') ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="product_offered2">
                                                Asuransi
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="product_offered" id="product_offered3" value="KSM" <?= ($nasabah['product_offered'] == 'KSM') ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="product_offered3">
                                                KSM
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="product_offered" id="product_offered4" value="Kredit" <?= ($nasabah['product_offered'] == 'Kredit') ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="product_offered4">
                                                Kredit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="product_offered" id="product_offered5" value="Kartu Kredit" <?= ($nasabah['product_offered'] == 'Kartu Kredit') ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="product_offered5">
                                                Kartu Kredit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="text" name="product_offered1" id="product_offered6" value="<?= in_array($nasabah['product_offered'], ['KKB', 'Asuransi', 'KSM', 'Kredit', 'Kartu Kredit']) ? '' : $nasabah['product_offered'] ?>" placeholder="lain-lain...">
                                        </div>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>