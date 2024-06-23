<?php

    $user_id = "";
    $creation_date = "";
    $username = "";
    $password = "";
    $user_type = "";
    $first_name = "";
    $last_name = "";
    $gender = "";
    $profile_pict = "";
    $email = "";
    $phone = "";
    $job = "";
    $motto = "";
    $street = "";
    $city_id = "";
    $province_id = "";
    $country_id = "";
    $city = "";
    $province = "";
    $country = "";
    $url = base_url() . "admin/user-management/create";
    $page_description = "Create New User";

    if(!empty($user_detail)){
        $user_id = $user_detail["user_id"];
        $creation_date = $user_detail["creation_date"];
        $username = $user_detail["username"];
        $password = $user_detail["password"];
        $user_type = $user_detail["user_type"];
        $first_name = $user_detail["first_name"];
        $last_name = $user_detail["last_name"];
        $gender = $user_detail["gender"];
        $profile_pict = $user_detail["profile_pict"];
        $email = $user_detail["email"];
        $phone = $user_detail["phone"];
        $job = $user_detail["job"];
        $motto = $user_detail["motto"];
        $street = $user_detail["street"];
        $city_id = $user_detail["city_id"];
        $province_id = $user_detail["province_id"];
        $country_id = $user_detail["country_id"];
        $city = $user_detail["city"];
        $province = $user_detail["province"];
        $country = $user_detail["country"];
        $url = base_url() . "admin/user-management/update/" . $user_id;
        $page_description = "Edit User";
    }

    $disabled = "";
    if ($process == "view"){
        $disabled = "disabled";
    }

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $page_description ?></h1>
</div>

<div class="row">
    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card shadow">
            <form action="<?= $url ?>" method="post" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">First Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="First Name" name="first_name" value="<?= $first_name ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Last Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="<?= $last_name ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Username</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $username ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Password</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" placeholder="Password" name="password" value="<?= $password ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Re-Type
                                Password</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control"
                                    placeholder="Re-Type Password" value="<?= $password ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Profile Pict</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" id="customFile1" name="files" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Gender</label>
                            <div class="col-md-8">
                                <input type="radio" value="m" name="gender" class="mt-3" <?php if ($gender == "m"){echo "checked";} ?> <?= $disabled ?>> Male
                                <input type="radio" value="f" name="gender" class="ml-3" <?php if ($gender == "f"){echo "checked";} ?> <?= $disabled ?>> Female
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inp-user-type" class="col-md-4 col-form-label">User Type</label>
                            <div class="col-md-8 pt-2">
                                <select name="user_type" id="inp-user-type" class="form-control" <?= $disabled ?>>
                                    <option value="client" <?php if ($user_type == "client"){echo "selected";} ?>>Client</option>
                                    <?php 
                                        if ($this->session->userdata("user_type") == "superuser"){
                                            echo '<option value="admin" <?php if ($user_type == "admin"){echo "selected";} ?>Admin</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>                 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inp-user-email" class="col-md-4 col-form-label">E-mail</label>
                            <div class="col-md-8">
                                <input type="email" class="form-control"
                                    placeholder="E-mail" id="inp-user-email" name="email" value="<?= $email ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inp-user-phone" class="col-md-4 col-form-label">Phone</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"
                                    placeholder="Phone" id="inp-user-phone" name="phone" value="<?= $phone ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inp-user-job" class="col-md-4 col-form-label">Job</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"
                                    placeholder="Job" id="inp-user-job" name="job" value="<?= $job ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inp-user-motto" class="col-md-4 col-form-label">Motto</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"
                                    placeholder="Motto" id="inp-user-motto" name="motto" value="<?= $motto ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inp-user-street" class="col-md-4 col-form-label">Street</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"
                                    placeholder="Street" id="inp-user-street" name="street"value="<?= $street ?>" <?= $disabled ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">City</label>
                            <div class="col-md-8">
                                <select name="city_id" class="form-control" <?= $disabled ?>>
                                    <?php foreach ($cities as $key => $city) { ?>
                                        <option value="<?= $city['city_id'] ?>" <?php if($city['city_id'] == $city_id){echo "selected";}?>><?= $city['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">Province</label>
                            <div class="col-md-8">
                                <select name="province_id" class="form-control" <?= $disabled ?>>
                                    <?php foreach ($provinces as $key => $province) { ?>
                                        <option value="<?= $province['province_id'] ?>"><?= $province['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-4 col-form-label">City</label>
                            <div class="col-md-8">
                                <select name="country_id" class="form-control" <?= $disabled ?>>
                                    <?php foreach ($countries as $key => $country) { ?>
                                        <option value="<?= $country['country_id'] ?>"><?= $country['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <?php 
                            if ($disabled == ""){
                                echo '<button type="submit" class="btn btn-md btn-primary">Save</button>';
                            } else {
                                echo '<a href="'.base_url().'admin/user-management/update/'.$user_id.'" class="btn btn-md btn-warning">Edit</a>';
                            }
                        ?>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>