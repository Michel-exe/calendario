<?php
if (!isset($_GET['t'])) header("location:../error.html");
$get = $_GET['t'];

$nom = $get == '1' ? 'NanaHouse' : 'NanaFood';
$form = $get == '1' ? 'h' : 'r';

include("./php/cn.php");
$opt = "";
$res = mysqli_query($con, "SELECT * FROM localidad");
while ($r = mysqli_fetch_array($res)) {
   $opt .= "<option value='{$r['idLoc']}'>{$r['localidad']}</option>";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Agregar</title>
   <link rel="stylesheet" href="../css/basicos.css">
   <link rel="stylesheet" href="../css/dashboard.css">
   <link rel="stylesheet" href="../css/loader.css">
   <script src="./eventos.js"></script>
</head>
<body>
   <div class="cont">
      <?php require("./components/header.php"); ?>
      <div class="cont-head">
         <?php require("./components/main.php"); ?>
         <div class="cont-body">
            <form action="" data-t="<?php echo $form ?>">
               <fieldset>
                  <h3>Nombre de <?php echo $nom ?></h3>
                  <div>
                     <section class="inp inp-nor">
                        <label require>Nombre: </label>
                        <input type="text" data-f='g' placeholder="Tacos el May" class="inpEvent" required data-co="0" data-le="50" maxlength="50">
                        <span> <b>0</b> / 50 </span>
                     </section>

                     <input type="number" class="hidden" data-f='g' hidden value="<?php echo $get ?>">
                  </div>
               </fieldset>
               <fieldset>
                  <h3>Detalles de <?php echo $nom ?></h3>
                  <?php if ($get == '1') { ?>
                     <div>
                        <section class="inp inp-sel">
                           <label require>Localidad: </label>
                           <select data-f='h'>
                              <?php echo $opt ?>
                           </select>
                        </section>
                        <section class="inp inp-are">
                           <label require>Referencias: </label>
                           <textarea data-f='h' cols="30" rows="1" class="inpEvent" required data-co="0" data-le="300" maxlength="300"></textarea>
                           <span> <b>0</b> / 300 </span>
                        </section>
                        <section class="inp inp-nor">
                           <label require>Precio: </label>
                           <input type="number" data-f='h' class="inpEvent" required data-co="0" data-le="10" maxlength="10">
                           <span> <b>0</b> / 10 </span>
                        </section>
                        <section class="inp inp-nor">
                           <label require>Habitaciones: </label>
                           <input type="number" data-f='h' class="inpEvent" required data-co="0" data-le="3" maxlength="3">
                           <span> <b>0</b> / 3 </span>
                        </section>
                        <input type="number" class="hidden inpEvent " hidden data-f='h' value="2" required data-co="0" data-le="3" maxlength="3">
                        <input type="number" data-f='h' value="5" hidden class="inpEvent" required data-co="0" data-le="5" maxlength="5">
                        <section class="inp inp-list">
                           <h4>Servicios: </h4>
                           <div class="sect-list"></div>
                           <input type="text" data-f='h' list="listServicios">
                           <input type="button" value="Agregar" id="agregar">
                           <datalist id="listServicios">
                              <?php
                              $res2 = mysqli_query($con, "SELECT * FROM servicios");
                              while ($c = mysqli_fetch_array($res2)) {
                                 echo "<option value='{$c['servicio']}' data-ide='{$c['idServicios']}'></option>";
                              }
                              ?>
                           </datalist>
                        </section>
                        <script>
                           agregar1()
                        </script>
                     </div>
                  <?php } else if ($get == '2') { ?>
                     <div>
                        <section class="inp inp-sel">
                           <label require>Localidad: </label>
                           <select data-f='a'>
                              <?php echo $opt ?>
                           </select>
                        </section>
                        <section class="inp inp-nor">
                           <label require>Abre: </label>
                           <input type="time" data-f='a' required maxlength="5">
                        </section>
                        <section class="inp inp-nor">
                           <label require>Cierra: </label>
                           <input type="time" data-f='a' required maxlength="5">
                        </section>
                        <section class="inp inp-che">
                           <label require>Servicio a Domicilio: </label>
                           <input type="checkbox" data-f='a'>
                        </section>
                        <section class="inp inp-sel">
                           <label require>Categoria: </label>
                           <select data-f='a'>
                              <?php
                              $res2 = mysqli_query($con, "SELECT * FROM catealimentos");
                              while ($c = mysqli_fetch_array($res2)) {
                                 echo "<option value='{$c['idCat']}'>{$c['categoria']}</option>";
                              }
                              ?>
                           </select>
                        </section>
                        <section class="inp inp-are">
                           <label require>Referencias: </label>
                           <textarea data-f='h' cols="30" rows="1" class="inpEvent" required data-co="0" data-le="300" maxlength="300"></textarea>
                           <span> <b>0</b> / 300 </span>
                        </section>
                        <section class="inp inp-list">
                           <h4>Platillos: </h4>
                           <div class="sect-list"></div>
                           <input type="text" data-f='a' class="" data-co="0" data-le="50" maxlength="50">
                           <input type="button" value="Agregar" id="agregar">
                        </section>
                        <script>
                           agregar2()
                        </script>
                     </div>
                  <?php } else {
                     echo "Error";
                  } ?>
               </fieldset>
               <fieldset>
                  <input type="submit" value="Guardar">
               </fieldset>
            </form>
         </div>
      </div>
   </div>
   <script src="./form.js"></script>
</body>
</html>