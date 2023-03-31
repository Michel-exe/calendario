<?php
function sentencias($cat,$var,$tipo){
    $catID = $cat=='h' ? '1' : ($cat=='r' ? '2' : '3');
    $cad = $tipo==1 ? "idTipo={$catID}" : "id={$var}";

    $senHouse= "SELECT g.id,g.nombre,g.idTipo,g.stars,h.refer,h.precio,h.habitaciones,h.status,l.localidad 
        FROM general as g 
        JOIN house as h ON g.id=h.idHouse
        JOIN localidad as l ON h.idLoc=l.idLoc
        WHERE {$cad} ORDER BY pop DESC limit 50; ";
    $senRes="SELECT g.id,g.nombre,g.idTipo,g.stars,a.horariosO,a.horariosC,a.refer,a.servDom,ca.categoria,l.localidad FROM general as g 
        JOIN alimentos as a ON g.id=a.idAlimentos
        JOIN catealimentos as ca ON a.idCat=ca.idCat
        JOIN localidad as l ON a.idLoc=l.idLoc
        WHERE {$cad} ORDER BY pop DESC limit 50;";

    return $cat=="h" ? $senHouse : $senRes;
}

?>