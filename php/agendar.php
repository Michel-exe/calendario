<?php
    if(!isset($_POST['type'])) die("Peticion Denegada");

function agendar(){
    require("./cn.php");

    $fecha = $_POST["fecha"];
    $day = $_POST["day"];
    $mounth = $_POST["mounth"];
    $year = $_POST["year"];
    $check = $_POST["check"];
    $i_hora = $_POST["i_hora"];
    $f_hora = $_POST["f_hora"];
    $idEve = $_POST["idEve"];
    $evento = $_POST["evento"];
    $descri = $_POST["descri"];
    $idUbi = $_POST["idUbi"];
    $calle = $_POST["calle"];
    $municipio = $_POST["municipio"];
    $barrio = $_POST["colonia"];
    $numero = $_POST["numero"];
    $estado = $_POST["estado"];
    $referen = $_POST["referen"];
    $color = $_POST["color"];


    if($idEve=="0"){
        $eve = "INSERT INTO `eventos` (`evento`, `description`, `idUbicacion`, `color`) VALUES ('$evento', '$descri', '', '#000')";
        $res=mysqli_query($con,$eve);
        if(!$res) die("Hubo un error al insertar un evento ");

        $sen = "SELECT id FROM eventos ORDER BY id desc LIMIT 1";
        $row = mysqli_fetch_array(mysqli_query($con, $sen));
        $idEve= $row['id'];
    }
    if($idUbi=="0"){
        $ubi = "INSERT INTO `ubicaciones` (`nombre`, `calle`, `numero`, `barrio`, `municipio`, `estado`, `referencias`, `color`) VALUES ('vacio', '$calle', '$numero', '$barrio', '$municipio', '$estado', '$referen', '#000000')";
        $res=mysqli_query($con,$ubi);
        if(!$res) die("Hubo un error al insertar la ubicacion ");

        $sen = "SELECT id FROM ubicaciones ORDER BY id desc LIMIT 1";
        $row = mysqli_fetch_array(mysqli_query($con, $sen));
        $idUbi= $row['id'];
    }
    // echo $idEve." - ".$idUbi." - ";

    $fec = "INSERT INTO `fechas` (`idEvento`, `idUbicacion`, `day`, `mounth`, `year`, `i_fecha`, `t_fecha`, `i_hora`, `t_hora`, `color`) VALUES ('$idEve', '$idUbi', '$day', '$mounth', '$year', '$fecha', '$fecha', '$i_hora', '$f_hora', '$color')";
    $res=mysqli_query($con,$fec);
    if(!$res) die("Hubo un error al insertar la fecha ");

    echo 1;
}

    // if($idUbi=="0"){
    //     $ubi = "INSERT INTO `ubicaciones` (`nombre`, `calle`, `numero`, `barrio`, `municipio`, `estado`, `referencias`, `color`) VALUES ('vacio', '$calle', '$numero', '$barrio', '$municipio', '$estado', '$referen', '#000000')";
    //     $res=mysqli_query($con,$ubi);
    //     if(!$res) die("Hubo un error al insertar la ubicacion ");

    //     $sen = "SELECT id FROM ubicaciones ORDER BY id desc LIMIT 1";
    //     $row = mysqli_fetch_array(mysqli_query($con, $sen));
    //     $idubi= $row['id'];
    // }
    // echo $idEve." - ".$idubi;

    // $fec = "INSERT INTO `fechas` (`idEvento`, `evento`, `description`, `idUbicacion`, `day`, `mounth`, `year`, `i_fecha`, `t_fecha`, `i_hora`, `t_hora`, `color`) VALUES ('$idEve', 'vacio', 'vacia', '$idUbi', '$day', '$mounth', '$year', '$i_fecha', '$t_fecha', '$i_hora', '$t_hora', '$color')";
    // $res=mysqli_query($con,$fec);
    // if(!$res) die("Hubo un error al insertar la fecha ");

    // echo 1;



    // // $sen="INSERT INTO fecha (evento, description, ubicacion, calle, numero, barrio, municipio, estado, day, mounth, year, i_fecha, t_fecha, i_hora, t_hora, color) VALUES ('$evento','$description','$ubicacion','$calle','$numero','$barrio','$municipio','$estado','$day','$mounth','$year','$i_fecha','$t_fecha','$i_hora','$t_hora','$color')";

    // $fec = "INSERT INTO `fechas` (`id`, `idEvento`, `evento`, `description`, `idUbicacion`, `day`, `mounth`, `year`, `i_fecha`, `t_fecha`, `i_hora`, `t_hora`, `color`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '', '')";
    // $eve = "INSERT INTO `eventos` (`id`, `evento`, `description`, `idUbicacion`, `color`) VALUES (NULL, '', '', '', '')";
    // $ubi = "INSERT INTO `ubicaciones` (`id`, `nombre`, `calle`, `numero`, `barrio`, `municipio`, `estado`, `referencias`, `color`) VALUES (NULL, '', '', '', '', '', '', '', '')";


    // $res=mysqli_query($con,$sen);

    // if(!$res) die("Hubo un error");
    // echo true;


    // $evento=$_POST["evento"];
    // $description=$_POST["description"];
    // $ubicacion=$_POST["ubicacion"];
    // $day=$_POST["day"];
    // $mounth=$_POST["mounth"];
    // $year=$_POST["year"];
    // $check=$_POST["check"];
    // $i_fecha=$_POST["i_fecha"];
    // $t_fecha=$_POST["t_fecha"];
    // $i_hora=$_POST["i_hora"];
    // $t_hora=$_POST["t_hora"];
    // $color=$_POST["color"];
    // $calle=$_POST["calle"];
    // $numero=$_POST["numero"];
    // $barrio=$_POST["barrio"];
    // $municipio=$_POST["municipio"];
    // $estado=$_POST["estado"];


    // $sen="INSERT INTO fecha (evento, description, ubicacion, calle, numero, barrio, municipio, estado, day, mounth, year, i_fecha, t_fecha, i_hora, t_hora, color) VALUES ('$evento','$description','$ubicacion','$calle','$numero','$barrio','$municipio','$estado','$day','$mounth','$year','$i_fecha','$t_fecha','$i_hora','$t_hora','$color')";

    // $fec = "INSERT INTO `fechas` (`id`, `idEvento`, `evento`, `description`, `idUbicacion`, `day`, `mounth`, `year`, `i_fecha`, `t_fecha`, `i_hora`, `t_hora`, `color`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '', '')";
    // $eve = "INSERT INTO `eventos` (`id`, `evento`, `description`, `idUbicacion`, `color`) VALUES (NULL, '', '', '', '')";
    // $ubi = "INSERT INTO `ubicaciones` (`id`, `nombre`, `calle`, `numero`, `barrio`, `municipio`, `estado`, `referencias`, `color`) VALUES (NULL, '', '', '', '', '', '', '', '')";


    // $res=mysqli_query($con,$sen);

    // if(!$res) die("Hubo un error");
    // echo true;

if($_POST['type']=="agendar"){
    agendar();
} else {
    echo "Error";
}
?>