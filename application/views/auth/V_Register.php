<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Library - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom-css.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom-card-css.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link href="<?= base_url() ?>assets/css/responsive.css" rel="stylesheet" />
</head>

<body style="background-color: rgb(235, 235, 235);">

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <div class="text-center pb-2">
                        <h2 class="font-weight-bold">Rgister E-Library</h2>
                    </div>
                    <form method="post" action="<?= base_url()?>register">
                        <!-- Name input -->
                        <label class="form-label" for="form1Example13">Name</label>
                        <div class="input-group mb-2">
                            <input type="text" id="inp-register-first-name" class="form-control" placeholder="First Name" name="first_name">
                            <label for="#" style="color: rgb(235, 235, 235);">ad</label>
                            <input type="text" id="inp-register-last-name" class="form-control" placeholder="Last Name" name="last_name">
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="inp-register-username">Username</label>
                            <input type="text" id="inp-register-username" class="form-control" placeholder="Username" name="username">
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="inp-register-password">Password</label>
                            <input type="password" id="inp-register-password" class="form-control" placeholder="Password" name="password">
                        </div>

                        <!-- Re-Type Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Re-Type Password</label>
                            <input type="password" id="form1Example23" class="form-control"
                                placeholder="Re-Type password">
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign up</button>

                    </form>
                </div>
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
            </div>
        </div>
    </section>

    <?php 
    if($this->session->flashdata("error")){
      echo "<script>alert('".$this->session->flashdata("error")."')</script>";
    }
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

</body>