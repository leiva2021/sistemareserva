<?php
//datos variable sesion
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reserva Habitaci&oacute;n</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
    <style>
        #myhover {
            transition: all 0.2s ease;
        }

        #myhover:hover {
            box-shadow: 5px 6px 6px 2px #e9ecef;
            transform: scale(1.1);
        }

        header {
            background-position: center center;
            background: url("https://marketingsimulator.net/maritzabarboza/wp-content/uploads/sites/349/2016/11/cropped-Centro-de-Puerto-Viejo-de-Limon-Costa-Rica.jpg") no-repeat center center fixed;
            background-size: cover;
        }

        #comment {
            background-color: #323563;
        }

        #nav {
            background-color: #1f1732;
        }

        .circular-square {
            border-radius: 50%;
            width: 35px;
            height: 35px;
        }
    </style>
    <?php
    include_once "../admin/data/roomdata.php";
    ?>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg" id="nav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand text-white" href="#"><strong>Reservas</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 text-white">
                    <li class="nav-item"><a class="nav-link text-white" class="fw-bold" href="../admin/index.php"><strong>Iniciar Sesi&oacute;n</strong></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="py-5">
        <!-- bg-dark py-5 -->
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Reserva</h1>
                <p class="lead fw-normal text-white-50 mb-0"><strong>Reserva tu habitaci&oacute;n,para pasarla bien!</strong></p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <?php
    $allrooms = RoomData::getAllRooms();
    ?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach ($allrooms as $rooms) {
                    foreach ($rooms as $room) { ?>
                        <div class="col mb-5">
                            <div class="card h-100 " id="myhover">
                                <!-- Product image-->
                                <img class="card-img-top" src="../admin/images/<?php echo $room['IMAGE']; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><i class="bi bi-geo-alt"></i><?php echo $room['DESCRIPTIONS']; ?></h1>
                                            <!-- Product price-->
                                            <small><strong>$<?php echo $room['PRICE']; ?></strong></small><br>
                                            <small>Habitaciones Disponibles <strong><?php echo $room['ROOMAVAILABLE'], $_SESSION["name"]; ?></strong></small>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><button type="button" class="btn btn-outline-dark mt-auto" onclick="openModal(
                                        <?php echo $room['ROOMNUMBER']; ?>,
                                        <?php echo $room['ROOMAVAILABLE']; ?> )">Reservar</button></div>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>

            </div>
        </div>
    </section>

    <section class="p-4" id="comment">
        <div class="container px-4 px-lg-5 mt-3 mb-3">

            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" onclick="openModalComment('402560896')"><i class="bi bi-chat-quote"></i> Comentar</button>
                </div>
                <div class="card-body">
                    <div class="card-title">

                        <div id="content">

                        </div>
                        <!-- <img class="circular-square" src="https://xx.bstatic.com/static/img/review/avatars/ava-h.png" alt="" role="presentation"> -->
                    </div>
                </div>
            </div>


        </div>
    </section>


    <!-- seccion de modales -->

    <div class=" modal fade" id="ReserveForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmreserve" action="" method="POST">
                    <div class="modal-header bg-secondary">
                        <h5 class="modal-title" id="exampleModalLabel">Reserva su habitaci&oacute;n</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <input type="hidden" id="opc" name="opc" value="insert">
                        <input type="hidden" id="roomNumber" name="roomNumber" value="">

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="recipient-name" class="col-form-label">Fecha Inicio:</label>
                                <input type="date" class="form-control" id="reserveDateStart" name="reserveDateStart" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="recipient-name" class="col-form-label">Fecha Fin:</label>
                                <input type="date" class="form-control" id="reserveDateEnd" name="reserveDateEnd" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="recipient-name" class="col-form-label">C&eacute;dula:</label>
                                <input type="text" class="form-control" id="identification" name="identification" required autocomplete="off">
                            </div>
                            <div class="col-sm-6">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nameClient" name="nameClient" required autocomplete="off">
                            </div>
                            <div class="col-sm-6">
                                <label for="recipient-name" class="col-form-label">Apellidos:</label>
                                <input type="text" class="form-control" id="lastnameClient" name="lastnameClient" required autocomplete="off">
                            </div>
                            <div class="col-sm-6">
                                <label for="recipient-name" class="col-form-label">Habitaciones:</label>
                                <input type="number" class="form-control" id="reserveQuantity" name="reserveQuantity" min="1" max="1" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="button-cancel" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar Reserva</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal comment -->
    <!-- Modal -->
    <div class="modal fade" id="ModalComment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmcomment" method="POST">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Comentarios</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="opc" name="opc" value="insert_comment">
                        <input type="hidden" id="userid" name="userid" value="">


                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="txtcomment" name="txtcomment" style="height: 100px" required></textarea>
                                <label for="txtcomment">Escribe su comentario</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Enviar comentario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Reserva 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
    <!-- Core theme JS-->
    <script src="../js/reserve.js"></script>
    <script src="../js/comment.js"></script>
</body>

</html>