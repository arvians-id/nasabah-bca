<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>assets/img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/favicon-16x16.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <title>Verifikasi NIK/No Rekening</title>
    <style>
        #formlogin {
            outline: 0;
            border-width: 0 0 2px;
            border-color: blue
        }

        #formlogin:focus {
            border-color: green
        }
    </style>
</head>

<body>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="row justify-content-center">
            <div class="card card0 border-0">
                <div class="row d-flex">
                    <div class="col-lg">
                        <div class="card2 card border-0 px-4 py-5">
                            <a href="<?= base_url() ?>" class="text-center">
                                <img src="<?= base_url() ?>assets/img/bca.png" style="margin-left:0px" class="logo">
                            </a>
                            <?= $this->session->flashdata('message'); ?>
                            <form method="post">
                                <div class="row px-3 mb-3">
                                    <label class="mb-1 mt-3">
                                        <h6 class="mb-0 text-sm">Keterangan Transaksi</h6>
                                    </label>
                                    <select name="perihal" class="form-control" id="formlogin" required>
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="Setoran">Setoran</option>
                                        <option value="Tarikan">Tarikan</option>
                                        <option value="Pemindahan">Pemindahan</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div id="nominal"></div>
                                <div class="row mb-3 px-3">
                                    <button type="submit" class="btn btn-blue text-center">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-blue py-4">
                    <div class="row px-3">
                        <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; <?= date('Y') ?>. All rights reserved.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('[name="perihal"]').on('change', function() {
                if ($(this).val() == 'Lainnya') {
                    $('#nominal').html(`
                                <div class="row px-3 mb-3">
                                    <label class="mb-1 mt-3">
                                        <h6 class="mb-0 text-sm">Keterangan Transaksi</h6>
                                    </label>
                                    <textarea type="text" name="perihal_lainnya" id="formlogin" required></textarea>
                                </div>`)
                } else if ($(this).val() == 'Tarikan') {
                    $('#nominal').html(`
                                <div class="row px-3 mb-3">
                                    <label class="mb-1 mt-3">
                                        <h6 class="mb-0 text-sm">Nominal</h6>
                                    </label>
                                    <input type="number" name="nominal" placeholder="Enter a nominal" id="formlogin" required>
                                </div>`)
                } else {
                    $('#nominal').html(`
                                <div class="row px-3 mb-3">
                                    <label class="mb-1 mt-3">
                                        <h6 class="mb-0 text-sm">Nominal</h6>
                                    </label>
                                    <input type="number" name="nominal" placeholder="Enter a nominal" id="formlogin" required>
                                </div>
                                <div class="row px-3 mb-3">
                                    <label class="mb-1 mt-3">
                                        <h6 class="mb-0 text-sm">No Rekening</h6>
                                    </label>
                                    <input type="text" name="no_rekening" placeholder="Enter a account number" id="formlogin" required>
                                </div>
                                <div class="row px-3 mb-3">
                                    <label class="mb-1 mt-3">
                                        <h6 class="mb-0 text-sm">Nama Nasabah Penerima</h6>
                                    </label>
                                    <input type="text" name="nama_pemegang_rekening" placeholder="Enter a name" id="formlogin" required>
                                </div>`)
                }
            })
        })
    </script>
</body>

</html>