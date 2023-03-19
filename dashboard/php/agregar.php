<?php
    if(!isset($_POST["tipo"])) die("Error al recibir la peticion");

    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    $localidad = $_POST["localidad"];
    include("./cn.php");

    $ins = "INSERT INTO general (nombre,idTipo,idLoc) VALUES ('$nombre','$tipo','$localidad')";
    $resIns=mysqli_query($con,$ins);
    if(!$resIns) die("Hubo un error al insertar en general");

    $resID = mysqli_query($con,"SELECT id FROM general ORDER BY id DESC LIMIT 1");
    $rowID = mysqli_fetch_array($resID);
    $genId = $rowID['id'];
    
    if($tipo=="1"){
        $referencias = $_POST["referencias"];
        $precio = $_POST["precio"];
        $habitaciones = $_POST["habitaciones"];
        $status = $_POST["status"];
        $estrellas = $_POST["estrellas"];
        $servicios = $_POST["servicios"];
    
        $ins = "INSERT INTO house (idHouse, idLoc, refer, precio, habitaciones, status, estrellas, IdComida) VALUES ('$genId','$localidad','$referencias','$precio','$habitaciones','$status','$estrellas','')";
        $resIns=mysqli_query($con,$ins);
        if(!$resIns) die("Hubo un error al insertar en house");
        
        $ser = explode("|", $servicios);
        array_pop($ser);
        $ins = "INSERT INTO house_servicios (idHouse, idServicios) VALUES ";
        foreach ($ser as &$s) {
            $ins .="('$genId','$s')";
        }
        $ins = str_replace(")(","),(",$ins);
        $resIns=mysqli_query($con,$ins);
        if(!$resIns) die("Hubo un error al insertar en servicios");
    
        echo true."|".$genId;
    } else if($tipo=="2"){
        $horaO =$_POST['horaO'];
        $horaC =$_POST['horaC'];
        $serDom =$_POST['serDom'];
        $categoria =$_POST['categoria'];
        $platillos =$_POST['platillos'];
        $refer =$_POST['refer'];
    
    
        $ins = "INSERT INTO alimentos (idAlimentos, idLoc, refer, horariosO, horariosC, servDom, idCat) VALUES ('$genId','$localidad', '$refer', '$horaO','$horaC','$serDom','$categoria')";
        $resIns=mysqli_query($con,$ins);
        if(!$resIns) die("Hubo un error al insertar en alimentos");
        
        $ser = explode("|", $platillos);
        array_pop($ser);
        $ins = "INSERT INTO platillos (idAlimentos, platillo) VALUES ";
        foreach ($ser as &$s) {
            $ins .="('$genId','$s')";
        }
        $ins = str_replace(")(","),(",$ins);
        $resIns=mysqli_query($con,$ins);
        if(!$resIns) die("Hubo un error al insertar en platillos");
    
        echo true."|".$genId;
    }
    
?>