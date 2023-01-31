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
                                    <label for="perihal">Perihal</label>
                                    <select name="perihal" class="form-control" required>
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="Setoran">Setoran</option>
                                        <option value="Tarikan">Tarikan</option>
                                        <option value="Pemindahan">Pemindahan</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div id="nominal"></div>
                                <div class="form-group">
                                    <label for="no_rekening">Nik/No.Rekening</label>
                                    <input type="text" name="no_rekening" placeholder="Masukkan Nik / No. Rekening" class="form-control">
                                    <?= form_error('no_rekening', '<small class="text-danger ml-2">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pemegang_rekening">Pemegang Atas Nama Rekening</label>
                                    <input type="text" class="form-control" name="nama_pemegang_rekening" placeholder="Masukkan Pemegang Rekening" required>
                                    <?= form_error('nama_pemegang_rekening', '<small class="text-danger ml-2">', '</small>') ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('[name="perihal"]').on('change', function() {
            if ($(this).val() == 'Lainnya') {
                $('#nominal').html(`
                                <div class="form-group">
                                    <label for="nik_norek">Perihal Lainnya</label>
                                    <input type="text" name="perihal_lainnya" placeholder="Masukkan Perihal Nasabah" class="form-control" required>
                                </div>
                                `)
            } else {
                $('#nominal').html(`
                                <div class="form-group">
                                    <label for="nik_norek">Nominal</label>
                                    <input type="text" name="nominal" placeholder="Masukkan Nominal" class="form-control" required>
                                </div>
                                `)
            }
        })
    })
</script>