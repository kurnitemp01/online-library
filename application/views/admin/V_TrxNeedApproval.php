<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaction Need Approval</h1>
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
                            <th width="12%" class="text-white text-center">Trx Number</th>
                            <th width="15%" class="text-white text-center">Book Name</th>
                            <th width="12%" class="text-white text-center">Trx Start Date</th>
                            <th width="12%" class="text-white text-center">Trx End Date</th>
                            <th width="12%" class="text-white text-center">Submit Date</th>
                            <th width="10%" class="text-white text-center">Username</th>
                            <th width="27%" class="text-white text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $counter = 0;
                            foreach ($transactions as $key => $trx) {
                                $counter += 1;
                        ?>
                        <tr>
                            <td class="text-center"><?= $counter ?></th>
                            <td class="text-center"><?= $trx["transaction_num"] ?></td>
                            <td class="text-center crop-text-2"><?= $trx["book_name"] ?></td>
                            <td class="text-center"><?= $trx["start_date"] ?></td>
                            <td class="text-center"><?= $trx["end_date"] ?></td>
                            <td class="text-center"><?= $trx["submitted_date"] ?></td>
                            <td class="text-center"><?= $trx["username"] ?></td>
                            <td class="text-center">
                                <?php 
                                    if ($trx["difference"] < 0) { 
                                        if(empty($trx["penalty_id"])) {
                                            $url = "#";
                                            $onclick = "alert('Please Assign Penalty First')";
                                            $disable = "";
                                            $button = "Assign Penalty";
                                        } else {
                                            $url = base_url() . "admin/trx-management/approve-transaction/" . $trx['transaction_id'];
                                            $onclick = '';
                                            $disable = "disabled";
                                            $button = "Penalty Assigned";
                                        }
                                ?>
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#mdl-trx-penalty-<?= $trx['transaction_id'] ?>" <?= $disable ?>><?= $button ?></button>
                                <?php 
                                } else {
                                    $url = base_url() . "admin/trx-management/approve-transaction/" . $trx['transaction_id'];
                                    $onclick = '';
                                }?>
                                <a href="<?= $url ?>" class="btn btn-sm btn-primary" onclick="<?= $onclick ?>">Approve</a>
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
    foreach ($transactions as $key => $trx) {
        if ($trx["difference"] < 0){        
?>
    
    <div class="modal fade" id="mdl-trx-penalty-<?= $trx['transaction_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="<?= base_url() ?>admin/trx-management/assign-penalty/<?= $trx['transaction_id'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Assign Penalty</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select name="penalty_type_id" class="slc-assign-penalty form-control" data-size="6" data-live-search="true">
                            <?php foreach ($penalties as $key => $penalty) {?>
                                <option value="<?= $penalty["penalty_type_id"] ?>"><?= $penalty["penalty_type_name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } } ?>