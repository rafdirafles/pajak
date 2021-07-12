<!DOCTYPE html>


<html class="loading" lang="en">
<!-- BEGIN : Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title><?= $title ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/apex-angular-4-bootstrap-admin-templateapp-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/') ?>img/logos/nts.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>fonts/feather/style.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>fonts/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/prism.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/switchery.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/toastr.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/datatables/dataTables.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendors/css/select2.min.css">
    <!-- END VENDOR CSS-->

    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap-extended.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/colors.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/components.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/themes/layout-dark.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/plugins/switchery.min.css">
    <!-- END APEX CSS-->

    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/pages/dashboard1.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/pages/ex-component-sweet-alerts.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/pages/ex-component-toastr.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/pages/page-invoice.min.css">
    <!-- END Page Level CSS-->

    <!-- BEGIN: Custom CSS-->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <!-- END: Custom CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns  navbar-sticky sidebar-lg nav-collapse pace-done <?= $_COOKIE['sidebar-tipe']; ?>" data-menu="vertical-menu" data-col="2-columns">