<?php
    if(!isset($_POST["tipo"])) die("Error al recibir la peticion");

    $tipo = $_POST['tipo'];

    $nombre = $_POST['nombre'];
    $apeP = $_POST['apeP'];
    $apeM = $_POST['apeM'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $fecha = $_POST['fecha'];
    $whatsapp = $_POST['whatsapp'];
    $whatsapp = $whatsapp=="true" ? "1" : "0";

    $ide = $_POST['ide'];


    include("./cn.php");
    $senUser = "INSERT INTO usuario (usuario, apellidoP, apellidoM, correoGoogle, telefono, whatsapp) VALUES ('$nombre','$apeP','$apeM','$mail','$phone','$whatsapp')";
    $resUser=mysqli_query($con,$senUser);
    if(!$resUser) die("Hubo un error al insertar en usuarios");

    $resID = mysqli_query($con,"SELECT idUser FROM usuario WHERE correoGoogle='$mail' AND telefono='$phone' ORDER BY idUser DESC LIMIT 1");
    $rowID = mysqli_fetch_array($resID);
    $userId = $rowID['idUser'];

    // die($userId);

    $senRes="";
    if($tipo=="agendarHouse"){
        $hl = $_POST['llegada'];
        $hs = $_POST['salida'];
        $a = $_POST['adultos'];
        $n = $_POST['ninos'];
        $senRes ="INSERT INTO reservaciones (idUser, id, adultos, ninos, llegada, salida, fecha, fechaAutorizacion, restante, status) VALUES ('$userId','$ide','$a','$n','$hl','$hs','$fecha','','0','1')";
    } else if($tipo=="agendarRest"){
        $dia = $_POST['dia'];
        $hora = $_POST['hora'];
        $senRes ="INSERT INTO reservalimentos (idUser, id, llegada, hora, fecha, anticipo, status) VALUES ('$userId','$ide','$dia','$hora', '$fecha', '0', '1')";
    } else {
        die ("Error");
    }
    $resRes=mysqli_query($con,$senRes);
    if(!$resRes) die("Hubo un error al insertar en reservaciones");

    echo 1;

?>