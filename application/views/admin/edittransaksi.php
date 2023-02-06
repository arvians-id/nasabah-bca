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
                                    <label for="perihal">Keterangan Transaksi</label>
                                    <select name="perihal" class="form-control" required>
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="Setoran" <?= $transaksi['perihal'] == "Setoran" ? "selected" : "" ?>>Setoran</option>
                                        <option value="Tarikan" <?= $transaksi['perihal'] == "Tarikan" ? "selected" : "" ?>>Tarikan</option>
                                        <option value="Pemindahan" <?= $transaksi['perihal'] == "Pemindahan" ? "selected" : "" ?>>Pemindahan</option>
                                        <option value="Lainnya" <?= !in_array($transaksi['perihal'], ['Setoran', 'Tarikan', 'Pemindahan']) ? "selected" : "" ?>>Lainnya</option>
                                    </select>
                                </div>
                                <div id="nominal"></div>
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
        if ($('select[name="perihal"] option').filter(':selected').val() == 'Lainnya') {
            $('#nominal').html(`
                                <div class="form-group">
                                    <label for="nik_norek">Keterangan Transaksi</label>
                                    <input type="text" name="perihal_lainnya" placeholder="Masukkan Keterangan Transaksi" class="form-control" value="<?= $transaksi['perihal'] ?>" required>
                                </div>`)
        } else if ($('select[name="perihal"] option').filter(':selected').val() == 'Tarikan') {
            $('#nominal').html(`
                                <div class="form-group">
                                    <label for="nik_norek">Nominal</label>
                                    <input type="text" name="nominal" id="inputNumber" placeholder="Masukkan Nominal" class="form-control" value="<?= $transaksi['nominal'] == 0 ? '' : $transaksi['nominal'] ?>" required>
                                </div>`)

            var input = document.getElementById("inputNumber");
            input.addEventListener("change", function() {
                this.value = this.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            });
        } else {
            $('#nominal').html(`
                                <div class="form-group">
                                    <label for="nik_norek">Nominal</label>
                                    <input type="text" name="nominal" id="inputNumber" placeholder="Masukkan Nominal" class="form-control"  value="<?= $transaksi['nominal'] == 0 ? '' : $transaksi['nominal'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik_norek">No Rekening Penerima</label>
                                    <input type="text" name="no_rekening" placeholder="Masukkan No Rekening Penerima" class="form-control"  value="<?= $transaksi['no_rekening'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik_norek">Nama Nasabah Penerima</label>
                                    <input type="text" name="nama_pemegang_rekening" placeholder="Masukkan Nama Nasabah Penerima" class="form-control"  value="<?= $transaksi['nama_pemegang_rekening'] ?>" required>
                                </div>`)

            var input = document.getElementById("inputNumber");
            input.addEventListener("change", function() {
                this.value = this.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            });
        }

        $('[name="perihal"]').on('change', function() {
            if ($(this).val() == 'Lainnya') {
                $('#nominal').html(`
                                <div class="form-group">
                                    <label for="nik_norek">Keterangan Transaksi</label>
                                    <input type="text" name="perihal_lainnya" placeholder="Masukkan Keterangan Transaksi" class="form-control" value="${$(this).val() != 'Lainnya' ? '<?= $transaksi['perihal'] ?>' : ''}" required>
                                </div>`)
            } else if ($(this).val() == 'Tarikan') {
                $('#nominal').html(`
                                <div class="form-group">
                                    <label for="nik_norek">Nominal</label>
                                    <input type="text" name="nominal" id="inputNumber" placeholder="Masukkan Nominal" class="form-control" value="<?= $transaksi['nominal'] == 0 ? '' : $transaksi['nominal'] ?>" required>
                                </div>`)

                var input = document.getElementById("inputNumber");
                input.addEventListener("change", function() {
                    this.value = this.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                });
            } else {
                $('#nominal').html(`
                                <div class="form-group">
                                    <label for="nik_norek">Nominal</label>
                                    <input type="text" name="nominal" id="inputNumber" placeholder="Masukkan Nominal" class="form-control" value="<?= $transaksi['nominal'] == 0 ? '' : $transaksi['nominal'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik_norek">No Rekening Penerima</label>
                                    <input type="text" name="no_rekening" placeholder="Masukkan No Rekening Penerima" class="form-control"  value="<?= $transaksi['no_rekening'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik_norek">Nama Nasabah Penerima</label>
                                    <input type="text" name="nama_pemegang_rekening" placeholder="Masukkan Nama Nasabah Penerima" class="form-control"  value="<?= $transaksi['nama_pemegang_rekening'] ?>" required>
                                </div>`)

                var input = document.getElementById("inputNumber");
                input.addEventListener("change", function() {
                    this.value = this.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                });
            }
        })
    })
</script>