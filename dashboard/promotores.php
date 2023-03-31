<?php

include("./php/cn.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/basicos.css">
    <link rel="stylesheet" href="../css/loader.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Promotores</title>
</head>

<body>
    <div class="cont">
        <?php require("./components/header.php"); ?>
        <div class="cont-head">
            <?php require("./components/main.php"); ?>
            <div class="cont-body">
                <div class="reservaciones">
                    <div class="reser">
                        <div class="tabla tablaProm">
                            <div class="tabla-cat">
                                <section>Foto</section>
                                <section>Nombre</section>
                                <section>Apellidos</section>
                                <section>Telefono</section>
                                <section>Correo</section>
                                <section>Direccion</section>
                                <section>del - edit</section>
                            </div>
                            <div class="tabla-inf">
                                <?php
                                try {
                                    $res = mysqli_query($con, "SELECT * FROM promotores;");
                                } catch (\Throwable $th) {
                                    echo $th;
                                }

                                while ($r = mysqli_fetch_array($res)) {
                                    echo "
                            <div data-ide='{$r['idPromotor']}'>
                                <section>
                                    <img src='./promotores/{$r['foto']}' alt='{$r['nombre']}' />
                                </section>
                                <section>{$r['idPromotor']}: {$r['nombre']}</section>
                                <section>{$r['apellidoP']} {$r['apellidoM']}</section>
                                <section> 
                                    <a href='tel:+52{$r['telefono']}'>{$r['telefono']}</a>
                                </section>
                                <section>
                                    <a href='mailto:{$r['mail']}'>{$r['mail']}</a>
                                </section>
                                <section>{$r['direccion']}</section>
                                <section>
                                    <span data-type='trash'>
                                        <svg stroke='currentColor' fill='none' stroke-width='2' viewBox='0 0 24 24' stroke-linecap='round' stroke-linejoin='round' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg' data-darkreader-inline-stroke=' style=' --darkreader-inline-stroke:currentcolor;'='><polyline points='3 6 5 6 21 6'></polyline><path d='M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'></path><line x1='10' y1='11' x2='10' y2='17'></line><line x1='14' y1='11' x2='14' y2='17'></line></svg>
                                    </span>
                                    <span data-type='pencil'>
                                        <svg stroke='currentColor' fill='currentColor' stroke-width='0' version='1.1' viewBox='0 0 17 17' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg'><g></g><path d='M15.529 2.857l-1.403-1.404c-0.565-0.566-1.555-0.566-2.122 0l-9.057 9.058-1.722 5.288 5.248-1.765 9.055-9.056c0.586-0.584 0.586-1.536 0.001-2.121zM3.094 13.294l0.645-1.979 1.934 1.935-1.963 0.66-0.616-0.616zM4.355 10.518l5.493-5.493 2.111 2.11-5.494 5.494-2.11-2.111zM10.555 4.317l0.729-0.729 2.111 2.11-0.729 0.729-2.111-2.11zM14.822 4.271l-0.72 0.72-2.111-2.11 0.72-0.721c0.189-0.189 0.518-0.189 0.707 0l1.403 1.404c0.196 0.196 0.196 0.512 0.001 0.707z'></path></svg>
                                    </span>
                                </section>
                            </div>
                            ";
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>