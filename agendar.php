<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Agendar</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
</head>
<body>
    <?php
        require("./components/header.php");
        require("./components/aside.php");
        require("./components/carga.php");
    ?>
    <div id="agendar" class="agendar">
        <form id="formulario">
            <div class="field field-nor">
                <label for="" required>Fecha</label>
                <input type="date">
            </div>
            <div class="field field-check">
                <input type="checkbox" name="" id="checkbox" checked>
                <label for="checkbox">Todo el dia</label>
            </div>
            <div class="field field-time">
                <label required>Hora</label>
                <div>
                    <label >De </label>
                    <input type="time" >
                    <label> a </label>
                    <input type="time">
                </div>
            </div>
            <div class="field">
                <?php
                    require("./components/eventos.php");
                ?>
                <div class="field agregar-evento">
                    <section>
                        <h2>Nuevo evento</h2>
                    </section>
                    <?php
                        require("./form/evento.php");
                    ?>
                </div>
            </div>
            <div class="field">
                <?php
                    require("./components/ubicaciones.php");
                ?>
                <div class="field agregar-evento">
                    <section>
                        <h2>Nueva Ubicacion</h2>
                    </section>
                    <?php
                        require("./form/ubicacion.php");
                    ?>
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
                    <div class="bg-label">
                        <label id="bg-red"      for="bg-red"></label>
                        <label id="bg-blue"     for="bg-blue" class="active"></label>
                        <label id="bg-green"    for="bg-green"></label>
                        <label id="bg-pink"     for="bg-pink"></label>
                        <label id="bg-yellow"   for="bg-yellow"></label>
                        <label id="bg-newLabel" for="bg-color"></label>
                    </div>
                </section>
            </div>
            <div class="eveAgendar">
                <input type="submit" value="Agendar">
            </div>
        </form>
    </div>
    <script src="agendar.js"></script>
</body>

</html>