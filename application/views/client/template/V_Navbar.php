<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="<?= base_url() ?>client/search/basic">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search book..."
                    aria-label="Search" aria-describedby="basic-addon2" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="btn-filter-search" data-toggle="modal"
                        data-target="#exampleModal">
                        <i class="fas fa-filter fa-sm"></i> <small>Filter By</small>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <?php
                    if($this->session->userdata("user_id")){
                ?>
                    <a class="nav-link" href="#" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <?= $this->session->userdata("first_name") ?> <?= $this->session->userdata("last_name") ?>
                        </span>
                        <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/img/undraw_profile.svg">
                    </a>
                <?php } else {?>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link" href="<?= base_url() ?>login">
                            <button type="button" class="btn btn-sm btn-primary btn-rounded"><i class="fas fa-sign-in-alt fa-fw"></i> Login</button>
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link" href="<?= base_url() ?>register">
                            <button type="button" class="btn btn-sm btn-primary btn-rounded"><i class="fas fa-plus-circle fa-fw"></i> Register</button>
                        </a>
                    </li>
                <?php } ?>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">