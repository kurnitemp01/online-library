<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar Start -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-Library</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($page == 'dashboard'){echo 'active';}?>">
                <a class="nav-link" href="<?= base_url() ?>admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($page == 'ahp'){echo 'active';}?>">
                <a class="nav-link" href="<?= base_url() ?>admin/show-book-rate-calculation">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>AHP</span></a>
            </li>

            <!-- Nav Item - Transaction Management -->
            <li class="nav-item <?php if ($page == 'trx-management'){echo 'active';}?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_trx"
                    aria-expanded="true" aria-controls="collapse_user">
                    <i class="fas fa-layer-group"></i>
                    <span>Trx Management</span>
                </a>
                <div id="collapse_trx" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="<?= base_url() ?>admin/trx-management/monitoring">Monitoring</a>
                        <a class="collapse-item" href="<?= base_url() ?>admin/trx-management/need-approval">Need Approval</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - User Management> -->
            <li class="nav-item <?php if ($page == 'user-management'){echo 'active';}?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_user"
                    aria-expanded="true" aria-controls="collapse_user">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User Management</span>
                </a>
                <div id="collapse_user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="<?= base_url() ?>admin/user-management/monitoring">Monitoring</a>
                        <a class="collapse-item" href="<?= base_url() ?>admin/user-management/create">Create</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Book Management> -->
            <li class="nav-item <?php if ($page == 'book-management'){echo 'active';}?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_book"
                    aria-expanded="true" aria-controls="collapse_book">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Book Management</span>
                </a>
                <div id="collapse_book" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="<?= base_url() ?>admin/book-management/monitoring">Monitoring</a>
                        <a class="collapse-item" href="<?= base_url() ?>admin/book-management/create">Create</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Book Type Management -->
            <li class="nav-item <?php if ($page == 'book-type-management'){echo 'active';}?>">
                <a class="nav-link" href="<?= base_url() ?>admin/book-type-management/create">
                    <i class="fas fa-fw fa-book-reader"></i>
                    <span>Book Type Management</span></a>
            </li>

            <!-- Nav Item - Penalty Management -->
            <li class="nav-item <?php if ($page == 'penalty-management'){echo 'active';}?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_penalty"
                    aria-expanded="true" aria-controls="collapse_penalty">
                    <i class="fas fa-fw fa-gavel"></i>
                    <span>Penalty Management</span>
                </a>
                <div id="collapse_penalty" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="<?= base_url() ?>admin/penalty-management/monitoring">Monitoring</a>
                        <a class="collapse-item" href="<?= base_url() ?>admin/penalty-management/create">Create</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>logout">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->