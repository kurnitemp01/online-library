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

  <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">

  <style>
    .owl-carousel .owl-item img {
      transform: none;
      width: auto;
      height: auto;
    }

    .owl-carousel .owl-item {
      width: 100%;
      height: 100%;
    }
  </style>


</head>

<body style="background-color: rgb(235, 235, 235);">

  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid"
            alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <div class="text-center pb-2">
            <h2 class="font-weight-bold">Login E-Library</h2>
          </div>
          <form action="<?= base_url() ?>login" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="inp-login-username">Username</label>
              <input type="text" id="inp-login-username" class="form-control form-control-lg" name="username">
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="inp-login-password">Password</label>
              <input type="password" id="inp-login-password" class="form-control form-control-lg" name="password">
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
            Don't have an acount? <a href="<?= base_url() ?>register">Register</a>

          </form>
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