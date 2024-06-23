<div class="row">

    <!-- Carousel Banner Start -->
    <div class="col-xl-9 col-md-9 mb-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 rounded" src="<?= base_url() ?>assets/img/home-page/first.jpg"
                        alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 rounded" src="<?= base_url() ?>assets/img/home-page/second.webp"
                        alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 rounded" src="<?= base_url() ?>assets/img/home-page/third.jpg"
                        alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- Carousel Banner End -->

    <!-- Total Book and Book Types Start -->
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card shadow h-100">
            <div class="card-body">
                <table width="100%" height="100%">
                    <tr>
                        <td class="text-center" style="border-bottom: 2px solid #858796;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div
                                        class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Book</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?= $total_book ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book-open fa-3x text-gray-400"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-list fa-3x text-gray-400"></i>
                                </div>
                                <div class="col mr-2">
                                    <div
                                        class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Book Types</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?= $total_book_type ?>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- Total Book and Book Types End -->

</div>

<!-- Content Row : Book Types text -->
<div class="mb-4" style="margin-top: 20px;">
    <h2 class="h2 mb-0 text-gray-800 text-center">What we offer</h2>
    <h6 class="h6 mb-0 text-gray-800 text-center">
        In this session we offer <br>various types of books contained in our application
    </h6>
</div>

<!-- Content Row : Book Types -->
<div class="row mt-2 mb-4">
    <?php
        $counter = 0;
        foreach ($book_types as $key => $book_type) {
            ?>
                <div class="col-md-3 text-center">
                    <a href="<?= base_url() ?>book-type/<?= $book_type['book_type_name'] ?>">
                        <i class="custom-circle-icon fa fa-heart fa-3x text-gray-100"></i>
                    </a>
                    <h5 class="font-weight-bold mt-2" style="text-transform: capitalize">
                        <?= $book_type["book_type_name"] ?>
                    </h5>
                    <p class="crop-text-3"><?= $book_type["description"] ?></p>
                </div>      
    <?php } ?>
    
</div>

<!-- Just For you : Text -->
<div class="mb-4 mt-4">
    <h2 class="h2 mb-0 text-gray-800 text-center">Just For You</h2>
    <h6 class="h6 mb-0 text-gray-800 text-center">
        This book is recommended to you based on all<br>
        the books you have borrowed or based on the books you read the most
    </h6>
</div>

<!-- Just for you : Book -->
<div class="row">
    <div class="owl-carousel owl-theme">

        <?php foreach ($books as $key => $book) { 
            if ($book["stock"] > 0) {
                $available = "available";
            } else {
                $available = "not available";
            }
        ?>
                
            <div class="mt-2 mb-2">
                <center>
                    <div class="custom-card">
                        <div class="image-container">
                            <div class="first">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="discount" style="visibility: hidden">-25%</span>
                                    <span class="wishlist"><i class="fa fa-star" style="color: #f6c23e !important;"></i></span>
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