<?php
if(!isset($_POST['type'])) die("Peticion denegada");

if($_POST['type']!="file") die("Tipo no definido");
if (!isset($_FILES['file'])) die("Imagen no recibida");

$car = '../promotores/';
if (!file_exists($car)) { mkdir($car, 0777); }
    
$file = $_FILES['file'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileSize = $file['size'];
$fileError = $file['error'];
$fileType = $file['type'];

$fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

$fileNameNew = uniqid('', true) . "." . $fileExt;
$fileDest = $car . $fileNameNew;
$mov = move_uploaded_file($fileTmpName, $fileDest);
if(!$mov) die("Error al mover la imagen");

include("./cn.php");

$nombre = $_POST['nombre'];
$apeP = $_POST['apeP'];
$apeM = $_POST['apeP'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$adress = $_POST['adress'];

$sen = "INSERT INTO promotores (foto, nombre, apellidoP, apellidoM, telefono, mail, direccion) VALUES ('$fileNameNew', '$nombre', '$apeP', '$apeM', '$phone', '$mail', '$adress')";
$val=mysqli_query($con,$sen);
if(!$val) die('Error al insertar');
    
echo 1;
?>