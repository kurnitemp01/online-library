<?php

    $penalty_type_id = "";
    $creation_date = "";
    $penalty_type_name = "";
    $penalty_desc = "";
    $url = base_url() . "admin/penalty-management/create";
    $button = "Save";

    if ($detail_penalty){
        $penalty_type_id = $detail_penalty["penalty_type_id"];
        $creation_date = $detail_penalty["creation_date"];
        $penalty_type_name = $detail_penalty["penalty_type_name"];
        $penalty_desc = $detail_penalty["penalty_desc"];
        $url = base_url() . "admin/penalty-management/update/" . $detail_penalty["penalty_type_id"];
        $button = "Update";
    }

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create New Penalty</h1>
</div>

<div class="row">

    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card shadow">
            <form action="<?= $url ?>" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-md-2 col-form-label">Penalty Name</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Penalty Name" name="penalty_type_name" value="<?= $penalty_type_name ?>">
                        </div>
                        <label for="staticEmail" class="col-md-2 col-form-label">Description</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Description" name="penalty_desc" value="<?= $penalty_desc ?>">
                        </div>
                    </div>
                    <div class="row justify-content-center pt-3">
                        <button class="btn btn-sm btn-info" type="submit"><?= $button ?></button>
                        <button class="btn btn-sm btn-danger ml-2" type="button">Clear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow">
            <div class="card-body">

                <table class="table table-responsive table-striped" style="display: table;"
                    id="tbl-user-monitoring">
                    <thead>
                        <tr class="bg-info">
                            <th width="10%" class="text-white text-center">No</th>
                            <th width="20%" class="text-white text-center">Penalty Name</th>
                            <th width="40%" class="text-white text-center">Description</th>
                            <th width="15%" class="text-white text-center">Created Date</th>
                            <th width="15%" class="text-white text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $counter = 0;
                            foreach ($penalty_types as $key => $penalty_type) { 
                                $counter += 1;
                        ?>
                            <tr>
                                <td class="text-center"><?= $counter ?></td>
                                <td class="text-center"><?= $penalty_type["penalty_type_name"] ?></td>
                                <td class="text-center"><?= $penalty_type["penalty_desc"] ?></td>
                                <td class="text-center"><?= $penalty_type["creation_date"] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>admin/penalty-management/update/<?= $penalty_type['penalty_type_id'] ?>" class="btn btn-warning btn-sm btn-rounded" type="buttton">Edit</a>
                                    <a href="<?= base_url() ?>admin/penalty-management/delete/<?= $penalty_type['penalty_type_id'] ?>" class="btn btn-danger btn-sm btn-rounded" type="buttton">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>