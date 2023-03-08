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