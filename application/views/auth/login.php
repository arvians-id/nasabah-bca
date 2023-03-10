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
    <title>Login Page</title>
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
                            <div class="mt-3">
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                            <form action="<?= base_url() ?>login" method="post">
                                <div class="row px-3 mb-3">
                                    <label class="mb-1 mt-3">
                                        <h6 class="mb-0 text-sm">Username</h6>
                                    </label> <input type="text" name="username" placeholder="Enter a username" id="formlogin">
                                    <?= form_error('username', '<small class="text-danger ml-2">', '</small>') ?>
                                </div>
                                <div class="row px-3 mb-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Password</h6>
                                    </label> <input type="password" name="password" placeholder="Enter password" id="formlogin">
                                    <?= form_error('password', '<small class="text-danger ml-2">', '</small>') ?>
                                </div>
                                <div class="row mb-1 px-3">
                                    <button type="submit" class="btn btn-blue text-center">Login</button>
                                </div>
                                <a href="<?= base_url() ?>nasabah/verifikasi">
                                    Daftar Nasabah Baru Disini!
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-blue py-4">
                    <div class="row">
                        <small class="mx-auto">Copyright &copy; <?= date('Y') ?>. All rights reserved.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>