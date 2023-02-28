<?php
    if(!isset($_POST['type'])) die("Peticion Denegada");
    $type = $_POST['type'];
    if($type=="todo"){
        $mesAnt = $_POST['mesAnt'];
        $mes = $_POST['mes'];
        $mesDes = $_POST['mesDes'];
        require("./cn.php");
        $sen= "SELECT * FROM fechas WHERE mounth='$mes' OR mounth='$mesAnt' OR mounth='$mesDes' ORDER BY mounth DESC";
        // $sen= "SELECT * FROM fechas";
        $res = mysqli_query($con, $sen);
        $json = array();
        while($row = mysqli_fetch_array($res)){
            $ide = $row['idEvento'];
            $eve = "SELECT * FROM eventos WHERE id = '$ide'";
            $res2 = mysqli_query($con, $eve);
            $row2 = mysqli_fetch_array($res2);
            $evento = $row2['evento'];
            $description = $row2['description'];
    
            $json[] = array(
                'id' => $row['id'],
                'evento' => $evento,
               'description' => $description,
               'day' => $row['day'],
               'mounth' => $row['mounth'],
               'year' => $row['year'],
               'i_fecha' => $row['i_fecha'],
               't_fecha' => $row['t_fecha'],
               'i_hora' => $row['i_hora'],
               't_hora' => $row['t_hora'],
               'color' => $row['color'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
        mysqli_close($con);
    } else if ($type=="evento") {
        require ("./funciones.php");
        $ide = $_POST["ide"];
        $day = $_POST["day"];
        $mounth = $_POST["mounth"];
        $year = $_POST["year"];

        require("./cn.php");
        $sql =
            "SELECT f.id,f.day, f.mounth, f.year,f.i_fecha,f.t_fecha,f.i_hora,f.t_hora,f.color, e.evento,e.description, u.calle,u.numero,u.barrio,u.municipio,u.estado,u.referencias 
            FROM fechas as f 
            JOIN eventos as e ON e.id = f.idEvento 
            JOIN ubicaciones as u ON u.id = f.idUbicacion 
            WHERE f.day='$day' and f.mounth='$mounth' and f.year='$year';";

        $resE = mysqli_query($con, $sql);
        $fil = mysqli_num_rows($resE);
        if($fil==0){
            die('[{"e":"2"}]');
        }
        while($rowE = mysqli_fetch_array($resE)){
            $f = fecha($rowE['i_fecha']);
            $jsonE[] = array(
                'id' => $rowE['id'],
                'mounth' => $rowE['mounth'],
                'year' => $rowE['year'],
                'i_fecha' => $rowE['i_fecha'],
                't_fecha' => $rowE['t_fecha'],
                'i_hora' => $rowE['i_hora'],
                'diasRes' => $f,
                't_hora' => $rowE['t_hora'],
                'dirLink' => "calle+{$rowE['calle']}+{$rowE['numero']}+{$rowE['barrio']}+cd+{$rowE['municipio']}+{$rowE['estado']}",
                'color' => $rowE['color'],
                'evento' => $rowE['evento'],
                'description' => $rowE['description'],
                'calle' => $rowE['calle'],
                'numero' => $rowE['numero'],
                'barrio' => $rowE['barrio'],
                'municipio' => $rowE['municipio'],
                'estado' => $rowE['estado'],
                'referencias' => $rowE['referencias'],
            );
        }
        $jsonstringE = json_encode($jsonE);
        echo $jsonstringE;
        mysqli_close($con);
    }

?>