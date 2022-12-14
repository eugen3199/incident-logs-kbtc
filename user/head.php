<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-120SG4NGK2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-120SG4NGK2');
    </script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Incident Management System</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    
    <!-- Sweet Alert 2 -->
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    
    <!-- Datatable CSS -->
    <!-- <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Vue Js -->
    <!-- <script src="vue.js"></script> -->
    <script src='axios-master/dist/axios.min.js'></script>
    <!-- <link rel="stylesheet" href="style.css"> -->



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<style type="text/css">
    body {
    padding-top: 55px;
}

.w-sidebar {
    width: 200px;
    max-width: 200px;
}

.row.collapse {
    margin-left: -200px;
    left: 0;
    transition: margin-left .15s linear;
}

.row.collapse.show {
    margin-left: 0 !important;
}

.row.collapsing {
    margin-left: -200px;
    left: -0.05%;
    transition: all .15s linear;
}

@media (max-width:768px) {

    .row.collapse,
    .row.collapsing {
        margin-left: 0 !important;
        left: 0 !important;
        overflow: visible;
    }
    
    .row > .sidebar.collapse {
        display: flex !important;
        margin-left: -100% !important;
        transition: all .25s linear;
        position: fixed;
        z-index: 1050;
        max-width: 0;
        min-width: 0;
        flex-basis: auto;
    }
    
    .row > .sidebar.collapse.show {
        margin-left: 0 !important;
        width: 100%;
        max-width: 100%;
        min-width: initial;
    }
    
    .row > .sidebar.collapsing {
        display: flex !important;
        margin-left: -10% !important;
        transition: all .2s linear !important;
        position: fixed;
        z-index: 1050;
        min-width: initial;
    }
}

</style>

</head>

<body class="bootstrap-dark bg-secondary">

    <?php
        session_start();
        include "database.php";
        if(!isset($_SESSION['user_username']) && !isset($_SESSION['user_password']) ){
          header('Location:../index.php');
        }
    ?>
