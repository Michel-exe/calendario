<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar</title>
    <link rel="stylesheet" type="text/css" href="../style.css" media="all" />
</head>
<style>
    label.active{
        color: blue;
    }
</style>
<body>
    <?php
        require("../components/header.php");
        require("../components/aside.php");
    ?>
    <div id="agendar" class="agendar">
        <form id="formulario">
            <?php
                if(!isset($_GET['a'])){
            ?>
            <div class="field">
                <div class="field-table">
                    <section>
                        <p>Evento</p>
                        <p>Descripcion</p>
                        <p>Color</p>
                        <p></p>
                    </section>
                    <?php
                        require("../php/cn.php");
                        $sen = "SELECT * FROM eventos WHERE	color !='#000'";
                        $res = mysqli_query($con, $sen);
                        while ($row = mysqli_fetch_array($res)) {
                            echo "
                                <section>
                                    <p>{$row['evento']}</p>
                                    <p>{$row['description']}</p>
                                    <p class='color' bg='{$row['color']}'></p>
                                    <p>
                                        <a href='./eventos.php?a=e&id={$row['id']}'>Editar</a>
                                        <a href='./eventos.php?a=d&id={$row['id']}'>Eliminar</a>
                                    </p>
                                </section>
                            ";
                        }
                    ?>
                </div>
                <a href="./eventos.php?a=a">Agregar Evento Prestablecido</a>
            </div>
            <?php } else {
                require("../php/cn.php");
                $a = $_GET['a'];
                $tit = ($a=="a" ? "Agregar Evento" : "Editar Evento" );
                $id = (isset($_GET['id']) ? $_GET['id'] : "0" );
                
                $sen = "SELECT * FROM eventos WHERE	id ='$id'";
                $res = mysqli_query($con, $sen);
                $row = mysqli_fetch_array($res);

                echo (var_dump($row)==NULL);
                
                

                // $evento = $row['evento'] ;
                // $description = $row['description'] ;

                ?>
            <div class="field agregar-evento">
                <section>
                    <h2><?php echo $tit ?></h2>
                </section>
                <div>
                    <section>
                        <input type="number" name="" id="" value="<?php echo $id ?>">
                    </section>
                    <section>
                        <label required>Evento</label>
                        <input class="inp-Max inpEvento" type="text" cont="0" maxlength="50" value="<?php echo $evento ?>">
                        <span> <b>0 </b> / 50 </span>
                    </section>
                    <section>
                        <label required>Descripcion</label>
                        <textarea class="inp-Max inpDes" cont="0" maxlength="500"><?php echo $description ?></textarea>
                        <span> <b>0 </b> / 500 </span>
                    </section>
                </div>
            </div>
            <div class="field field-col">
                <label for="" required>Color</label>
                <section>
                    <input type="radio" name="col" col="#dc3545" id="bg-red">
                    <input type="radio" name="col" col="#007bff" id="bg-blue" checked>
                    <input type="radio" name="col" col="#28a745" id="bg-green">
                    <input type="radio" name="col" col="#ec00b9" id="bg-pink">
                    <input type="radio" name="col" col="#ffc107" id="bg-yellow">
                    <input type="radio" name="col" col="#d78c09" id="bg-choco">
                    <input type="radio" name="col" col="" id="bg-new">
                    <input type="color" id="bg-color">
                    <div id="bg-label">
                        <label id="bg-red" for="bg-red"></label>
                        <label id="bg-blue" class="active" for="bg-blue"></label>
                        <label id="bg-green" for="bg-green"></label>
                        <label id="bg-pink" for="bg-pink"></label>
                        <label id="bg-yellow" for="bg-yellow"></label>
                        <label id="bg-newLabel" for="bg-color"></label>
                    </div>
                </section>
            </div>
            <div class="eveAgendar">
                <input type="submit" value="Agregar">
            </div>
            <?php } ?>
        </form>
    </div>
</body>

</html>