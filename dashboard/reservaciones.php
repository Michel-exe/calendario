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
                        $res = mysqli_query($con, "SELECT r.idRes, r.idUser, r.id, r.adultos, r.ninos, r.llegada, r.salida, r.fecha, r.fechaAutorizacion, r.restante, r.status, u.usuario, u.apellidoP, u.apellidoM, u.correoGoogle, u.telefono, g.nombre, h.precio, er.status, er.color
                     FROM reservaciones AS r 
                        JOIN usuario as u ON r.idUser=u.idUser
                        JOIN general as g ON r.id=g.id
                        JOIN house as h ON g.id=h.idHouse
                        JOIN estatusreserva as er ON r.status=er.idStatus
                     ;");
                        // $resul = var_dump(mysqli_fetch_array($res));


                        // echo var_dump($resul);
                        // echo "<br><br><br>";
                        while ($r = mysqli_fetch_array($res)) {
                           $date1 = new DateTime($r['llegada']);
                           $date2 = new DateTime($r['salida']);
                           $diff = $date1->diff($date2);
                           $diff = $diff->days;
                           $precTot = $diff * $r['precio'];
                           // will output 2 days
                           // echo $diff->days . ' days ';
                           echo "
                  <div data-us='{$r['idUser']}' data-reser='{$r['idRes']}' data-house='{$r['id']}'>
                     <section>{$r['usuario']} - {$r['idUser']} - {$r['idRes']}</section>
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
                        <span data-type='pencil'>
                           <svg stroke='currentColor' fill='currentColor' stroke-width='0' viewBox='0 0 1024 1024' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg' data-darkreader-inline-fill=' data-darkreader-inline-stroke=' style='--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;'><path d='M964.256 49.664C929.392 16.256 890.933-.672 849.877-.672c-64.192 0-111.024 41.472-123.841 54.176-18.032 17.856-633.152 633.2-633.152 633.2a33.011 33.011 0 0 0-8.447 14.592C70.565 752.559 1.077 980.016.387 982.304c-3.567 11.648-.384 24.337 8.208 32.928a32.336 32.336 0 0 0 22.831 9.44c3.312 0 6.655-.496 9.919-1.569 2.352-.767 237.136-76.655 275.775-88.19a32.736 32.736 0 0 0 13.536-8.033c24.416-24.128 598.128-591.456 636.208-630.784 39.392-40.592 58.96-82.864 58.208-125.616-.784-42.208-21.248-82.848-60.816-120.816zM715.845 155.84c16.304 3.952 54.753 16.862 94.017 56.479 39.68 40.032 50.416 85.792 52.416 96.208-125.824 125.168-415.456 411.728-529.632 524.672-10.544-24.56-27.584-54.144-54.993-81.76-33.471-33.728-67.536-52.783-93.808-63.503 112.992-113.008 408.08-408.224 532-532.096zM140.39 741.95c17.584 4.672 54.111 18.224 91.344 55.76 28.672 28.912 42.208 60.8 48.288 80.24-44.48 14.304-141.872 47.92-203.76 67.872 18.336-60.336 49.311-154.304 64.128-203.872zm780.031-491.584a1748.764 1748.764 0 0 1-6.065 6.16c-10.113-26.049-27.857-59.52-58.577-90.496-31.391-31.648-63.231-50.32-88.75-61.36 2.175-2.16 3.855-3.857 4.511-4.496 3.664-3.617 36.897-35.376 78.32-35.376 23.84 0 47.248 10.88 69.617 32.32 26.511 25.424 40.175 50.512 40.624 74.592.431 24.576-12.913 51.04-39.68 78.656z'></path></svg>
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
   <script src="./form.js"></script>
   <script>
      document.querySelector("select").addEventListener("change", e => {
         const val = e.target.value
         window.location.href = `${window.location.origin}${window.location.pathname}?t=${val}`
      })
      const resUser = document.querySelector(".reser-user")
      resUser.addEventListener("click", e => {
         if (e.target.classList.contains("reser-user")) {
            resUser.classList.toggle("act")
         }
      })
      document.querySelector(".tabla").addEventListener("click", e => {
         const t = e.target;
         if (t.tagName == "SPAN") {
            document.querySelector(".cont-load").classList.add("act")
            const tp = t.dataset.type;
            let obj = []
            if (tp == "acept") {
               if (!window.confirm("¿Esta segur@ de aceptar el elemento?")) {
                  return
               }
            }
            if (tp == "pencil") {
               alert("Redireeccionando")
            }
            if (tp == "pagar") {
               const prom = window.prompt("Escriba la cantidad que va a pagar")
               if (prom.length == 0 || !/\d{1,6}$/.test(prom)) return alert("Escriba un numero valido")
               obj.push({
                  n: "pago",
                  v: prom
               });
            }
            if (tp == "cancel") {
               if (!window.confirm("¿Esta segur@ de aceptar el elemento?")) {
                  return
               }
            }
            if (tp == "trash") {
               if (!window.confirm("¿Esta segur@ de eliminar el elemento?")) {
                  return
               }
            }
            if (tp == "info") {
               const resUserSec = resUser.querySelector("section");
               resUserSec.children[0].querySelector("b").innerHTML = t.dataset.name
               resUserSec.children[1].querySelector("b").innerHTML = t.dataset.apellidos
               resUserSec.children[2].querySelector("b").innerHTML = t.dataset.fecha

               resUserSec.children[3].querySelector("a").setAttribute("href", `tel:+52${t.dataset.phone}`)
               resUserSec.children[3].querySelector("b").innerHTML = t.dataset.phone

               resUserSec.children[4].querySelector("b").innerHTML = t.dataset.mail
               resUserSec.children[4].querySelector("a").setAttribute("href", `mailto:${t.dataset.mail}`)

               document.querySelector(".reser-user").classList.toggle("act");

               const resUserSecD = resUser.querySelector("form");
               resUserSecD.children[0].querySelector("input").value = t.dataset.llegada
               resUserSecD.children[1].querySelector("input").value = t.dataset.salida

            }

            obj.push({
               n: "type",
               v: tp
            }, {
               n: "ide",
               v: t.parentNode.dataset.reser
            })
            console.log(obj);
            fet(
               "./php/reservaciones.php",
               obj,
               (res) => {
                  console.log(res);
                  window.location.href = `${window.location.origin}${window.location.pathname}`
               }
            )

            // console.log(t.dataset.type);
         }
      })
   </script>
</body>
</html>