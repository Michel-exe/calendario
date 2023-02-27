<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <title>Calendario</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&amp;family=Anton&amp;family=Bungee+Shade&amp;family=Cinzel+Decorative&amp;family=Creepster&amp;family=Duru+Sans&amp;family=Eater&amp;family=Faster+One&amp;family=Fredoka+One&amp;family=Gloria+Hallelujah&amp;family=Hanalei+Fill&amp;family=Indie+Flower&amp;family=Leckerli+One&amp;family=Lora:wght@500&amp;family=Mansalva&amp;family=Monoton&amp;family=Montserrat+Subrayada&amp;family=Montserrat:ital,wght@0,300;0,500;1,100&amp;family=Nabla&amp;family=Passion+One&amp;family=Permanent+Marker&amp;family=Poppins:wght@900&amp;family=Press+Start+2P&amp;family=Roboto&amp;family=Roboto+Condensed:wght@300;400;700&amp;family=Rowdies:wght@700&amp;family=Rubik+Bubbles&amp;family=Rubik+Gemstones&amp;family=Rubik+Storm&amp;family=Rubik:wght@300&amp;family=Satisfy&amp;family=Silkscreen&amp;family=Tangerine:wght@700&amp;display=swap" rel="stylesheet">
</head>

<body>
    <?php
    require("./components/header.php");
    require("./components/aside.php");
    ?>
    <div class="body">
        <div id="calendario">
            <div id="buscafecha">
                <form action="#" name="buscar">
                    <select name="buscames">
                        <option value="0">Enero</option>
                        <option value="1">Febrero</option>
                        <option value="2">Marzo</option>
                        <option value="3">Abril</option>
                        <option value="4">Mayo</option>
                        <option value="5">Junio</option>
                        <option value="6">Julio</option>
                        <option value="7">Agosto</option>
                        <option value="8">Septiembre</option>
                        <option value="9">Octubre</option>
                        <option value="10">Noviembre</option>
                        <option value="11">Diciembre</option>
                    </select>
                    <input type="number" name="buscaanno" maxlength="4" size="4" />
                    <input type="button" value="BUSCAR" onclick="mifecha()" />
                </form>
            </div>
            <div id="fechaactual" onclick="actualizar()"></div>
            <div id="cabecera">
                <div class="dir" id="anterior" onclick="mesantes()">
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </div>
                <h2 id="titulos"></h2>
                <div class="dir" id="posterior" onclick="mesdespues()">
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </div>
            <main id="diasc">
                <nav id="fila0">
                    <section></section>
                    <section></section>
                    <section></section>
                    <section></section>
                    <section></section>
                    <section></section>
                    <section></section>
                </nav>
                <nav class="days" id="fila1">
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                </nav>
                <nav class="days" id="fila2">
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                </nav>
                <nav class="days" id="fila3">
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                </nav>
                <nav class="days" id="fila4">
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                </nav>
                <nav class="days" id="fila5">
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                </nav>
                <nav class="days" id="fila6">
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                    <section class="dias-sel"><span></span>
                        <div class="dias-eventos"></div>
                    </section>
                </nav>
            </main>
        </div>
        <?php
        // require("./components/evento.php");
        ?>

        <div class="eventos">
            
        </div>
    </div>
    <script src="eventos.js"></script>
    <script src="calendario.js"></script>
    <script src="eventosCalendario.js"></script>
</body>

</html>