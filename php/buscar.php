<?php
if(!isset($_GET['loc']) && !isset($_GET['tip'])) die('[{"e":"1"}]');
if(!isset($_POST['type'])) die('[{"e":"1"}]');
include("./cn.php");

include("./sentencias.php");

$tip = $_GET['tip'];
$loc = $_GET['loc'];


$cad="";
$cad.= $tip!='0' ? " idTipo={$tip} " : "";
$cad.= ($loc!='0' and $tip!='0') ? " and " : "";
$cad.= $loc!='0' ?  " idLoc={$loc} " : "";

if(strlen($cad)==0){
    die('[{"e":"1"}]');
}
$sen ="SELECT id,idTipo,idLoc FROM general WHERE {$cad}";
$res = mysqli_query($con, $sen);
// $fil = mysqli_num_rows($res);

if(!$res)  die('[{"e":"0"}]');

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