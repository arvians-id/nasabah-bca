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
                            <form method="post">
                                <div class="form-group">
                                    <label for="id_nasabah">Id Nasabah</label>
                                    <input type="text" name="id_nasabah" class="form-control" value="<?= $idnasabah ?>" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nik_norek">Nik/No.Rekening</label>
                                    <input type="text" name="nik_norek" placeholder="Masukkan Nik / No. Rekening" class="form-control" value="<?= $nik_norek ?>" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" placeholder="Masukkan nama" class="form-control" value="<?= set_value('nama') ?>" required>
                                    <?= form_error('nama', '<small class="text-danger ml-2">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" placeholder="Alamat" class="form-control" required><?= set_value('alamat') ?></textarea>
                                    <?= form_error('alamat', '<small class="text-danger ml-2">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No Telepon</label>
                                    <input type="text" name="no_telp" placeholder="Masukkan No. Telepon" class="form-control" value="<?= set_value('no_telp') ?>" required>
                                    <?= form_error('no_telp', '<small class="text-danger ml-2">', '</small>') ?>
                                </div>
                                <fieldset class="form-group row">
                                    <legend class="col-form-label col-sm-3 float-sm-left pt-0">Produk yang ditawarkan</legend>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="product_offered" id="product_offered1" value="KKB">
                                            <label class="form-check-label" for="product_offered1">
                                                KKB
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="product_offered" id="product_offered2" value="Asuransi">
                                            <label class="form-check-label" for="product_offered2">
                                                Asuransi
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="product_offered" id="product_offered3" value="KSM">
                                            <label class="form-check-label" for="product_offered3">
                                                KSM
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="product_offered" id="product_offered4" value="Kredit">
                                            <label class="form-check-label" for="product_offered4">
                                                Kredit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="product_offered" id="product_offered5" value="Kartu Kredit">
                                            <label class="form-check-label" for="product_offered5">
                                                Kartu Kredit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="text" name="product_offered1" id="product_offered6" placeholder="lain-lain...">
                                        </div>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>