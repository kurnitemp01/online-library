<div class="row mb-3">
    <label class="col-form-label">Filter By </label>
    <?php foreach ($keyword as $key => $value) {
        if (!empty($value)){
    ?>
        <button class="btn btn-outline-primary btn-sm rounded ml-3" disabled><?= $value ?></button>
    <?php }} ?>
    
    <label class="col-form-label ml-3">
        <a href="#" class="text-gray-800">Reset Filter</a>
    </label>
    <label class="col-form-label ml-3">
        <a href="#" class="text-gray-800">Add Filter</a>
    </label>
</div>

<div class="row">
    
    <?php 
        foreach ($books as $key => $book) { 
            if ($book["stock"] > 0) {
                $available = "available";
            } else {
                $available = "not available";
            }
    ?>

    <div class="mt-2 mb-2 col-md-3">
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