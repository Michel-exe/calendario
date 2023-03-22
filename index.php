<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/basicos.css">
   <link rel="stylesheet" href="./css/loader.css">
   <link rel="stylesheet" href="./css/index.css">
   <title>NanaHouse</title>
</head>
<body>
   <?php include("./php/cn.php"); ?>
   <?php include('./components/header.php') ?>

   <div class="tipos">
      <section>
         <span class="act" data-i='0'>
            <b>
               <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                  <path fill="none" d="M0 0h24v24H0z"></path>
                  <path d="M9.5 18H8V9h1.5v9zm3.25 0h-1.5V9h1.5v9zM16 18h-1.5V9H16v9zm1-12h-2V3c0-.55-.45-1-1-1h-4c-.55 0-1 .45-1 1v3H7c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2 0 .55.45 1 1 1s1-.45 1-1h6c0 .55.45 1 1 1s1-.45 1-1c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-6.5-2.5h3V6h-3V3.5zM17 19H7V8h10v11z"></path>
               </svg>
            </b>
            <p>Todas</p>
         </span>
         <?php
         $res = mysqli_query($con, "SELECT * FROM reftipos");
         while ($r = mysqli_fetch_array($res)) {
            echo "<span data-i='{$r['idTipo']}'><b>{$r['icon']}</b><p>{$r['tipo']}</p></span>";
         }
         ?>
      </section>
   </div>
   <div class="filtrar">
      <button class="filtro">
         <span>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;">
               <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 2h-1v5h1V2zm6.1 5H6.4L6 6.45v-1L6.4 5h3.2l.4.5v1l-.4.5zm-5 3H1.4L1 9.5v-1l.4-.5h3.2l.4.5v1l-.4.5zm3.9-8h-1v2h1V2zm-1 6h1v6h-1V8zm-4 3h-1v3h1v-3zm7.9 0h3.19l.4-.5v-.95l-.4-.5H11.4l-.4.5v.95l.4.5zm2.1-9h-1v6h1V2zm-1 10h1v2h-1v-2z"></path>
            </svg>
         </span>
         <b>Orden</b>
      </button>
   </div>
   <div class="contenido">
      <section></section>
   </div>
   <footer>
      <a href="./dashboard/index.php">Dadhboard</a>
   </footer>
   <div class="setting-filtro">
      <form class="filtro">
         <!-- <section class="inp-toogle">
            <input type="checkbox" data-cat="1" id="chePop">
            <label for="chePop">Populares</label>
            <input type="radio" name="chePop" value="DES"  id="chePopDes" hidden>
            <input type="radio" name="chePop" value="ASC"  id="chePopAsc" hidden>
            <div>
               <label for="chePopDes" class="act"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd"></path></svg></label>            
               <label for="chePopAsc"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z" clip-rule="evenodd"></path></svg></label>
            </div>
         </section> -->
         <section class="inp-toogle">
            <input type="checkbox" data-t="habitaciones" data-cat="1" id="cheHab">
            <label for="cheHab">Habitaciones</label>
            <input type="radio" name="cheHab" value="DES" checked  id="cheHabDes" hidden>
            <input type="radio" name="cheHab" value="ASC"  id="cheHabAsc" hidden>
            <div>
               <label for="cheHabDes" class="act"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd"></path></svg></label>            
               <label for="cheHabAsc"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z" clip-rule="evenodd"></path></svg></label>
            </div>
         </section>
         <section class="inp-toogle">
            <input type="checkbox" data-t="precio" data-cat="1" id="chePre">
            <label for="chePre">Precio</label>
            <input type="radio" name="chePre" value="DES" checked id="chePreDes" hidden>
            <input type="radio" name="chePre" value="ASC" id="chePreAsc" hidden>
            <div>
               <label for="chePreDes" class="act"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd"></path></svg></label>            
               <label for="chePreAsc"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z" clip-rule="evenodd"></path></svg></label>
            </div>
         </section>
         <section class="inp-toogle">
            <input type="checkbox" data-t="estrellas" data-cat="1" id="cheEstrellas">
            <label for="cheEstrellas">Estrellas</label>
            <input type="radio" name="cheEstrellas" value="DES" checked  id="cheEstrellasDes" hidden>
            <input type="radio" name="cheEstrellas" value="ASC"  id="cheEstrellasAsc" hidden>
            <div>
               <label for="cheEstrellasDes" class="act"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd"></path></svg></label>            
               <label for="cheEstrellasAsc"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z" clip-rule="evenodd"></path></svg></label>
            </div>
         </section>
         <section class="inp-toogle">
            <input type="checkbox" data-t="localidad" data-cat="1" id="cheEstrellas">
            <label for="chelocal">Localidad</label>
            <input type="radio" name="chelocal" value="DES" checked  id="chelocalDes" hidden>
            <input type="radio" name="chelocal" value="ASC"  id="chelocalAsc" hidden>
            <div>
               <label for="chelocalDes" class="act"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd"></path></svg></label>            
               <label for="chelocalAsc"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 20.25a.75.75 0 01-.75-.75V6.31l-5.47 5.47a.75.75 0 01-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l6.75 6.75a.75.75 0 11-1.06 1.06l-5.47-5.47V19.5a.75.75 0 01-.75.75z" clip-rule="evenodd"></path></svg></label>
            </div>
         </section>
         <section class="submit">
            <button type="submit">Ordenar</button>
         </section>
      </form>
   </div>
   <script src="./js/comp.js"></script>
   <script src="./js/rutas.js"></script>
   <script src="./js/peticion.js"></script>
   <script src="./js/traer.js"></script>
   <script src="./js/index.js"></script>
   <script src="./js/dom.js"></script>
</body>

</html>