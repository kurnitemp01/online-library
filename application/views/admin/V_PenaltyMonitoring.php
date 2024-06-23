<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Penalty Monitoring</h1>
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
                            <th width="25%" class="text-white text-center">Trx Num</th>
                            <th width="20%" class="text-white text-center">User Name</th>
                            <th width="20%" class="text-white text-center">Penalty Name</th>
                            <th width="15%" class="text-white text-center">Trx Date</th>
                            <th width="15%" class="text-white text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $counter = 0;
                            foreach ($penalties as $key => $penalty) {
                                $counter += 1;
                        ?>
                            <tr>
                                <td class="text-center"><?= $counter ?></td>
                                <td class="text-center"><?= $penalty["transaction_num"] ?></td>
                                <td class="text-center"><?= $penalty["username"] ?></td>
                                <td class="text-center"><?= $penalty["penalty_type_name"] ?></td>
                                <td class="text-center"><?= $penalty["trx_date"] ?></td>
                                <td class="text-center">
                                    <?php  if ($penalty["evidence"]){ ?>
                                    <button class="btn btn-success btn-sm btn-rounded" type="buttton" data-toggle="modal" data-target="#mdl-evidence-view-<?= $penalty['penalty_id'] ?>">View Evidence</button>
                                    <a href="<?= base_url() ?>admin/penalty-management/approve-request/<?= $penalty['penalty_id'] ?>" class="btn btn-warning btn-sm btn-rounded" type="button">Approve Request</a>
                                    <?php } ?>
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
    foreach ($penalties as $key => $penalty) {
        if ($penalty["evidence"]){
?>
    <div class="modal fade" id="mdl-evidence-view-<?= $penalty['penalty_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mdl-evidence-view-<?= $penalty['penalty_id'] ?>"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title crop-text-1" id="exampleModalLabel">Evidence <?= $penalty["transaction_num"] ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <img src="<?= base_url() ?>assets/img/evidence/<?= $penalty['evidence'] ?>" style="width: 200px">
                    </center>
                </div>
            </div>
        </div>
    </div>
<?php }} ?>