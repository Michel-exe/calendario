<?php
    // $con = mysqli_connect('localhost','root','','calendario');
    $con = mysqli_connect('localhost','root','','a1');
    mysqli_set_charset($con, "utf8");
    if(!$con){
        die("Coneccion Fallida: " . mysqli_connect_error());
    }
?>
