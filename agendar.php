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
                        <span class="more">
                            <!-- <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 15h3v3h2v-3h3v-2h-3v-3h-2v3H8z"></path><path d="M19 4h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm.002 16H5V8h14l.002 12z"></path></svg> -->
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path></svg>
                        </span>
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
                        <span class="more">
                            <!-- <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 15h3v3h2v-3h3v-2h-3v-3h-2v3H8z"></path><path d="M19 4h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm.002 16H5V8h14l.002 12z"></path></svg> -->
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path></svg>
                        </span>
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