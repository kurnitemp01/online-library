<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Book Monitoring</h1>
    <div>
        <a href="<?= base_url() ?>admin/book-management/create"
            class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fa fa-fw fa-plus"></i>Add New Book
        </a>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow">
            <div class="card-body">

                <table class="table table-responsive table-striped" style="display: table;"
                    id="tbl-user-monitoring">
                    <thead>
                        <tr class="bg-info">
                            <th width="5%" class="text-white text-center">No</th>
                            <th width="25%" class="text-white text-center">Book Title</th>
                            <th width="20%" class="text-white text-center">Book Type</th>
                            <th width="8%" class="text-white text-center">Cover</th>
                            <th width="10%" class="text-white text-center">Year</th>
                            <th width="12%" class="text-white text-center">Author</th>
                            <th width="25%" class="text-white text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $counter = 0;
                            foreach ($books as $key => $book) {
                                $counter = $counter + 1;
                        ?>
                        <tr>
                            <td class="text-center"><?= $counter ?></td>
                            <td class="text-center"><?= $book["book_name"] ?></td>
                            <td class="text-center" style="text-transform: capitalize"><?= $book["book_type"] ?></td>
                            <td class="text-center">
                                <button class="btn btn-success btn-sm btn-rounded" type="buttton" data-toggle="modal" data-target="#mdl-book-view-cover-<?= $book['book_code'] ?>">View</button>
                            </td>
                            <td class="text-center"><?= $book["book_year"] ?></td>
                            <td class="text-center"><?= $book["author_name"] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url() ?>admin/book-management/view/<?= $book['book_id'] ?>" class="btn btn-primary btn-sm btn-rounded" type="buttton">View</a>
                                <a href="<?= base_url() ?>admin/book-management/update/<?= $book['book_id'] ?>" class="btn btn-warning btn-sm btn-rounded" type="buttton">Edit</a>
                                <a href="<?= base_url() ?>admin/book-management/delete/<?= $book['book_id'] ?>" class="btn btn-danger btn-sm btn-rounded" type="buttton">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php 
    foreach ($books as $key => $book) {
?>
    <div class="modal fade" id="mdl-book-view-cover-<?= $book['book_code'] ?>" tabindex="-1" role="dialog" aria-labelledby="mdl-book-view-cover-<?= $book['book_code'] ?>"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title crop-text-1" id="exampleModalLabel">Cover <?= $book["book_name"] ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <img src="<?= base_url() ?>assets/img/book/<?= $book['cover'] ?>" style="width:150px; height: 240px;">
                    </center>
                </div>
            </div>
        </div>
    </div>
<?php } ?>