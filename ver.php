<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/basicos.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/ver.css">
    <script src="./dashboard/eventos.js"></script>
    <title>NanaHouse</title>
</head>

<body>
    <?php
    if(!isset($_GET['ide'])) die('Peticion Denegada');
    include("./php/cn.php");


    $ide=$_GET['ide'];

    $sen="SELECT idTipo FROM general WHERE id={$ide}";
    $res = mysqli_query($con, $sen);
    $gen = mysqli_fetch_array($res);
    if(!isset($gen)) die("Recurso no encontrado");
    if($gen['idTipo']!="1") die ("Sitio web en reparacion");


    include('./components/header.php');


    $senCom = "SELECT * FROM comida WHERE idHouse={$ide}";
    $senImg = "SELECT src FROM imagenes WHERE id={$ide} LIMIT 5";
    $senSer = "SELECT s.servicio,s.icon FROM house_servicios as hs 
                    JOIN servicios as s ON hs.idServicios=s.idServicios 
                WHERE idHouse={$ide}";
    $senGen = "SELECT g.id,g.nombre,r.tipo,h.refer,h.precio,h.habitaciones,h.status,h.estrellas,l.localidad FROM general as g 
                    JOIN reftipos as r ON g.idTipo=r.idTipo
                    JOIN house as h ON g.id=h.idHouse
                    JOIN localidad as l ON h.idLoc=l.idLoc
                WHERE id ={$ide};";
    $resGen = mysqli_query($con, $senGen);
    $gen = mysqli_fetch_array($resGen);
    ?>
    <div class="cuerpo">
        <div class="estab">
            <div class="inf-ref">
                <div class="nom">
                    <h1><?php echo $gen['nombre'] ?></h1>
                </div>
                <div class="cal">
                    <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;">
                            <path d="M908.1 353.1l-253.9-36.9L540.7 86.1c-3.1-6.3-8.2-11.4-14.5-14.5-15.8-7.8-35-1.3-42.9 14.5L369.8 316.2l-253.9 36.9c-7 1-13.4 4.3-18.3 9.3a32.05 32.05 0 0 0 .6 45.3l183.7 179.1-43.4 252.9a31.95 31.95 0 0 0 46.4 33.7L512 754l227.1 119.4c6.2 3.3 13.4 4.4 20.3 3.2 17.4-3 29.1-19.5 26.1-36.9l-43.4-252.9 183.7-179.1c5-4.9 8.3-11.3 9.3-18.3 2.7-17.5-9.5-33.7-27-36.3z"></path>
                        </svg>
                    </span>
                    <b><?php echo $gen['estrellas'] ?> de calificacion</b>
                </div>
                <div class="ubi">
                    <a href="#">En <?php echo $gen['localidad'] ?> Tlaxcala</a>
                </div>
            </div>
            <div class="inf-img">
                <nav>
                    <?php
                    $res = mysqli_query($con, $senImg);
                    while ($r = mysqli_fetch_array($res)) {
                        echo "
                            <picture>
                                <img src='./archivos/{$r['src']}' alt=''>
                            </picture>
                            ";
                    }
                    ?>
                </nav>
            </div>
            <div class="inf">
                <div class="inf-gen">
                    <div class="inf-gen-gen">
                        <h2>De Nanahouse </h2>
                        <p>Con <?php echo $gen['habitaciones'] ?> recamaras</p>
                    </div>
                    <div class="inf-gen-ref">
                        <h2>Ubicacion </h2>
                        <p><?php echo $gen['refer'] ?> </p>
                    </div>
                    <div class="inf-gen-ali">
                        <h2>La comida que ofrece</h2>
                        <ul>
                            <?php
                            $res = mysqli_query($con, $senCom);
                            while ($r = mysqli_fetch_array($res)) {
                                echo "
                                    <li>De <b>{$r['tipo']}</b>, {$r['platillo']} {$r['porcion']}{$r['tipoPorcion']} </li>
                                    ";
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="inf-gen-ser">
                        <h2>Los servicios que ofrece</h2>

                        <?php
                        $res = mysqli_query($con, $senSer);
                        while ($r = mysqli_fetch_array($res)) {
                            echo "
                                <span>
                                    <b>{$r['icon']}</b>
                                    <p>{$r['servicio']}</p>
                                </span>
                                ";
                        }
                        ?>
                    </div>
                </div>
                <div class="inf-pago">
                    <form data-pre="<?php echo $gen['precio'] ?>" method="get" action="./agendar.php">
                        <h2>$<?php echo $gen['precio'] ?>.00 MXN <span>Noche</span></h2>
                        <fieldset>
                            <section class="inp inp-nor">
                                <label require>llegada: </label>
                                <input type="date" name="hl" required data-i="1" data-co="0" data-le="15" maxlength="15" >
                            </section>
                            <section class="inp inp-nor">
                                <label require>Salida: </label>
                                <input type="date" name="hs" required data-i="2" data-co="0" data-le="15" maxlength="15" >
                            </section>
                            <section class="inp inp-nor">
                                <label require>Adultos: </label>
                                <input type="number" name="a" value="1" min="0" class="inpEvent" required data-co="0" data-le="3" maxlength="3" >
                                <span> <b>0</b> / 3 </span>
                            </section>
                            <section class="inp inp-nor">
                                <label require>Niños: </label>
                                <input type="number" name="n" value="0" min="0" class="inpEvent" required data-co="0" data-le="3" maxlength="3" >
                                <span> <b>0</b> / 3 </span>
                            </section>
                            <input type="number" name="ide" hidden required value="<?php echo $ide ?>" >
                            <input type="text" name="nom" hidden value="<?php echo $gen['nombre'] ?>" >
                        </fieldset>
                        <fieldset class="submit">
                            <button type="submit">Reservar</button>
                        </fieldset>
                    </form>
                    <div id="precio"><p><span>a $45.00 MXN</span><span>5 noches</span></p><p>Total de: 225</p></div>
                </div>
            </div>
        </div>
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
    <script src="./ver.js"></script>
</body>
</html>