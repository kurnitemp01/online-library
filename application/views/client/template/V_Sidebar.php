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
                <a class="nav-link" href="<?= base_url()?>client/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home Page </span></a>
            </li>

            <!-- Nav Item - My Collections> -->
            <li class="nav-item <?php if ($page == 'my_collection'){echo 'active';}?>">
                <a class="nav-link" href="<?= base_url()?>client/my-collection">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>My Collections</span></a>
            </li>

            <!-- Nav Item - My Profile -->
            <li class="nav-item <?php if ($page == 'profile'){echo 'active';}?>">
                <a class="nav-link" href="<?= base_url()?>client/profile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>My Profile</span></a>
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