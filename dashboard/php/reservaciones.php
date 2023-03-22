<?php
if (!isset($_POST['type'])) die("Peticion Denegada");

$t = $_POST['type'];
$ide = $_POST['ide'];

// echo $t." - ";

$sen = "";

include("./cn.php");
if ($t == "acept") {
    $sen = "UPDATE reservaciones SET status='2' WHERE idRes='{$ide}'";
}
if ($t == "pagar") {
    // $res = mysqli_query($con, "SELECT restante FROM reservaciones WHERE idRes='{$ide}'");
    $res = mysqli_query($con, "SELECT r.id, r.idRes, r.llegada,g.id, r.salida, r.restante, h.precio
                FROM reservaciones AS r 
                JOIN general as g ON r.id=g.id 
                JOIN house as h ON g.id=h.idHouse
            WHERE r.idRes='{$ide}';");
    if(!$res) die("Error al recibir pago");
    $r= mysqli_fetch_array($res);

                     
    $date1 = new DateTime($r['llegada']);
    $date2 = new DateTime($r['salida']);
    $diff = $date1->diff($date2);
    $diff = $diff->days;
    $precTot = $diff * $r['precio'];

    $pago = $_POST['pago']+$r['restante'];
    
    $st = $precTot<=$pago ? '3' :'2';
    $sen = "UPDATE reservaciones SET status='{$st}' WHERE idRes='{$ide}'";
    $res = mysqli_query($con, $sen);
    if (!$res) die("Error al actualizar el pago");

    $sen = "UPDATE reservaciones SET restante='$pago' WHERE idRes='{$ide}'";
}
if ($t == "cancel") {
    $sen = "UPDATE reservaciones SET status='0' WHERE idRes='{$ide}'";
}
if ($t == "trash") {
    $idUser = mysqli_query($con,"SELECT idUser FROM reservaciones WHERE idRes='$ide'");
    $rowID = mysqli_fetch_array($idUser);
    $userId = $rowID['idUser'];
    
    $delUser = "DELETE FROM usuario WHERE idUser='$userId'";
    $res = mysqli_query($con, $delUser);
    if (!$res) die("Error al eliminar el ususario");

    $sen = "DELETE FROM reservaciones WHERE idRes='$ide'";
}

if ($sen == "") die();

// echo $sen;
$res = mysqli_query($con, $sen);
if (!$res) die("Error en la sentencia");

echo "1|";
