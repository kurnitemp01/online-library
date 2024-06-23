

<div class="row">

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-responsive table-striped" style="display: table;" id="tbl-mycollection-trx">
                    <thead>
                        <tr class="bg-info">
                            <th width="5%" class="text-white text-center">No</th>
                            <th width="14%" class="text-white text-center">Trx Num</th>
                            <th width="20%" class="text-white text-center">Book Name</th>
                            <th width="12%" class="text-white text-center">Start</th>
                            <th width="12%" class="text-white text-center">End</th>
                            <th width="12%" class="text-white text-center">Returned</th>
                            <th width="15%" class="text-white text-center">Status</th>
                            <th width="10%" class="text-white text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $counter = 0;
                            foreach ($collections as $key => $collection) {
                                $counter = $counter + 1;
                                $status_button = explode("-", $collection["status"])[1];
                                $status_text = explode("-", $collection["status"])[0];
                                $action_button = explode("-", $collection["trx_action"])[1];
                                $action_text = explode("-", $collection["trx_action"])[0];
                        ?>
                            <tr>
                                <td class="text-center"><?= $counter ?></td>
                                <td class="text-center"><?= $collection["transaction_num"] ?></td>
                                <td class="text-center crop-text-2"><?= $collection["book_name"] ?></td>
                                <td class="text-center"><?= $collection["start_date"] ?></td>
                                <td class="text-center"><?= $collection["end_date"] ?></td>
                                <td class="text-center"><?= $collection["returned_date"] ?></td>
                                <td class="text-center">
                                    <?php if($action_text == "done") {?>
                                        <button class="btn btn-outline-primary btn-sm btn-rounded">
                                            done
                                        </button>
                                    <?php } else {?>
                                        <button class="btn btn-outline-<?= $status_button ?> btn-sm btn-rounded">
                                            <?= $status_text ?>
                                        </button>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                        $url = "#";
                                        if ($action_text == "return"){
                                            $url = base_url() . "client/my-collection/return-book/" . $collection["transaction_id"];
                                        }
                                    ?>

                                    <?php
                                        $toggle = "#";
                                        if ($action_text == "penalty"){
                                            $toggle = 'data-toggle="modal" data-target="#mdl-collection-evidence-'. $collection["penalty_id"] .'"';
                                        }
                                    ?>

                                    <a href="<?= $url ?>" class="btn btn-<?= $action_button ?> btn-sm btn-rounded" style="text-transform: capitalize" <?= $toggle ?>>
                                        <?= $action_text ?>
                                    </a>
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
    foreach ($collections as $key => $collection) { 
        if (explode("-", $collection["trx_action"])[0] == "penalty"){
?>
    <div class="modal fade" id="mdl-collection-evidence-<?= $collection['penalty_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url() ?>client/my-collection/upload-evidence/<?= $collection['penalty_id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Evidence</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-md-4 col-form-label">Penalty Name</label>
                                <div class="col-md-8">: <?= $collection["penalty_type_name"] ?></div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-md-4 col-form-label">Description</label>
                                <div class="col-md-8">
                                    : <?= $collection["penalty_desc"] ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-md-4 col-form-label">Evidence</label>
                                <div class="col-md-8">
                                    <input type="file" name="files" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php }} ?>