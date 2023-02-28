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
?>