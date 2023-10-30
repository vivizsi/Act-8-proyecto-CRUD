<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>JMAS</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Mi pagina JMAS</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Inicio Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form tambah telcelprov -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
            <!-- tambah data -->
            <div class="card-body">
                <h3 class="card-title">viviana Lizeth Cardenas Garcia </h3>
                <p class="card-text">Tabla pago en linea</p>

                <!-- tampilkan pesan sukses ditambah -->
                <?php if (isset($_GET['status'])) : ?>
                    <?php
                    if ($_GET['status'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Datos agregados exitosamente!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups algo salio mal!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="tambah.php" method="POST">

                    <div class="col-md-4">
                        <label for="nombre" class="form-label">nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="ingrese su nombre" required>
                    </div>
                    <div class="col-md-4">
                    <label for="Apellido" class="form-label">Apellido</label>
                        <input type="text" name="Apellido" class="form-control" placeholder="ingrese su apellido" required>
                    </div>

                    <div class="col-md-4">
                        <label for="fecha" class="form-label">fecha</label>
                        <input type="date" name="fecha" class="form-control" placeholder="24/10/2023" required>
                    </div>

                    <div class="col-md-4">
                        <label for="telefono" class="form-label">telefono</label>
                        <input type="text" name="telefono" class="form-control" placeholder="1234..." required>
                    </div>

                    <div class="col-md-4">
                    <label for="Correo" class="form-label">Correo</label>
                        <input type="text" name="Correo" class="form-control" placeholder="Email" required>.
                    </div>

                    <div class="col-md-4">
                       <label for="motivo" class="form-label">motivo</label>
                        <input type="text" name="motivo" class="form-control" placeholder="motivo" required>
                    </div>

                    <div class="col-md-4">
                    <label for="codigo_postal" class="form-label">codigo_postal</label>
                        <input type="text" name="codigo_postal" class="form-control" placeholder="1234..." required>
                    </div>
                    <div class="col-md-4">
                    <label for="codigo_postal" class="form-label">numero_cuenta</label>
                        <input type="text" name="numero_cuenta" class="form-control" placeholder="1234.." required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i class="fa fa-plus"></i><span class="ms-2">Agregar datos</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- judul tabel -->
        <h5 class="mb-3">Mi lista de provedores</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Mostrar entradas</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar algo..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- tampilkan pesan sukses dihapus -->
        <?php if (isset($_GET['hapus'])) : ?>
            <?php
            if ($_GET['hapus'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Datos eliminados exitosamente!</strong>!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups algo salio mal!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tampilkan pesan sukses di edit -->
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Datos actualizados exitosamente!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups algo salio mal!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabel -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>No</th>";
            echo "<th scope='col'>nombre</th>";
            echo "<th scope='col'>Apellido</th>";
            echo "<th scope='col'>Fecha</th>";
            echo "<th scope='col'>telefono</th>";
            echo "<th scope='col'>correo</th>";
            echo "<th scope='col'>motivo</th>";
            echo "<th scope='col'>codigo_postal</th>";
            echo "<th scope='col'>numero_cuenta</th>";
            echo "<th scope='col' class='text-center'>Opciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($db, "SELECT * FROM provedores");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_mhs = mysqli_query($db, "SELECT * FROM provedores LIMIT $halaman_awal, $batas");
            $no = $halaman_awal + 1;

            // $sql = "SELECT * FROM telcelprov";
            // $query = mysqli_query($db, $sql);




            while ($pagolinea = mysqli_fetch_array($data_mhs)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $pagolinea['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $pagolinea['nombre'] . "</td>";
                echo "<td>" . $pagolinea['Apellido'] . "</td>";
                echo "<td>" . $pagolinea['fecha'] . "</td>";
                echo "<td>" . $pagolinea['telefono'] . "</td>";
                echo "<td>" . $pagolinea['correo'] . "</td>";
                echo "<td>" . $pagolinea['motivo'] . "</td>";
                echo "<td>" . $pagolinea['codigo_postal'] . "</td>";
                echo "<td>" . $pagolinea['numero_cuenta'] . "</td>";
                

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // tombol hapus
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>No hay datos disponibles en esta tabla.</p>";
            } else {
                echo "<p>Total $jumlah_data de datos</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman > 1) ? "href='?halaman=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman < $total_halaman) ? "href='?halaman=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Modal Edit-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar datos de estudiantes</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM provedores";
                    $query = mysqli_query($db, $sql);
                    $pagolinea = mysqli_fetch_array($query);
                    ?>

                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_nombre" class="form-label">Nombre</label>
                                <input type="text" name="edit_nombre" id="edit_nombre" class="form-control" placeholder="ingresa tu nombre" required>
                            </div>
                            <div class="col-12 mb-3">
                            <label for="edit_Apellido" class="form-label">Apellido</label>
                                <input type="text" name="edit_Apellido" id="edit_Apellido" class="form-control" placeholder="ingresa tu nombre" required>
                            </div>

                            <div class="col-12 mb-3">
                            <label for="edit_fecha" class="form-label">fecha</label>
                                <input type="date" name="edit_fecha" id="edit_fecha" class="form-control" placeholder="ingresa tu nombre" required>
                            </div>


                            <div class="col-12 mb-3">
                            <label for="edit_telefono" class="form-label">telefono</label>
                                <input type="text" name="edit_telefono" id="edit_telefono" class="form-control" placeholder="ingresa tu nombre" required>
                            </div>

                            <div class="col-12 mb-3">
                            <label for="edit_correo" class="form-label">correo</label>
                                <input type="text" name="edit_correo" id="edit_correo" class="form-control" placeholder="ingresa tu nombre" required>
                            </div>

                            <div class="col-12 mb-3">
                            <label for="edit_motivo" class="form-label">motivo</label>
                                <input type="text" name="edit_motivo" id="edit_motivo" class="form-control" placeholder="ingresa tu nombre" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_codigo_postal" class="form-label">codigo postal</label>
                                <input type="text" name="edit_codigo_postal" id="edit_codigo_postal" class=" form-control" placeholder="5000" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_numero_cuenta" class="form-label">Numero de cuenta</label>
                                <input type="text" name="edit_numero_cuenta" id="edit_numero_cuenta" class=" form-control" placeholder="24/10/2023" required>
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>Actualizar datos</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmación</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='hapus.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Eliminar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id').val(data[1]);
                // gak dipake, karena cuma increment number
                $('#edit_nombre').val(data[2]);
                $('#edit_Apellido').val(data[3]);
                $('#edit_fecha').val(data[4]);
                $('#edit_telefono').val(data[5]);
                $('#edit_correo').val(data[6]);
                $('#edit_motivo').val(data[7]);
                $('#edit_codigo_postal').val(data[8]);
                $('#edit_numero_cuenta').val(data[9]);
          


            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>