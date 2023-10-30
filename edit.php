<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $nombre = $_POST['edit_nombre'];
    $Apellido= $_POST['edit_Apellido'];
    $fecha = $_POST['edit_fecha'];
    $telefono = $_POST['edit_telefono'];
    $correo= $_POST['edit_correo'];
    $motivo = $_POST['edit_motivo'];
    $codigo_postal = $_POST['edit_codigo_postal'];
    $numero_cuenta= $_POST['edit_numero_cuenta'];


    // query
    $sql = "UPDATE provedores SET nombre='$nombre', Apellido='$Apellido', fecha='$fecha', telefono='$telefono', correo='$correo', motivo='$motivo', codigo_postal='$codigo_postal', numero_cuenta='$numero_cuenta' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Akses dilarang...");
