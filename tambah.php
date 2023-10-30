<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['tambah'])) {
    // ambil data dari form
    $nombre = $_POST['nombre'];
    $Apellido = $_POST['Apellido'];
    $fecha = $_POST['fecha'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['Correo'];
    $motivo = $_POST['motivo'];
    $codigo_postal = $_POST['codigo_postal'];
    $numero_cuenta = $_POST['numero_cuenta'];
  

    // query
    $sql = "INSERT INTO provedores(nombre, Apellido,fecha, telefono, correo, motivo, codigo_postal, numero_cuenta)
    VALUES('$nombre', '$Apellido', '$fecha', '$telefono', '$correo', '$motivo', $codigo_postal, $numero_cuenta)";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?status=sukses');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("Akses dilarang...");
