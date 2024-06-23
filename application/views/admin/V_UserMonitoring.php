<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Monitoring</h1>
    <div>
        <a href="<?= base_url() ?>admin/user-management/create" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fa fa-fw fa-plus"></i>Add New User
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
                            <th width="10%" class="text-center">No</th>
                            <th width="15%" class="text-center">Username</th>
                            <th width="20%" class="text-center">First Name</th>
                            <th width="20%" class="text-center">User Type</th>
                            <th width="15%" class="text-center">Created Date</th>
                            <th width="20%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $counter = 0;
                            foreach ($users as $key => $user) {
                                $counter = $counter + 1;
                        ?>
                            <tr>
                                <td class="text-center"><?= $counter ?></td>
                                <td class="text-center"><?= $user["username"] ?></td>
                                <td class="text-center"><?= $user["first_name"] ?></td>
                                <td class="text-center" style="text-transform: capitalize;"><?= $user["user_type"] ?></td>
                                <td class="text-center"><?= $user["creation_date"] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>admin/user-management/view/<?= $user['user_id'] ?>" class="btn btn-primary btn-sm btn-rounded" type="buttton">View</a>
                                    <a href="<?= base_url() ?>admin/user-management/update/<?= $user['user_id'] ?>" class="btn btn-warning btn-sm btn-rounded" type="buttton">Edit</a>
                                    <a href="<?= base_url() ?>admin/user-management/delete/<?= $user['user_id'] ?>" class="btn btn-danger btn-sm btn-rounded" type="buttton">Delete</a>                                
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>