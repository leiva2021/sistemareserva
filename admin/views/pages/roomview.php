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

        

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Heyner Leiva</span>
                        <img class="img-profile rounded-circle" src="../../../resources/img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        
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

            <!-- Page Heading -->
            <!--<h1 class="h3 mb-2 text-gray-800">Tables</h1>-->
            <button type="button" class="btn btn-success btn-icon-split mb-2 p-1" onclick="abrirModal(null)">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Agregar</span>
            </button>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabla de habitaciones</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="mytable" width="100%" cellspacing="0">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>
                                        <center>N&uacute;mero<center>
                                    </th>
                                    <th>
                                        <center>Imagen</center>
                                    </th>
                                    <th>
                                        <center>Descripci&oacute;n</center>
                                    </th>
                                    <th>
                                        <center>Precio</center>
                                    </th>
                                    <th>
                                        <center>Cantidad</center>
                                    </th>
                                    <th>
                                        <center>Hab Disponible</center>
                                    </th>
                                    <th>
                                        <center>Extra</center>
                                    </th>
                                    <th>
                                        <center>Acciones</center>
                                    </th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>
                                        <center>N&uacute;mero</center>
                                    </th>
                                    <th>
                                        <center>Imagen</center>
                                    </th>
                                    <th>
                                        <center>Descripci&oacute;n</center>
                                    </th>
                                    <th>
                                        <center>Precio</center>
                                    </th>
                                    <th>
                                        <center>Cantidad</center>
                                    </th>
                                    <th>
                                        <center>Hab Disponible</center>
                                    </th>
                                    <th>
                                        <center>Extra</center>
                                    </th>
                                    <th>
                                        <center>Acciones</center>
                                    </th>

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
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Add Room Modal-->
<!--class="border"-->
<div class="modal fade" id="FormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="frmhabitacion" method="POST" enctype="multipart/form-data">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Habitaci&oacute;n</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <input type="hidden" id="opc" name="opc" value="insert">
                        <input type="hidden" id="roomnumber" name="roomnumber" value="">
                        <input type="hidden" id="currentimg" name="currentimg" value="">

                        <div class="col-sm-6">

                            <!--<input type="file" id="image" accept="image/*" name="image" class="form-control-file>-->
                            <label for="image" class="form-label"><strong>Imagen</strong></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" accept="image/*" lang="es">
                                <label class="custom-file-label" for="image">Seleccione</label>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <label for="description" class="form-label"><strong>Descripci&oacute;n</strong></label>
                            <textarea class="form-control" aria-label="With textarea" id="description" name="description"></textarea>
                        </div>
                        <div class="col-sm-6">
                            <label for="price" class="form-label"><strong>Precio</strong></label>
                            <input type="number" id="price" name="price" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                        </div>
                        <div class="col-sm-6">
                            <label for="amountpeople" class="form-label"><strong>Cantidad Personas</strong></label>
                            <input type="number" id="amountpeople" name="amountpeople" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="extras"><strong>Extras</strong></label>
                                <select class="form-control" id="extras" name="extras">

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="price" class="form-label"><strong>Habitaciones Disponibles:</strong></label>
                            <input type="number" id="roomavailable" name="roomavailable" class="form-control">
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
    <form id="frmDelete" action="" method="POST">

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
                        <button class="btn btn-danger" id="delete-room" type="button" data-dismiss="modal">Sí,Eliminar</button>
                        <a class="btn btn-primary" data-dismiss="modal">Salir</a>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

<?php include("../../template/footers/footer.php"); ?>