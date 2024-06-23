<?php

    $book_id = "";
    $creation_date = "";
    $book_name = "";
    $book_code = "";
    $description = "";
    $author_id = "";
    $book_year = "";
    $book_language = "";
    $stock = "";
    $cover = "";
    $page = "";
    $author_name = "";
    $book_type = "";
    $book_type_id = "";
    $url = base_url() . "admin/book-management/create";

    if ($book){
        $book_id = $book["book_id"];
        $creation_date = $book["creation_date"];
        $book_name = $book["book_name"];
        $book_code = $book["book_code"];
        $description = $book["description"];
        $author_id = $book["author_id"];
        $book_year = $book["book_year"]; 
        $book_language = $book["book_language"];
        $stock = $book["stock"];
        $cover = $book["cover"];
        $page = $book["page"];
        $author_name = $book["author_name"];
        $book_type = $book["book_type"];
        $book_type_id = explode(",", $book["book_type_id"]);
        $url = base_url() . "admin/book-management/update/" . $book_id;
    }

    $disabled = "";
    $page_description = "Create New Book";
    if ($process == "view"){
        $disabled = "disabled";
        $page_description = "View Book";
    } else if ($process == "update"){
        $page_description = "Edit Book";
    }

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $page_description ?></h1>
</div>

<div class="row">
    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card shadow">
            <form action="<?= $url ?>" enctype="multipart/form-data" method="post">
                <div class="card-body row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="staticEmail" class="col-md-4 col-form-label">Book Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Book Name" name="book_name" value="<?= $book_name ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Description</label>
                            <div class="col-md-8">
                                <textarea cols="30" rows="5" class="form-control" name="description" <?= $disabled ?>><?= $description ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Book Type</label>
                            <div class="col-md-8">
                                <select id="slc-book-create-type" multiple="multiple" class="form-control" data-size="6" data-live-search="true" name="book_types[]"  <?= $disabled ?>>
                                    <?php 
                                        foreach ($book_types as $key => $book_type) {
                                            $type_selected = "";
                                            if($process != "create"){
                                                if (in_array($book_type["book_type_id"], $book_type_id)){
                                                    $type_selected = "selected";
                                                }
                                            }
                                    ?>
                                        <option value="<?= $book_type['book_type_id'] ?>" style="text-transform: capitalize" <?= $type_selected ?>><?= $book_type['book_type_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Author</label>
                            <div class="col-md-8">
                                <select name="author" class="form-control" data-size="6" data-live-search="true" id="slc-book-create-author"  <?= $disabled ?>>
                                    <?php foreach ($authors as $key => $author) {
                                        $author_selected = "";
                                        if ($author["user_id"] == $author_id){
                                            $author_selected = "selected";
                                        }

                                        echo "<option value='" . $author["user_id"] . "' " . $author_selected . ">" . $author["first_name"] . " " . $author["last_name"] . "</option>";
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Book Year</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" placeholder="Book Year" name="book_year" value="<?= $book_year ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Book Language</label>
                            <div class="col-md-8 pt-2">
                                <select name="book_language" class="form-control" data-size="6" data-live-search="true" id="slc-book-create-language" <?= $disabled ?>>
                                    <?php foreach ($country_list as $key => $val) {
                                        $country_selected = "";
                                        if ($book_language == $val){
                                            $country_selected = "selected";
                                        }

                                        echo "<option " . $country_selected . " >".$val."</option>";
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Stock</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" placeholder="Stock" name="stock" value="<?= $stock ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Page</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" placeholder="Page" name="page" value="<?= $page ?>" <?= $disabled ?>>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="mb-4 d-flex justify-content-center mb-4">
                            <?php if($process == "create"){?>
                                <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" alt="example placeholder"
                                    style="width: 200px;">
                            <?php } else {?>
                                <img src="<?= base_url() ?>assets/img/book/<?= $cover ?>" alt="example placeholder"
                                    style="width: 200px;">
                            <?php } ?>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-primary btn-rounded btn-sm">
                                <label class="form-label text-white m-1" for="customFile1">Upload
                                    Foto</label>
                                <input type="file" class="form-control d-none" id="customFile1" name="files">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <?php if($process == "view") {?>
                            <a href="<?= base_url() ?>admin/book-management/update/<?= $book_id ?>" class="btn btn-md btn-primary">Edit</a>
                        <?php } else {?>
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                        <?php }?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>