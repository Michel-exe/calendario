<header>
    <div>
        <a href="./index.php">
            <picture>
                <img src="./media/logo.png" alt="Logo">
            </picture>
        </a>
        <form method="get" action="./index.php">
            <section class="inp inp-ser">
                <select name="loc" id="">
                    <option value='0'>Localidad</option>
                    <?php 
                        $res = mysqli_query($con, "SELECT * FROM localidad");
                        while ($r = mysqli_fetch_array($res)) {
                            echo "<option value='{$r['idLoc']}'>{$r['localidad']}</option>";
                        }
                    ?>
                </select>
                <select name="tip" id="">
                    <option value='0'>Tipo</option>
                    <?php 
                        $res = mysqli_query($con, "SELECT * FROM reftipos");
                        while ($r = mysqli_fetch_array($res)) {
                            echo "<option value='{$r['idTipo']}'>{$r['tipo']}</option>";
                            // echo "<p data-i='{$r['idTipo']}'>{$r['tipo']}</p>";
                        }
                    ?>
                </select>
                <!-- <input type="search" placeholder="buscar solo esa localidad" name="" id=""> -->
                <button type="submit" class="inp search">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;"><path d="M476.59 227.05l-.16-.07L49.35 49.84A23.56 23.56 0 0027.14 52 24.65 24.65 0 0016 72.59v113.29a24 24 0 0019.52 23.57l232.93 43.07a4 4 0 010 7.86L35.53 303.45A24 24 0 0016 327v113.31A23.57 23.57 0 0026.59 460a23.94 23.94 0 0013.22 4 24.55 24.55 0 009.52-1.93L476.4 285.94l.19-.09a32 32 0 000-58.8z"></path></svg>
                </button>
            </section>
        </form>
        <a href="contact.html">
            Poner mi<br> casa/restaurante
        </a>
    </div>
</header>