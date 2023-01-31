<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <img src="<?= base_url() ?>assets/img/bca.png" alt="bootraper logo" width="115px" class="app-logo">
        </div>
        <ul class="list-unstyled components text-secondary">
            <li>
                <a href="<?= base_url() ?>admin" <?= in_array($this->uri->segment(2), ['', 'lihatnasabahtgl']) ? 'class="active"' : '' ?>><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?= base_url() ?>admin/nasabah" <?= in_array($this->uri->segment(2), ['nasabah', 'detailnasabah', 'ubahnasabah', 'create_transaksi', 'final_transaksi']) ? 'class="active"' : '' ?>><i class="fas fa-file-alt"></i> Nasabah</a>
            </li>
            <li>
                <a href="<?= base_url() ?>admin/transaksi" <?= in_array($this->uri->segment(2), ['transaksi', 'ubahtransaksi']) ? 'class="active"' : '' ?>><i class="fas fa-book"></i>
                    Transaksi</a>
            </li>
            <li>
                <a href="<?= base_url() ?>logout"><i class="fas fa-sign-out-alt"></i>
                    Logout</a>
            </li>
        </ul>
    </nav>
    <div id="body" class="active">
        <nav class="navbar navbar-expand-lg navbar-white bg-white">
            <button type="button" id="sidebarCollapse" class="btn btn-light"><i class="fas fa-bars"></i><span></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <div class="nav-dropdown">
                            <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Selamat datang, <?= $this->session->userdata('nama'); ?></span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                <ul class="nav-list">
                                    <li><a href="<?= base_url() ?>logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>