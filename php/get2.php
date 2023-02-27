<?php
    $ide = $_POST["ide"];
    $day = $_POST["day"];
    $mounth = $_POST["mounth"];
    $year = $_POST["year"];

    require("./cn.php");
    $sql = "SELECT id FROM fechas WHERE day=$day and mounth=$mounth and year=$year ORDER BY id DESC";
    // $sql = "SELECT id FROM fechas WHERE day='28' and mounth='02' and year='2023';";
    echo $sql."\n";
    $resE = mysqli_query($con, $sql);
    // $rowE = mysqli_fetch_array($resE);
    // echo var_dump($rowE)."\n";
    while($rowE = mysqli_fetch_array($resE)){
        echo $rowE['id']." - ";
    }
?>