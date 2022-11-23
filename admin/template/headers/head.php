<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema Reserva</title>

    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%2210 0 100 100%22><text y=%22.90em%22 font-size=%2290%22>🏨</text></svg>">

    <!-- Custom fonts for this template-->
    <?php if (isset($_GET['type']) && $_GET['type'] == "page" && isset($_GET['name']) && $_GET['name'] == "room") { ?>

        <link href="../../../resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../../../resources/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->
        <link href="../../../resources/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.js"></script>

    <?php } else if(isset($_GET['type']) && $_GET['type'] == "page" && isset($_GET['name']) && $_GET['name'] == "comment"){ ?>

        <link href="../../../resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../../../resources/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->
        <link href="../../../resources/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.js"></script>

        <?php } else if(isset($_GET['type']) && $_GET['type'] == "page" && isset($_GET['name']) && $_GET['name'] == "reserve"){ ?>

        <link href="../../../resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../../../resources/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->
        <link href="../../../resources/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.js"></script>

        <?php }else { ?>
        <link href="../../../resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../../../resources/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->
        <link href="../../../resources/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.js"></script>
    <?php } ?>



    <link href="../resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../resources/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <style>
        #info{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 200px;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <?php if (isset($_GET['type']) && $_GET['type'] == "page") { ?>

                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../home.php">
                    <div class="sidebar-brand-icon rotate-n-10">

                        <i class="bi bi-house-door"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Reservas</div>
                </a>
            <?php } else { ?>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                    <div class="sidebar-brand-icon rotate-n-10">

                        <i class="bi bi-house-door"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Reservas</div>
                </a>

            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Mantenimiento
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Hotel</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestionar:</h6>

                        <?php if (isset($_GET['type']) && $_GET['type'] == "page") { ?>

                            <a class="collapse-item" href="./roomview.php?type=page&name=room">Habitaciones</a>
                            <a class="collapse-item" href="./extraview.php?type=page&name=extra">Extras</a>

                        <?php } else { ?>
                            <!-- Funciona si es Home -->
                            <a class="collapse-item" href="views/pages/roomview.php?type=page&name=room">Habitaciones</a>
                            <a class="collapse-item" href="views/pages/extraview.php?type=page&name=extra">Extras</a>

                        <?php } ?>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Solicitudes
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-task"></i>
                    <span>Clientes</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestionar:</h6>

                        <?php if (isset($_GET['type']) && $_GET['type'] == "page") { ?>
                            <a class="collapse-item" href="./reserveview.php?type=page&name=reserve">Reservas</a>
                            <a class="collapse-item" href="./commentsview.php?type=page&name=comment">Comentarios</a>
                            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <?php } else { ?>
                            <a class="collapse-item" href="./resereview.php?type=page&name=reserve">Reservas</a>
                            <a class="collapse-item" href="views/pages/commentsview.php?type=page&name=comment">Comentarios</a>
                            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>

                        <?php } ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->