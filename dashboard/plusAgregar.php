<?php
    if(!isset($_GET['t']) || !isset($_GET['i'])) header("location:../error.html");
    $getT = $_GET['t'];
    $getI = $_GET['i'];

    // $nom = $get=='h' ? 'airBNB' : 'restaurante';
    // $form = $get=='h' ? 'h' : 'r';

    // include("./php/cn.php");
    // $opt="";
    // $res = mysqli_query($con, "SELECT * FROM localidad");
    // while ($r = mysqli_fetch_array($res)) {
    //     $opt.="<option value='{$r['idLoc']}'>{$r['localidad']}</option>";
    // }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./plusAgregar.js"></script>
   <link rel="stylesheet" href="../css/basicos.css">
   <link rel="stylesheet" href="../css/dashboard.css">
    <title>Agregar Imagenes</title>
</head>
<body>
    <?php if(!isset($_GET['c'])) { ?>
        
       <div class="subirImg">
           <div class="subidas">
               <h3><b> 0 </b> - 4 </h3>
           </div>
           <form>
               <input type="number" class="hidden" hidden value="<?php echo $getI ?>">
               <fieldset>
                   <div>
                       <section class="inp inp-file">
                           <label for="file">Cargar Archivos</label>
                           <input type="file" id="file" accept="image/*" multiple>
                       </section>
                       <input type="submit" value="Subir">
                   </div>
               </fieldset>
               <fieldset>
                   <div class="img-load"></div>
               </fieldset>
           </form>
           <script> imagenes() </script>
       </div>
    <?php } else { ?>
        <div class="platillos">
            <form>
                <input type="number" class="hidden" hidden value="<?php echo $getI ?>">
                <fieldset>
                    <section class="inp inp-nor">
                        <label required>Platillo: </label>
                        <input type="text" data-f='c' placeholder="Chinoculies" class="inpEvent" data-co="0" data-le="100" maxlength="100" >
                        <span> <b>0</b> / 100 </span>
                    </section>
                    <section class="inp inp-sel">
                        <label require>Tipo: </label>
                        <select data-f='c'>
                            <option value="Desayuno">Desayuno</option>
                            <option value="Almuerzo">Almuerzo</option>
                            <option value="Merienda">Merienda</option>
                            <option value="Comida">Comida</option>
                            <option value="Refrigerios">Refrigerios</option>
                            <option value="Cena">Cena</option>
                        </select>
                    </section>
                    <section class="inp-2">
                        <section class="inp inp-nor">
                            <label required>Porcion: </label>
                            <input type="number" data-f='c' placeholder="2" class="inpEvent" data-co="0" data-le="3" maxlength="3" >
                            <span> <b>0</b> / 3 </span>
                        </section>
                        <section class="inp inp-sel">
                            <select data-f='c'>
                                <option value="Pz">Pz</option>
                                <option value="Gramos">Gramos</option>
                            </select>
                        </section>
                    </section>
                </fieldset>
                <fieldset class="btns">
                    <input type="submit" data-t="t" value="Terminar">
                    <input type="button" data-t="g" value="Guardar">
                </fieldset>
                <a id="linkSalto" href="#">Saltar</a>
                <div id="comidas"></div>
            </form>
        </div>
        <script> comida() </script>
    <?php } ?>
    <script src="./eventos.js"></script>
</body>
</html>