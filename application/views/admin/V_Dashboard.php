<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">                        

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            Total Books</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $total_book ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                            Registered Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_user ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                            Total Trx
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_trx ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                            Due Trx
                            <span
                                class="text-xs font-weight-bold text-gray-500 text-uppercase mb-1">(<?= $total_trx_due ?>/<?= $total_trx ?>)</span>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $due_percentage ?>%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-danger" role="progressbar"
                                        style="width: <?= $due_percentage ?>%" aria-valuenow="<?= $due_percentage ?>" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Transactions Overview</h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Top 5 Book Type Borrowed</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle" style="color: #4e73df"></i> Women
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle" style="color: #1cc88a"></i> Sports
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle" style="color: #36b9cc"></i> Horror
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle" style="color: #cf2e2e"></i> Humor
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle" style="color: #a4cf2e"></i> Gore
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mb-4 mt-4">
    <h4 class="h4 mb-0 text-gray-800">Top 10 Book</h4>
</div>

<!-- Just for you : Book -->
<div class="row">
    <div class="owl-carousel owl-theme">
    <?php 
        $counter = 0;
        foreach ($books as $key => $book) { 
            if ($book["stock"] > 0) {
                $available = "available";
            } else {
                $available = "not available";
            }
            $counter = $counter + 1;
        ?>
                
            <div class="mt-2 mb-2">
                <center>
                    <div class="custom-card">
                        <div class="image-container">
                            <div class="first">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="discount" style="visibility: hidden">-25%</span>
                                    <span class="wishlist"><?= $counter ?></span>
                                </div>
                            </div>
                            <center>
                                <img class="pt-2" src="<?= base_url() ?>assets/img/book/<?= $book['cover'] ?>"
                                    class="img-fluid rounded thumbnail-image" style="width:100px; height: 160px;">
                            </center>
                        </div>

                        <div class="product-detail-container p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="dress-name crop-text-2"><?= $book["book_name"] ?></h5>
                                <div class="d-flex flex-column mb-2">
                                    <span class="new-price <?= $available ?>" style="text-transform: capitalize;"><?= $available ?></span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center pt-1">
                                <div class="color-select d-flex">
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center pt-1">
                                <div>
                                    <span class="new-price crop-text-1"><?= $book["author_name"] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="card voutchers">
                            <div class="voutcher-divider">
                                <div class="voutcher-left text-center">
                                    <span class="voutcher-name">Book Type</span>
                                    <h5 class="voutcher-code">
                                        <span class="crop-text-1"><?= $book["book_type"] ?></span>
                                    </h5>
                                </div>
                                <a href="<?= base_url() ?>client/book-detail/<?= $book['book_code'] ?>"
                                    class="voutcher-right text-center border-left justify-content-center">
                                    <span class="off">Read It</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </center>

            </div>

        <?php } ?>

    </div>
</div>