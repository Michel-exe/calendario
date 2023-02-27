<?php
function fecha($fecha)
{
    date_default_timezone_set("America/Mexico_City");
    $hoy = date("Y-m-d");

    $datef = new DateTime($fecha . " 00:00:00");
    $dateh = new DateTime($hoy . " 00:00:00");
    $interval = $dateh->diff($datef);

    $difAño = ($interval->format("%y"));
    $difMes = $interval->format("%m");
    $difdia = $interval->format("%d");

    if ($difdia == "0" && $difMes == "0" && $difAño == "0") {
        return "Es Hoy";
    }

    return (strtotime($hoy) < strtotime($fecha) ? "Quedan " : "Han pasado ") . $difdia . " dia(s) " . (($difMes == "0") ? "" : $difMes . " mes(es) ") . (($difAño == "0") ? "" : "con " . $difAño . " año(s). ");
};

require("./php/cn.php");
$sen = "SELECT * FROM fechas WHERE id = 26";
$row = mysqli_fetch_array(mysqli_query($con, $sen));

// echo $row["evento"];
// echo "<br><br>";
// echo "<br><br>";


// $res2 = mysqli_query($con, $sen);
// while ($row2 = mysqli_fetch_array($res2)) {
//     echo "id _ ".$row2['id'] . "<br>";
//     echo "evento _ ".$row2['evento'] . "<br>";
//     echo "description _ ".$row2['description'] . "<br>";
//     echo "ubicacion _ ".$row2['ubicacion'] . "<br>";
//     echo "calle _ ".$row2['calle'] . "<br>";
//     echo "numero _ ".$row2['numero'] . "<br>";
//     echo "barrio _ ".$row2['barrio'] . "<br>";
//     echo "municipio _ ".$row2['municipio'] . "<br>";
//     echo "estado _ ".$row2['estado'] . "<br>";
//     echo "day _ ".$row2['day'] . "<br>";
//     echo "mounth _ ".$row2['mounth'] . "<br>";
//     echo "year _ ".$row2['year'] . "<br>";
//     echo "i_fecha _ ".$row2['i_fecha'] . "<br>";
//     echo "t_fecha _ ".$row2['t_fecha'] . "<br>";
//     echo "i_hora _ ".$row2['i_hora'] . "<br>";
//     echo "t_hora _ ".$row2['t_hora'] . "<br>";
//     echo "color _ ".$row2['color'] . "<br>";
// }

$dirLink = "calle+" . $row['calle'] . "+" . $row['numero'] . ",+" . $row['barrio'] . "+Cd+" . $row['municipio'] . "+" . $row['estado'];

?>
<div class="eventos">
    <div class="evento">
        <section style="background-color: <?php echo $row["color"] ?>">
            <h3><?php echo $row["evento"] ?></h3>
        </section>
        <div>
            <section class="eveDate">
                <div>
                    <b><?php echo fecha($row['i_fecha']); ?></b>
                </div>
            </section>
            <section class="eveSec">
                <div>
                    <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;">
                            <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path>
                            <path d="M686.7 638.6L544.1 535.5V288c0-4.4-3.6-8-8-8H488c-4.4 0-8 3.6-8 8v275.4c0 2.6 1.2 5 3.3 6.5l165.4 120.6c3.6 2.6 8.6 1.8 11.2-1.7l28.6-39c2.6-3.7 1.8-8.7-1.8-11.2z"></path>
                        </svg>
                    </span>
                    <b><?php echo $row["i_hora"] . " - " . $row["t_hora"] ?></b>
                </div>
                <div>
                    <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;">
                            <path d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm0 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z"></path>
                            <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h2zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5V1z"></path>
                        </svg>
                    </span>
                    <p><?php echo $row["description"] ?></p>
                </div>
            </section>
            <section class="eveSec">
                <div>
                    <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;">
                            <path fill="none" stroke="#000" stroke-width="2" d="M12,22 C12,22 4,16 4,10 C4,5 8,2 12,2 C16,2 20,5 20,10 C20,16 12,22 12,22 Z M12,13 C13.657,13 15,11.657 15,10 C15,8.343 13.657,7 12,7 C10.343,7 9,8.343 9,10 C9,11.657 10.343,13 12,13 L12,13 Z" data-darkreader-inline-stroke="" style="--darkreader-inline-stroke:#e8e6e3;"></path>
                        </svg>
                    </span>
                    <nav>
                        <p>
                            Calle: <b><?php echo $row["calle"] ?></b>
                            No. <b><?php echo $row["numero"] ?></b>
                            Barrio: <b><?php echo ($row["barrio"] | "---") ?></b>
                            Municipio de: <b><?php echo $row["municipio"] ?></b>
                            en el Estado de: <b><?php echo $row["estado"] ?></b>
                        </p>
                        <a href="https://www.google.com.mx/maps/search/<?php echo $dirLink; ?>" target="_blank">Ver en Google Maps</a>
                    </nav>
                </div>
            </section>
        </div>
    </div>
    <div class="evento">
        <section style="background-color: <?php echo $row["color"] ?>">
            <h3><?php echo $row["evento"] ?></h3>
        </section>
        <div>
            <section class="eveDate">
                <div>
                    <b><?php echo fecha($row['i_fecha']); ?></b>
                </div>
            </section>
            <section class="eveSec">
                <div>
                    <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;">
                            <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path>
                            <path d="M686.7 638.6L544.1 535.5V288c0-4.4-3.6-8-8-8H488c-4.4 0-8 3.6-8 8v275.4c0 2.6 1.2 5 3.3 6.5l165.4 120.6c3.6 2.6 8.6 1.8 11.2-1.7l28.6-39c2.6-3.7 1.8-8.7-1.8-11.2z"></path>
                        </svg>
                    </span>
                    <b><?php echo $row["i_hora"] . " - " . $row["t_hora"] ?></b>
                </div>
                <div>
                    <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;">
                            <path d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm0 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z"></path>
                            <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h2zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5V1z"></path>
                        </svg>
                    </span>
                    <p><?php echo $row["description"] ?></p>
                </div>
            </section>
            <section class="eveSec">
                <div>
                    <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;">
                            <path fill="none" stroke="#000" stroke-width="2" d="M12,22 C12,22 4,16 4,10 C4,5 8,2 12,2 C16,2 20,5 20,10 C20,16 12,22 12,22 Z M12,13 C13.657,13 15,11.657 15,10 C15,8.343 13.657,7 12,7 C10.343,7 9,8.343 9,10 C9,11.657 10.343,13 12,13 L12,13 Z" data-darkreader-inline-stroke="" style="--darkreader-inline-stroke:#e8e6e3;"></path>
                        </svg>
                    </span>
                    <nav>
                        <p>
                            Calle: <b><?php echo $row["calle"] ?></b>
                            No. <b><?php echo $row["numero"] ?></b>
                            Barrio: <b><?php echo ($row["barrio"] | "---") ?></b>
                            Municipio de: <b><?php echo $row["municipio"] ?></b>
                            en el Estado de: <b><?php echo $row["estado"] ?></b>
                        </p>
                        <a href="https://www.google.com.mx/maps/search/<?php echo $dirLink; ?>" target="_blank">Ver en Google Maps</a>
                    </nav>
                </div>
            </section>
        </div>
    </div>
</div>