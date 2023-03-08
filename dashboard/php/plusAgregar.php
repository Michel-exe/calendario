<?php
if(!isset($_POST['type'])) die("Peticion denegada");

if($_POST['type']=="file"){
    if (!isset($_FILES['file'])) die("Imagen no recibida");

    $id=$_POST['id'];

    $car = '../../archivos/';
    if (!file_exists($car)) { mkdir($car, 0777); }
    
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $fileNameNew = $id."_".uniqid('', true) . "." . $fileExt;
    $fileDest = $car . $fileNameNew;
    $mov = move_uploaded_file($fileTmpName, $fileDest);
    if(!$mov) die("Error al mover la imagen");

    include("./cn.php");
    $sen = "INSERT INTO imagenes (id, src) VALUES ('$id', '$fileNameNew');";
    $val=mysqli_query($con,$sen);
    if(!$val) die('Error al insertar');
    
    echo 1;

} else if($_POST['type']=="comida"){
    include("./cn.php");
    $ide = $_POST['ide'];
    $platillo = $_POST['platillo'];
    $tipo = $_POST['tipo'];
    $porcion = $_POST['porcion'];
    $tipoPorcion = $_POST['tipoPorcion'];
    
    $pl = explode("|", $platillo); array_pop($pl);
    $ti = explode("|", $tipo); array_pop($ti);
    $po = explode("|", $porcion); array_pop($po);
    $tp = explode("|", $tipoPorcion); array_pop($tp);

    $ins = "INSERT INTO comida (idHouse, tipo, platillo, porcion,tipoPorcion) VALUES ";
    for ($i=0; $i <=count($pl)-1; $i++) { 
        $ins .="('$ide','$ti[$i]','$pl[$i]','$po[$i]','$tp[$i]')";
    }
    $ins = str_replace(")(","),(",$ins);
    $resIns=mysqli_query($con,$ins);
    if(!$resIns) die('Error al insertar');

    echo 1;

}
    


?>