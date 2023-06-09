<?php
include("./cn.php");
function sentenciaBus($cat,$var,$tipo,$loc){
    $orden ="";

    $catID = $cat=='h' ? '1' : ($cat=='r' ? '2' : '3');
    $cad = $tipo!='0' ? "idTipo={$catID}" : "";
    $cad.= $loc!='0' ?  "and idLoc={$loc}" : "";

    $senHouse= "SELECT g.id,g.nombre,g.idTipo,h.refer,h.precio,h.habitaciones,h.status,h.estrellas,l.localidad 
        FROM general as g 
        JOIN house as h ON g.id=h.idHouse
        JOIN localidad as l ON h.idLoc=l.idLoc
        WHERE {$cad};";
    $senRes="SELECT g.id,g.nombre,g.idTipo,a.horariosO,a.horariosC,a.refer,a.servDom,ca.categoria,l.localidad FROM general as g 
        JOIN alimentos as a ON g.id=a.idAlimentos
        JOIN catealimentos as ca ON a.idCat=ca.idCat
        JOIN localidad as l ON a.idLoc=l.idLoc
        WHERE {$cad};";

    return $cat=="h" ? $senHouse : $senRes;
}
function sentencias($cat,$var,$tipo){
    $orden ="";

    $catID = $cat=='h' ? '1' : ($cat=='r' ? '2' : '3');
    $cad = $tipo==1 ? "idTipo={$catID}" : "id={$var}";

    $senHouse= "SELECT g.id,g.nombre,g.idTipo,h.refer,h.precio,h.habitaciones,h.status,h.estrellas,l.localidad 
        FROM general as g 
        JOIN house as h ON g.id=h.idHouse
        JOIN localidad as l ON h.idLoc=l.idLoc
        WHERE {$cad};";
    $senRes="SELECT g.id,g.nombre,g.idTipo,a.horariosO,a.horariosC,a.refer,a.servDom,ca.categoria,l.localidad FROM general as g 
        JOIN alimentos as a ON g.id=a.idAlimentos
        JOIN catealimentos as ca ON a.idCat=ca.idCat
        JOIN localidad as l ON a.idLoc=l.idLoc
        WHERE {$cad};";

    return $cat=="h" ? $senHouse : $senRes;
}
$cat = isset($_POST['cat']) ? $_POST['cat'] : "0";
$arr = array('t','h','r','c','a');
if($cat != "0"){
    $res = mysqli_query($con, sentencias($arr[$cat],0,1));
    $json = array();
    if($cat =='1'){
        while ($r = mysqli_fetch_array($res)) {
            $row = mysqli_fetch_array(mysqli_query($con, "SELECT src FROM imagenes WHERE id={$r['id']} LIMIT 1"));
            $src = $row['src'];
            $json[] = array(
                'idTipo' => $r['idTipo'],
                'id' => $r['id'],
                'nombre' => $r['nombre'],
                'src' => $src,
                'refer' => $r['refer'],
                'precio' => $r['precio'],
                'habitaciones' => $r['habitaciones'],
                'status' => $r['status'],
                'estrellas' => $r['estrellas'],
                'localidad' => $r['localidad'],
            );
        }
        $jsonstring = json_encode($json);
        mysqli_close($con);
        die($jsonstring);
    }
    if($cat =='2'){
        while ($r = mysqli_fetch_array($res)) {
            $row = mysqli_fetch_array(mysqli_query($con, "SELECT src FROM imagenes WHERE id={$r['id']} LIMIT 1"));
            $src = $row['src'];
            $json[] = array(
                'idTipo' => $r['idTipo'],
                'id' => $r['id'],
                'nombre' => $r['nombre'],
                'idTipo' => $r['idTipo'],
                'src' => $src,
                'refer' => $r['refer'],
                'horariosO' => $r['horariosO'],
                'horariosC' => $r['horariosC'],
                'servDom' => $r['servDom'],
                'categoria' => $r['categoria'],
                'categoria' => $r['categoria'],
                'localidad' => $r['localidad'],
            );
        }
        $jsonstring = json_encode($json);
        mysqli_close($con);
        die($jsonstring);
    }

    if($cat == '3' || $cat == '4'){
        die('[{"e":"0"}]');
    }
    
    die();
}

if(isset($_GET['loc']) && isset($_GET['tip'])){
    // if(($_GET['loc']=='0') && ($_GET['tip']=='0')) break;

    $tip = $_GET['tip'];
    $loc = $_GET['loc'];
    echo $loc." - ".$tip."\n";

    $cad="";
    $cad.= $tip!='0' ? " idTipo={$tip} " : "";
    $cad.= ($loc!='0' and $tip!='0') ? " and " : "";
    $cad.= $loc!='0' ?  " h.idLoc={$loc} " : "";
    echo $cad;

    $sen ="SELECT id,idTipo FROM general as g 
        JOIN house as h ON g.id=h.idHouse
        JOIN localidad as l ON h.idLoc=l.idLoc
    WHERE g.idTipo='1' AND l.idLoc='5';";
    $res = mysqli_query($con, $sen);
    $r = mysqli_fetch_array($res);
    var_dump($r);
    die();
}
$sen ="SELECT id,idTipo FROM general limit 30";
$res = mysqli_query($con, $sen);
$json = array();
while ($r = mysqli_fetch_array($res)) {
    $row = mysqli_fetch_array(mysqli_query($con, "SELECT src FROM imagenes WHERE id={$r['id']} LIMIT 1"));
    $src = $row['src'];
    if($r['idTipo']=="1"){
        $resHouse = mysqli_query($con, sentencias("h",$r['id'],0));
        while ($rh = mysqli_fetch_array($resHouse)){
            $json[] = array(
                'idTipo' => $rh['idTipo'],
                'id' => $rh['id'],
                'nombre' => $rh['nombre'],
                'src' => $src,
                'refer' => $rh['refer'],
                'precio' => $rh['precio'],
                'habitaciones' => $rh['habitaciones'],
                'status' => $rh['status'],
                'estrellas' => $rh['estrellas'],
                'localidad' => $rh['localidad'],
            );
        }

    } else if($r['idTipo']=="2"){
        $resRes = mysqli_query($con, sentencias("r",$r['id'],0));
        while ($rr = mysqli_fetch_array($resRes)){
            $json[] = array(
                'idTipo' => $rr['idTipo'],
                'id' => $rr['id'],
                'nombre' => $rr['nombre'],
                'idTipo' => $rr['idTipo'],
                'src' => $src,
                'refer' => $rr['refer'],
                'horariosO' => $rr['horariosO'],
                'horariosC' => $rr['horariosC'],
                'servDom' => $rr['servDom'],
                'categoria' => $rr['categoria'],
                'categoria' => $rr['categoria'],
                'localidad' => $rr['localidad'],
            );
        }
    }
}
$jsonstring = json_encode($json);
echo $jsonstring;
mysqli_close($con);
?>
