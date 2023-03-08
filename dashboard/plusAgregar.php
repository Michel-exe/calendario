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
    <title>Agregar Imagenes</title>
</head>
<body>
    <?php if(!isset($_GET['c'])) { ?>
        <div class="subidas">
            <h3><b> 0 </b> - 4 </h3>
        </div>
        <form>
            <input type="number" class="hidden" value="<?php echo $getI ?>">
            <input type="submit" value="Subir">
            <fieldset>
                <div>
                    <section class="input inp-file">
                        <label for="file">Subir Archivo</label>
                        <input type="file" id="file" accept="image/*" multiple>
                    </section>
                </div>
            </fieldset>
            <fieldset>
                <div class="img-load"></div>
            </fieldset>
        </form>
        <script> imagenes() </script>
    <?php } else { ?>
        <form>
            <input type="number" class="hidden" value="<?php echo $getI ?>">
            <fieldset>
                <section class="input inp-nor">
                    <label required>Platillo: </label>
                    <input type="text" data-f='c' placeholder="Chinoculies" class="inpEvent" data-co="0" data-le="100" maxlength="100" >
                    <span> <b>0</b> / 100 </span>
                </section>
                <section class="input inp-sel">
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
                <section class="input inp-nor">
                    <label required>Porcion: </label>
                    <input type="number" data-f='c' placeholder="Chinoculies" class="inpEvent" data-co="0" data-le="3" maxlength="3" >
                    <span> <b>0</b> / 3 </span>
                </section>
                <section class="input inp-sel">
                    <select data-f='c'>
                        <option value="Pz">Pz</option>
                        <option value="Gramos">Gramos</option>
                    </select>
                </section>
            </fieldset>
            <fieldset>
                <input type="button" data-t="g" value="Guardar">
                <input type="submit" data-t="t" value="Terminar">
            </fieldset>
            <a id="linkSalto" href="#">Saltar</a>
        </form>
        <div id="comidas"></div>
        <script> comida() </script>
    <?php } ?>
    <script src="./eventos.js"></script>
</body>
</html>