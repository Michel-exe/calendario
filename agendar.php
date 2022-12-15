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
            <fieldset class="field-cont">
                <label required >Evento</label>
                <input class="inp-Max" type="text" cont="0" required maxlength="50">
                <span> <b>0 </b> / 50 </span>
                <label >Descripcion</label>
                <textarea class="inp-Max" cont="0" maxlength="500"></textarea>
                <span> <b>0 </b> / 500 </span>
                <label >Ubicacion</label>
                <textarea class="inp-Max" cont="0" maxlength="200"></textarea>
                <span> <b>0 </b> / 200 </span>
            </fieldset>
            <fieldset class="field-col">
                <label for="">Color: </label>
                <section>
                    <input type="radio" name="col" col="#dc3545" id="bg-red">
                    <input type="radio" name="col" col="#007bff" id="bg-blue">
                    <input type="radio" name="col" col="#28a745" id="bg-green">
                    <input type="radio" name="col" col="#ec00b9" id="bg-pink">
                    <input type="radio" name="col" col="#ffc107" id="bg-yellow">
                    <input type="radio" name="col" col="" id="bg-new">
                    <input type="color" id="bg-color">
                    <label class="bg-red" for="bg-red"></label>
                    <label class="bg-blue" for="bg-blue"></label>
                    <label class="bg-green" for="bg-green"></label>
                    <label class="bg-pink" for="bg-pink"></label>
                    <label class="bg-yellow" for="bg-yellow"></label>
                    <label class="bg-new" for="bg-color"></label>
                </section>
            </fieldset>
            <div class="eveAgendar">
                <input type="submit" value="Agendar">
            </div>
        </form>
    </div>
    <script>
        document.getElementById("bg-color").addEventListener("input", e =>{
            document.getElementById("bg-new").setAttribute("col",e.target.value)
            document.querySelector(".bg-new").style.background=e.target.value
        })
        document.querySelectorAll(".inp-Max").forEach(i=>{
            i.addEventListener("keyup",e=>{
                e.target.nextElementSibling.firstElementChild.innerHTML=e.target.value.length
            })
        })
    </script>
</body>

</html>