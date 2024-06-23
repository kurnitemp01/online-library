<?php

    $book_type_id = "";
    $book_type_name = "";
    $description = "";
    $url = base_url() . "admin/book-type-management/create";

    if ($book_type){
        $book_type_id = $book_type["book_type_id"];
        $book_type_name = $book_type["book_type_name"];
        $description = $book_type["description"];
        $url = base_url() . "admin/book-type-management/update/" . $book_type_id;
    }

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Book Type Management</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12 mb-2">
        <div class="card shadow">
            <form action="<?= $url ?>" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-md-2 col-form-label">Book Type Name</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Book Type Name" value="<?= $book_type_name ?>" name="book_type_name">
                        </div>
                        <label for="staticEmail" class="col-md-2 col-form-label">Description</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Description" value="<?= $description ?>" name="description">
                        </div>
                    </div>
                    <div class="row justify-content-center pt-3">
                        <button class="btn btn-sm btn-primary" type="submit">Save <i class="fa fa-fw fa-save"></i></button>
                        <button class="btn btn-sm btn-danger ml-3">Clear <i class="fa fa-fw fa-window-close"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                    <table class="table table-responsive table-striped" style="display: table;"
                        id="tbl-user-monitoring">
                        <thead>
                            <tr class="bg-info">
                                <th width="5%" class="text-white text-center">No</th>
                                <th width="15%" class="text-white text-center">Book Type</th>
                                <th width="15%" class="text-white text-center">Description</th>
                                <th width="15%" class="text-white text-center">Creation Date</th>
                                <th width="15%" class="text-white text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $counter = 0;
                                foreach ($book_types as $key => $book_type) {
                                    $counter += 1;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $counter ?></td>
                                    <td class="text-center"><?= $book_type['book_type_name'] ?></td>
                                    <td class="text-center crop-text-2"><?= $book_type['description'] ?></td>
                                    <td class="text-center"><?= $book_type['creation_date'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url() ?>admin/book-type-management/update/<?= $book_type['book_type_id'] ?>" class="btn btn-warning btn-sm btn-rounded">Edit</a>
                                        <a href="<?= base_url() ?>admin/book-type-management/delete/<?= $book_type['book_type_id'] ?>" class="btn btn-danger btn-sm btn-rounded">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>