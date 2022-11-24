<?php include("../../template/headers/head.php"); ?>

<!-- Page Wrapper -->
<!--<div id="wrapper">-->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Heyner Leiva</span>
                        <img class="img-profile rounded-circle" src="../../../resources/img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <!--<h1 class="h3 mb-4 text-gray-800">Registro de habitaciones</h1>-->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabla de reservaciones</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="mytable" width="100%" cellspacing="0">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th><center>N. Habitaci&oacute;n<center></th>
                                    <th><center>Fecha inicio<center></th>
                                    <th><center>Fecha fin</center></th>
                                    <th><center>C&eacute;dula</center></th>
                                    <th><center>Cliente</center></th>
                                    <th><center>Apellidos</center></th>
                                    <th><center>Cantidad Habitaciones</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th><center>N. Habitaci&oacute;n<center></th>
                                    <th><center>Fecha inicio<center></th>
                                    <th><center>Fecha fin</center></th>
                                    <th><center>C&eacute;dula</center></th>
                                    <th><center>Cliente</center></th>
                                    <th><center>Apellidos</center></th>
                                    <th><center>Cantidad Habitaciones</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Sistema Reserva 2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="login.html">Cerrar Sesion</a>
            </div>
        </div>
    </div>
</div>

<!-- Add Room Modal-->
<!--class="border"-->
<div class="modal fade" id="FormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formreserve" method="POST" enctype="multipart/form-data">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Reservaci&oacute;n</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <input type="hidden" id="opc" name="opc" value="insert">
                        <input type="hidden" id="reservenumber" name="reservenumber" value="">
                        <input type="hidden" id="currentimg" name="currentimg" value="">

                        <div class="col-sm-6">
                                <label for="extras"><strong>N&uacute;mero de habitaci&oacute;n</strong></label>
                                <input type="number" id="roomnumber" name="roomnumber" class="form-control" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="dateIni" class="form-label"><strong>Fecha de Inicio</strong></label>
                            <input type="date" id="reserveDateStart" name="reserveDateStart" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="dateFin" class="form-label"><strong>Fecha de Fin</strong></label>
                            <input type="date" id="reserveDateEnd" name="reserveDateEnd" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="identificatio" class="form-label"><strong>Cedula</strong></label>
                            <input type="text" id="identification" name="identification" class="form-control" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="name" class="form-label"><strong>Nombre</strong></label>
                            <input type="text" id="nameClient" name="nameClient" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="name" class="form-label"><strong>Apellidos</strong></label>
                            <input type="text" id="lastnameClient" name="lastnameClient" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="cantRoom" class="form-label"><strong>Cantidad de habitaciones</strong></label>
                            <input type="number" id="reserveQuantity" name="reserveQuantity" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" id="cancel-register" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success" type="submit" id="guardar">Registrar</button>
                </div>
            </form>

        </div> <!-- end of modal content -->
    </div>
</div>

<!-- Modal to delete room -->
<div>
    <form id="formDelete" action="" method="POST">

        <input type="hidden" id="roomnumber" name="roomnumber" value="">
        <input type="hidden" id="opc" name="opc" value="delete">

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-secondary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Habitaci&oacute;n</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body"><strong class="text-dark">¿Desea eliminar la habitaci&oacute;n?</strong></div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" id="delete-reserve" type="button" data-dismiss="modal">Sí,Eliminar</button>
                        <a class="btn btn-primary" data-dismiss="modal">Salir</a>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

<?php include("../../template/footers/footer.php"); ?>