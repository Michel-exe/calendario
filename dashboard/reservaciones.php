<?php
include("./php/cn.php");

$res = mysqli_query($con, "SELECT * FROM estatusreserva ORDER BY idStatus ASC;");
$opt = '';
$estRes = '';
while ($r = mysqli_fetch_array($res)) {
   $opt .= "<option value='{$r['idStatus']}'>{$r['status']}</option>";
   $estRes .= "<div>
      <span style='background: {$r['color']}'></span>
      <p>{$r['status']}</p>
   </div>";
}
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
   <title>Reservaciones</title>
</head>

<body>
   <div class="cont">
      <?php require("./components/header.php"); ?>
      <div class="cont-head">
         <?php require("./components/main.php"); ?>
         <div class="cont-body">
            <div class="reservaciones">
               <div class="reser-inf">
                  <form action="">
                     <section class="inp inp-nor">
                        <label require>Opciones: </label>
                        <select name="" id="">
                           <option value="N">Opciones</option>
                           <option value="N">Todas</option>
                           <?php

                           include("./php/cn.php");
                           $res = mysqli_query($con, "SELECT * FROM estatusreserva ORDER BY idStatus ASC;");
                           while ($r = mysqli_fetch_array($res)) {
                              echo "<option value='{$r['idStatus']}'>{$r['status']}</option>";
                           }
                           ?>
                        </select>
                     </section>
                  </form>
                  <div class="colors">
                     <?php echo $estRes ?>
                  </div>
               </div>
               <div class="reser">
                  <div class="tabla">
                     <div class="tabla-cat">
                        <section>Usuario</section>
                        <section>nombre</section>
                        <section>Llegada</section>
                        <section>Salida</section>
                        <section class='tab-noc'>Noches</section>
                        <section>Precio Noc.</section>
                        <section>Precio Tot</section>
                        <section>Pagado</section>
                        <section></section>
                        <section class='bg-col'></section>
                     </div>
                     <div class="tabla-inf">
                        <?php

                        $where = "";
                        if (isset($_GET['t'])) {
                           $tipo = $_GET['t'];
                           $where = $tipo == "N" ? "" : "WHERE r.status='{$tipo}'";
                        }

                        try {
                           $res = mysqli_query($con, "SELECT r.idRes, u.whatsapp, r.idUser, r.id, r.adultos, r.ninos, r.llegada, r.salida, r.fecha, r.fechaAutorizacion, r.restante, r.status, u.usuario, u.apellidoP, u.apellidoM, u.correoGoogle, u.telefono, g.nombre, h.precio, er.status, er.color
                              FROM reservaciones AS r 
                                 JOIN usuario as u ON r.idUser=u.idUser
                                 JOIN general as g ON r.id=g.id
                                 JOIN house as h ON g.id=h.idHouse
                                 JOIN estatusreserva as er ON r.status=er.idStatus
                                 {$where}
                              ;");
                        } catch (\Throwable $th) {
                           echo $th;
                        }

                        while ($r = mysqli_fetch_array($res)) {
                           $date1 = new DateTime($r['llegada']);
                           $date2 = new DateTime($r['salida']);
                           $diff = $date1->diff($date2);
                           $diff = $diff->days;
                           $precTot = $diff * $r['precio'];
                           echo "
                  <div data-us='{$r['idUser']}' data-reser='{$r['idRes']}' data-house='{$r['id']}'>
                     <section>{$r['usuario']}</section>
                     <section>{$r['nombre']}</section>
                     <section>{$r['llegada']}</section>
                     <section>{$r['salida']}</section>
                     <section class='tab-noc'>{$diff}</section>
                     <section>{$r['precio']} MXN</section>
                     <section>{$precTot} MXN</section>
                     <section>{$r['restante']} MXN</section>
                     <section class='icons' data-us='{$r['idUser']}' data-reser='{$r['idRes']}' data-house='{$r['id']}' data-tot='{$precTot}'>
                        <span data-type='acept'>
                           <svg stroke='currentColor' fill='currentColor' stroke-width='0' viewBox='0 0 1024 1024' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg' data-darkreader-inline-fill=' data-darkreader-inline-stroke=' style='--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;'><path d='M912 190h-69.9c-9.8 0-19.1 4.5-25.1 12.2L404.7 724.5 207 474a32 32 0 0 0-25.1-12.2H112c-6.7 0-10.4 7.7-6.3 12.9l273.9 347c12.8 16.2 37.4 16.2 50.3 0l488.4-618.9c4.1-5.1.4-12.8-6.3-12.8z'></path></svg>
                        </span>
                        <span data-type='user'>
                           <svg stroke='currentColor' fill='currentColor' stroke-width='0' viewBox='0 0 24 24' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg'><path d='M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z'></path></svg>
                        </span>
                        <span data-type='pagar'>
                           <svg stroke='currentColor' fill='currentColor' stroke-width='0' viewBox='0 0 24 24' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg' data-darkreader-inline-fill=' data-darkreader-inline-stroke=' style='--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;'><path fill='none' d='M0 0h24v24H0V0z'></path><path d='M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z'></path></svg>
                        </span>
                        <span data-type='cancel'>
                           <svg stroke='currentColor' fill='currentColor' stroke-width='0' version='1.1' viewBox='0 0 16 16' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg' data-darkreader-inline-fill=' data-darkreader-inline-stroke=' style='--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;'><path d='M8 0c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zM8 14.5c-3.59 0-6.5-2.91-6.5-6.5s2.91-6.5 6.5-6.5 6.5 2.91 6.5 6.5-2.91 6.5-6.5 6.5z'></path><path d='M10.5 4l-2.5 2.5-2.5-2.5-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 2.5-2.5 2.5 2.5 1.5-1.5-2.5-2.5 2.5-2.5z'></path></svg>
                        </span>
                        <span data-type='trash'>
                           <svg stroke='currentColor' fill='none' stroke-width='2' viewBox='0 0 24 24' stroke-linecap='round' stroke-linejoin='round' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg' data-darkreader-inline-stroke=' style='--darkreader-inline-stroke:currentColor;'><polyline points='3 6 5 6 21 6'></polyline><path d='M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'></path><line x1='10' y1='11' x2='10' y2='17'></line><line x1='14' y1='11' x2='14' y2='17'></line></svg>
                        </span>
                        <span data-type='info' 
                              data-id='{$r['idRes']}'
                              data-phone='{$r['telefono']}'
                              data-mail='{$r['correoGoogle']}'
                              data-fecha='{$r['fecha']}'
                              data-name='{$r['usuario']}'
                              data-apellidos='{$r['apellidoP']} {$r['apellidoM']}'
                              data-llegada='{$r['llegada']}'
                              data-salida='{$r['salida']}'
                              data-whatsapp='{$r['whatsapp']}'
                              >
                           <svg stroke='currentColor' fill='currentColor' stroke-width='0' viewBox='0 0 1024 1024' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg' data-darkreader-inline-fill=' data-darkreader-inline-stroke=' style='--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;'><path d='M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z'></path><path d='M464 336a48 48 0 1 0 96 0 48 48 0 1 0-96 0zm72 112h-48c-4.4 0-8 3.6-8 8v272c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V456c0-4.4-3.6-8-8-8z'></path></svg>
                        </span>
                     </section>
                     <section class='bg-col' style='background:{$r['color']}'></section>
                  </div>
               ";
                        } ?>
                     </div>
                  </div>
               </div>
               <div class="reser-user">
                  <section>
                     <div>
                        <label>Nombre:
                           <b>{nombre nombre nombre nombre}</b>
                        </label>
                     </div>
                     <div>
                        <label>Apellidos:
                           <b>{nombre}</b>
                        </label>
                     </div>
                     <div>
                        <label>Reservo el dia:
                           <b>{nombre}</b>
                        </label>
                     </div>
                     <div>
                        <label>Telefono:
                           <a href="">
                              <b>{nombre}</b>
                           </a>
                        </label>
                     </div>
                     <div>
                        <label>Correo:
                           <a href="">
                              <b>{nombre}</b>
                           </a>
                        </label>
                     </div>
                     <form>
                        <section class="inp inp-nor">
                           <label require>Llegada: </label>
                           <input type="date">
                        </section>
                        <section class="inp inp-nor">
                           <label require>Salida: </label>
                           <input type="date">
                        </section>
                        <section class="inp inp-sub">
                           <button type="button">Cerrar</button>
                           <button type="submit">Actualizar</button>
                        </section>
                     </form>
                  </section>
               </div>
            </div>
         </div>
      </div>
      <?php require("./components/load.php"); ?>
   </div>
   <script src="./js/rutas.js"></script>
   <script src="./js/peticion.js"></script>
   <script src="./js/componentes.js"></script>
   <script src="./js/reservaciones.js"></script>
</body>

</html>