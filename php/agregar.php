<?php
    // if(!isset($_POST["tipo"])) die("Error al recibir la peticion");

    $hl = $_POST['llegada'];
    $hs = $_POST['salida'];
    $a = $_POST['adultos'];
    $n = $_POST['ninos'];
    $ide = $_POST['ide'];
    $nombre = $_POST['nombre'];
    $apeP = $_POST['apeP'];
    $apeM = $_POST['apeM'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $fecha = $_POST['fecha'];

    include("./cn.php");
    $senUser = "INSERT INTO usuario (usuario, apellidoP, apellidoM, correoGoogle, telefono) VALUES ('$nombre','$apeP','$apeM','$mail','$phone')";
    $resUser=mysqli_query($con,$senUser);
    if(!$resUser) die("Hubo un error al insertar en usuarios");

    $resID = mysqli_query($con,"SELECT idUser FROM usuario ORDER BY idUser DESC LIMIT 1");
    $rowID = mysqli_fetch_array($resID);
    $userId = $rowID['idUser'];

    $senRes ="INSERT INTO reservaciones (idUser, id, adultos, ninos, llegada, salida, fecha, fechaAutorizacion, restante, status) VALUES ('$userId','$ide','$a','$n','$hl','$hs','$fecha','','0','1')";
    $resRes=mysqli_query($con,$senRes);
    if(!$resRes) die("Hubo un error al insertar en reservaciones");

    echo 1;

?>