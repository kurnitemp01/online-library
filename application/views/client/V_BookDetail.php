<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?= base_url() ?>assets/img/book/<?= $book['cover'] ?>" alt=""
                            class="rounded img-thumbnail mx-auto d-block" style="width:100px; height: 160px;">
                    </div>
                    <div class="col-md-9">
                        <!-- book title -->
                        <h4 class="crop-text-2 font-weight-bold text-gray-900"><?= $book['book_name'] ?></h4>
                        <!-- star rating -->
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-warning fa fa-star"></i>
                        <i class="text-warning fa fa-star"></i>
                        <span class="text-gray-500">(Review 3)</span>
                        <!-- Quick Description -->
                        <p class="pt-4 pb-4 crop-text-4 text-gray-800"><?= $book["description"] ?></p>
                        <!-- Table Description -->
                        <table class="table-responsive" style="display: table">
                            <tr class="text-center">
                                <td width="33%" style="border-right: 2px solid rgb(180, 180, 180);"
                                    class="font-weight-bold text-gray-900">Availability</td>
                                <td width="33%" style="border-right: 2px solid rgb(180, 180, 180);"
                                    class="font-weight-bold text-gray-900">Tags</td>
                                <td width="33%" class="font-weight-bold text-gray-800">Product Code
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td style="border-right: 2px solid rgb(180, 180, 180);"
                                    class="text-gray-800"><?= $book["stock"] ?> pieces in stock</td>
                                <td style="border-right: 2px solid rgb(180, 180, 180); text-transform: capitalize;"
                                    class="text-gray-800 crop-text-1"><?= $book["book_type"] ?></td>
                                <td class="text-gray-800"><?= $book["book_code"] ?></td>
                            </tr>
                        </table>
                        <!-- Button pinjam -->
                        <button type="button" class="btn btn-outline-info mt-4" data-toggle="modal" data-target="#modal-validate-trx">Borrow
                            <i class="fa fa-shopping-bag"></i>
                        </button>
                        <button type="button" class="btn btn-outline-danger mt-4 ml-4">Share
                            <i class="fa fa-share-alt"></i>
                        </button>
                    </div>
                    <div class="col-md-12">
                        <!-- divider -->
                        <hr style="border-top: 2px solid rgb(180, 180, 180)">
                        <!-- Book description -->
                        <h5 class="text-gray-800"><u>Bo</u>ok Descriptions</h5>
                        <p class="text-gray-800"><?= $book["description"] ?></p>
                        <!-- Book Details -->
                        <h5 class="text-gray-800 mt-3"><u>Bo</u>ok Details</h5>
                        <table class="table-responsive mt-4" style="display: table">
                            <tr class="text-center">
                                <td width="33%" style="border-right: 1px solid rgb(180, 180, 180);"
                                    class="font-weight-bold text-gray-900">Book Title</td>
                                <td width="33%" style="border-right: 1px solid rgb(180, 180, 180);"
                                    class="font-weight-bold text-gray-900">Author</td>
                                <td width="33%" class="font-weight-bold text-gray-900">Book Type
                                </td>
                            </tr>
                            <tr>
                                <td style="border-right: 1px solid rgb(180, 180, 180);"
                                    class="text-gray-800 text-center pb-2"><?= $book["book_name"] ?></td>
                                <td style="border-right: 1px solid rgb(180, 180, 180);"
                                    class="text-gray-800 text-center pb-2"><?= $book["author_name"] ?></td>
                                <td class="text-gray-800 text-center pb-2" style="text-transform: capitalize;"><?= $book["book_type"] ?></td>
                            </tr>
                            <tr class="text-center"
                                style="border-top: 1px solid rgb(180, 180, 180);">
                                <td style="border-right: 1px solid rgb(180, 180, 180);"
                                    class="font-weight-bold text-gray-900 pt-2">Date Published</td>
                                <td style="border-right: 1px solid rgb(180, 180, 180);"
                                    class="font-weight-bold text-gray-900 pt-2">Spesification</td>
                                <td class="font-weight-bold text-gray-900 pt-2">Chapter</td>
                            </tr>
                            <tr>
                                <td style="border-right: 1px solid rgb(180, 180, 180);"
                                    class="text-gray-800 text-center"><?= $book["book_year"] ?></td>
                                <td style="border-right: 1px solid rgb(180, 180, 180);"
                                    class="text-gray-800 text-center">Hard Cover</td>
                                <td class="text-gray-800 text-center"><?= $book["page"] ?> pages</td>
                            </tr>
                        </table>
                        <!-- Book Details -->
                        <!-- <h5 class="text-gray-800 mt-3"><u>Bo</u>ok Reviews</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php 
    if($this->session->flashdata("notif")){
      echo "<script>alert('".$this->session->flashdata("notif")."')</script>";
    }
  ?>

<div class="modal fade" id="modal-validate-trx" tabindex="-1" role="dialog" aria-labelledby="modal-validate-trx"
        aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>client/search/advanced" method="post">
                <div class="modal-body">
                    <div class="col-md-12">
                        <p>Are you sure want to borrow this book?</p>
                    </div>
                    <div class="row col-md-12 text-center">
                        <a href="<?= base_url() ?>client/create-transaction/<?= $book['book_code'] ?>" class="btn btn-primary btn-sm bt-rounded">Yes</a>
                        <button class="btn btn-sm btn-rounded btn-danger ml-3" data-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </div>
            <form>
        </div>
    </div>
</div>