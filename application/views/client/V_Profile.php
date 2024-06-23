<form action="<?= base_url() ?>client/profile/update/<?= $user['user_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 shadow">
                <div class="card-body text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                    <?php if($process != "update"){?>
                        <h5 class="my-3"><?= $user['first_name'] ?> <?= $user['last_name'] ?></h5>
                        <p class="text-muted mb-1"><?= $user["job"]?></p>
                        <p class="text-muted mb-4"><?= $user["motto"]?></p>
                        <a href="<?= base_url() ?>client/profile/update/<?= $user['user_id'] ?>" class="btn btn-rounded btn-sm btn-warning">Edit Data</a>
                    <?php } else { ?>
                        <input type="file" class="form-control mt-3"></input>
                        <input type="text" class="form-control mt-3" placeholder="Job" name="job" value="<?= $user['job'] ?>"></input>
                        <textarea name="motto" cols="30" rows="3" class="form-control mt-3" placeholder="Motto..."><?= $user['motto'] ?></textarea>
                        <button class="btn btn-sm btn-primary mt-4 btn-profile-submit-update" type="submit" onclick="submit_profile_edit()">Update</button>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4 shadow">
                <div class="card-body mr-3">
                    <div class="form-group row">
                        <label class="mb-0 col-form-label col-sm-3">First Name</label>
                        <?php if($process == "update"){ ?>
                            <input type="text" class="form-control col-sm-9" value="<?= $user['first_name'] ?>" name="first_name">
                        <?php } else {?>
                            <p class="text-muted mb-0 col-sm-8">
                                <?= $user["first_name"] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="form-group row">
                        <label class="mb-0 col-form-label col-sm-3">Last Name</label>
                        <?php if($process == "update"){ ?>
                            <input type="text" class="form-control col-sm-9" value="<?= $user['last_name'] ?>" name="last_name">
                        <?php } else {?>
                            <p class="text-muted mb-0 col-sm-8">
                                <?= $user["last_name"] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="form-group row">
                        <label class="mb-0 col-form-label col-sm-3">Username</label>
                        <?php if($process == "update"){ ?>
                            <input type="text" class="form-control col-sm-9" value="<?= $user['username'] ?>" name="username">
                        <?php } else {?>
                            <p class="text-muted mb-0 col-sm-8">
                                <?= $user["username"] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="form-group row">
                        <label class="mb-0 col-form-label col-sm-3">Password</label>
                        <?php if($process == "update"){ ?>
                            <input type="password" class="form-control col-sm-9" value="<?= $user['password'] ?>" name="password">
                        <?php } else {?>
                            <p class="text-muted mb-0 col-sm-8">
                                <?= $user["password"] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="form-group row">
                        <label class="mb-0 col-form-label col-sm-3">Email</label>
                        <?php if($process == "update"){ ?>
                            <input type="email" class="form-control col-sm-9" value="<?= $user['email'] ?>" name="email">
                        <?php } else {?>
                            <p class="text-muted mb-0 col-sm-8">
                                <?= $user["email"] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="form-group row">
                        <label class="mb-0 col-form-label col-sm-3">Phone</label>
                        <?php if($process == "update"){ ?>
                            <input type="text" class="form-control col-sm-9" value="<?= $user['phone'] ?>" name="phone">
                        <?php } else {?>
                            <p class="text-muted mb-0 col-sm-8">
                                <?= $user["phone"] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="form-group row">
                        <label class="mb-0 col-form-label col-sm-3">Gender</label>                    
                        <?php if($process == "update"){ ?>
                            <input type="radio" value="<?= $user['gender'] ?>" name="gender" <?php if($user["gender"] == "m"){echo "checked";} ?> class="mt-2"> <span class="mt-2 ml-1">Male</span>
                            <input type="radio" value="<?= $user['gender'] ?>" name="gender" <?php if($user["gender"] == "f"){echo "checked";} ?> class="ml-3 mt-2"> <span class="mt-2 ml-1">Female</span>
                        <?php } else {?>
                            <p class="text-muted mb-0 col-sm-8">
                                <?= $user["gender_detail"] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="form-group row">
                        <label class="mb-0 col-form-label col-sm-3">Address</label>
                        <?php if($process == "update"){ ?>
                            <input type="text" class="form-control col-sm-9" value="<?= $user['street'] ?>" name="street">
                        <?php } else {?>
                            <p class="text-muted mb-0 col-sm-8">
                                <?= $user["street"] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="form-group row">
                        <label class="mb-0 col-form-label col-sm-3"></label>
                        <select name="city_id" class="slc-user-addres form-control col-sm-3" data-size="6" data-live-search="true">
                            <?php 
                                foreach ($cities as $key => $city) {
                                    $selected = "";
                                    if($city["city_id"] == $user["city_id"]){
                                        $selected = "selected";
                                    }
                                    echo '<option value="'.$city["city_id"].'" '.$selected.'>'.$city["name"].'</option>';
                                }
                            ?>
                        </select>
                        <select name="province_id" class="slc-user-addres form-control col-sm-3" data-size="6" data-live-search="true">
                            <?php 
                                foreach ($provinces as $key => $province) {
                                    $selected = "";
                                    if($province["province_id"] == $user["province_id"]){
                                        $selected = "selected";
                                    }
                                    echo '<option value="'.$province["province_id"].'" '.$selected.'>'.$province["name"].'</option>';
                                }
                            ?>
                        </select>
                        <select name="country_id" class="slc-user-addres form-control col-sm-3" data-size="6" data-live-search="true">
                            <?php 
                                foreach ($countries as $key => $country) {
                                    $selected = "";
                                    if($country["country_id"] == $user["country_id"]){
                                        $selected = "selected";
                                    }
                                    echo '<option value="'.$country["country_id"].'" '.$selected.'>'.$country["name"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>