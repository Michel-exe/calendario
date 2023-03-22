<?php
include("./cn.php");
include("./sentencias.php");

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
                'estrellas' => $rh['stars'],
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
                'estrellas' => $rr['stars'],
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
