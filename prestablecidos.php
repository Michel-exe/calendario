<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Agendar</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
</head>
<body>
    <?php
        require("./components/header.php");
    ?>
    <div id="agendar" class="agendar">
        <form>
            <fieldset class="field-even">
                <label for="">Evento</label>
                <div>
                    <input type="radio" name="rad" id="cheReunion">
                    <input type="radio" name="rad" id="cheJunta">
                    <input type="radio" name="rad" id="cheComida">
                    <input type="radio" name="rad" id="cheFamilia">
                    <input type="radio" name="rad" id="cheEscuela">
                    <input type="radio" name="rad" id="cheTrabajo">
                    <Label style="--bg:#ff0000" for="cheReunion">Reunion</Label>
                    <Label style="--bg:#00ff00" for="cheJunta">Junta</Label>
                    <Label style="--bg:#0000ff" for="cheComida">Comida</Label>
                    <Label style="--bg:#ffff00" for="cheFamilia">Familia</Label>
                    <Label style="--bg:#00ffff" for="cheEscuela">Escuela</Label>
                    <Label style="--bg:#ff00ff" for="cheTrabajo">Trabajo</Label>
                </div>
            </fieldset>
            <fieldset class="field-nor">
                <label for="" required>Fecha</label>
                <input type="date" required>
            </fieldset>
            <fieldset class="field-check">
                <input type="checkbox" name="" id="checkbox">
                <label for="checkbox">Todo el dia</label>
            </fieldset>
            <fieldset class="field-time">
                <label>Hora</label>
                <div>
                    <label required>De </label>
                    <input type="time" required>
                    <label> a </label>
                    <input type="time">
                </div>
            </fieldset>
            <div class="eveAgendar">
                <input type="submit" value="Agendar">
            </div>
        </form>
    </div>
</body>

</html>