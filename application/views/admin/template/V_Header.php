<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
        $title = "";
        if ($page == "dashboard"){
            $title = "Dashboard";
        } else if ($page == "user-management"){
            $title = "User Management";
        } else if ($page == "book-management"){
            $title = "Book Management";
        } else if ($page == "book-type-management"){
            $title = "Book Type Management";
        } else if ($page == "penalty-management"){
            $title = "Penalty Management";
        } else if ($page == "trx-management"){
            $title = "Transaction Management";
        } else if ($page = "ahp"){
            $title = "Perhitungan AHP (Analytical Hierarchy Process)";
        }
    ?>

    <title>E-Library - <?= $title ?></title>

    <!-- Custom fonts for this template-->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/multiselect/docs/css/bootstrap-4.5.2.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/multiselect/docs/css/bootstrap-example.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/multiselect/docs/css/prettify.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/multiselect/docs/css/fontawesome-5.15.1-web/all.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/multiselect/dist/css/bootstrap-multiselect.css"> -->
        
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet" /> -->
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/5.0.1/css/fixedColumns.dataTables.css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom-css.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom-card-css.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link href="<?= base_url() ?>assets/css/responsive.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    

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