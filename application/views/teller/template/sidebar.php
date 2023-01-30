<div class="wrapper">
    <nav id="sidebar" class="active">
        <div class="sidebar-header">
            <img src="<?= base_url() ?>assets/img/bca.png" alt="bootraper logo" width="115px" class="app-logo">
        </div>
        <ul class="list-unstyled components text-secondary">
            <li>
                <a href="<?= base_url() ?>admin"><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?= base_url() ?>admin/nasabah"><i class="fas fa-file-alt"></i> Nasabah</a>
            </li>
            <!-- <li>
                <a href="#uielementsmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-layer-group"></i> UI Elements</a>
                <ul class="collapse list-unstyled" id="uielementsmenu">
                    <li>
                        <a href="ui-buttons.html"><i class="fas fa-angle-right"></i> Buttons</a>
                    </li>
                    <li>
                        <a href="ui-badges.html"><i class="fas fa-angle-right"></i> Badges</a>
                    </li>
                    <li>
                        <a href="ui-cards.html"><i class="fas fa-angle-right"></i> Cards</a>
                    </li>
                    <li>
                        <a href="ui-alerts.html"><i class="fas fa-angle-right"></i> Alerts</a>
                    </li>
                    <li>
                        <a href="ui-tabs.html"><i class="fas fa-angle-right"></i> Tabs</a>
                    </li>
                    <li>
                        <a href="ui-date-time-picker.html"><i class="fas fa-angle-right"></i> Date & Time Picker</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#authmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Authentication</a>
                <ul class="collapse list-unstyled" id="authmenu">
                    <li>
                        <a href="login.html"><i class="fas fa-lock"></i> Login</a>
                    </li>
                    <li>
                        <a href="signup.html"><i class="fas fa-user-plus"></i> Signup</a>
                    </li>
                    <li>
                        <a href="forgot-password.html"><i class="fas fa-user-lock"></i> Forgot password</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#pagesmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-copy"></i> Pages</a>
                <ul class="collapse list-unstyled" id="pagesmenu">
                    <li>
                        <a href="blank.html"><i class="fas fa-file"></i> Blank page</a>
                    </li>
                    <li>
                        <a href="404.html"><i class="fas fa-info-circle"></i> 404 Error page</a>
                    </li>
                    <li>
                        <a href="500.html"><i class="fas fa-info-circle"></i> 500 Error page</a>
                    </li>
                </ul>
            </li> -->
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