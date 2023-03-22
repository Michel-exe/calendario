<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/basicos.css">
   <link rel="stylesheet" href="./css/index.css">
   <link rel="stylesheet" href="./css/ver.css">
   <link rel="stylesheet" href="./css/loader.css">
   <script src="./dashboard/eventos.js"></script>
   <script src="./js/peticion.js"></script>
   <script src="./js/rutas.js"></script>
   <title>Pedido</title>
</head>

<body>
   <div class="pedido">
      <div class="carrusel">
         <div style="background-image: url(./media/n2.jpg);"></div>
      </div>
      <div class="formulario">
         <form data-usuario="t" data-form="<?php echo isset($_GET['hl']) ? "h" : "r" ?>">
            <fieldset class="fecha">
               <h1><?php echo $_GET['nom'] ?></h1>
               <?php
                  if(isset($_GET['hl'])){
               ?>
               <div>
                  <section class="inp ">
                     <label>De: </label>
                     <input disabled type="date" value="<?php echo $_GET['hl'] ?>" name="hl" required data-i="1" data-co="0" data-le="15" maxlength="15">
                  </section>
                  <section class="inp ">
                     <label>a: </label>
                     <input disabled type="date" value="<?php echo $_GET['hs'] ?>" name="hl" required data-i="1" data-co="0" data-le="15" maxlength="15">
                  </section>
               </div>
               <div>
                  <section class="inp ">
                     <label>Adultos:</label>
                     <input disabled type="number" value="<?php echo $_GET['a'] ?>" name="hl" required data-i="1" data-co="0" data-le="15" maxlength="15">
                  </section>
                  <section class="inp ">
                     <label>Niños: </label>
                     <input disabled type="number" value="<?php echo $_GET['n'] ?>" name="hl" required data-i="1" data-co="0" data-le="15" maxlength="15">
                  </section>
               </div>
               <?php } else { ?>
                  <div>
                     <section class="inp ">
                        <label>Dia: </label>
                        <input disabled type="date" value="<?php echo $_GET['day'] ?>" name="hl" required data-i="1" data-co="0" data-le="15" maxlength="15">
                     </section>
                     <section class="inp ">
                        <label>
                           <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                              <path d="M12 12h-3.5"></path>
                              <path d="M12 7v5"></path>
                           </svg>
                        </label>
                        <input disabled type="time" value="<?php echo $_GET['time'] ?>" name="hl" required data-i="1" data-co="0" data-le="15" maxlength="15">
                     </section>
                  </div>
               <?php } ?>
            </fieldset>
            <fieldset class="datos">
               <h2>Datos de Usuario</h2>
               <section class="inp inp-nor inp-icon">
                  <label require="">Nombre: </label>
                  <div>
                     <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                           <path d="M858.5 763.6a374 374 0 0 0-80.6-119.5 375.63 375.63 0 0 0-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 0 0-80.6 119.5A371.7 371.7 0 0 0 136 901.8a8 8 0 0 0 8 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 0 0 8-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path>
                        </svg>
                     </span>
                     <input class="inpEvent" type="text" value="z" required data-i="1" data-co="0" data-le="30" maxlength="30">
                  </div>
                  <span> <b>0</b> / 30 </span>
               </section>
               <section class="inp inp-nor inp-icon">
                  <label require="">Apellido Paterno: </label>
                  <div>
                     <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                           <path fill="none" stroke="#000" stroke-width="2" d="M16,12 C18.3736719,13.1826446 20,15.6506255 20,19 L20,23 L4,23 L4,19 C4,15.6457258 5.6310898,13.1754259 8,12 M12,13 C15.3137085,13 18,10.3137085 18,7 C18,3.6862915 15.3137085,1 12,1 C8.6862915,1 6,3.6862915 6,7 C6,10.3137085 8.6862915,13 12,13 Z M18,7 C16.5,7 15,7.3599999 13,5 C11,7.3599999 8.5,8 6,7 M7,13 L12.0249378,18.2571942 L17,13 M12,18 L12,23"></path>
                        </svg>
                     </span>
                     <input class="inpEvent" type="text" value="z" required data-i="1" data-co="0" data-le="30" maxlength="30">
                     <!-- <input class="inpEvent" type="text" value=""  data-i="1" data-co="0" data-le="30" maxlength="30"> -->
                  </div>
                  <span> <b>0</b> / 30 </span>
               </section>
               <section class="inp inp-nor inp-icon">
                  <label>Apellido Materno: </label>
                  <div>
                     <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                           <path d="M858.5 763.6a374 374 0 0 0-80.6-119.5 375.63 375.63 0 0 0-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 0 0-80.6 119.5A371.7 371.7 0 0 0 136 901.8a8 8 0 0 0 8 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 0 0 8-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path>
                        </svg>
                     </span>
                     <input class="inpEvent" type="text" value="z" data-i="1" data-co="0" data-le="30" maxlength="30">
                  </div>
                  <span> <b>0</b> / 30 </span>
               </section>
               <section class="inp inp-nor inp-icon">
                  <label require="">Correo Electronico: </label>
                  <div>
                     <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                           <path fill="none" d="M0 0h24v24H0V0z"></path>
                           <path d="M12 1.95c-5.52 0-10 4.48-10 10s4.48 10 10 10h5v-2h-5c-4.34 0-8-3.66-8-8s3.66-8 8-8 8 3.66 8 8v1.43c0 .79-.71 1.57-1.5 1.57s-1.5-.78-1.5-1.57v-1.43c0-2.76-2.24-5-5-5s-5 2.24-5 5 2.24 5 5 5c1.38 0 2.64-.56 3.54-1.47.65.89 1.77 1.47 2.96 1.47 1.97 0 3.5-1.6 3.5-3.57v-1.43c0-5.52-4.48-10-10-10zm0 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"></path>
                        </svg>
                     </span>
                     <input class="inpEvent" type="email" value="123@123.com" required data-i="1" data-co="0" data-le="30" maxlength="30">
                  </div>
                  <span> <b>0</b> / 30 </span>
               </section>
               <section class="inp inp-nor inp-icon">
                  <label require="">Numero de Telefono: </label>
                  <div>
                     <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                           <path d="M17.707 12.293a.999.999 0 0 0-1.414 0l-1.594 1.594c-.739-.22-2.118-.72-2.992-1.594s-1.374-2.253-1.594-2.992l1.594-1.594a.999.999 0 0 0 0-1.414l-4-4a.999.999 0 0 0-1.414 0L3.581 5.005c-.38.38-.594.902-.586 1.435.023 1.424.4 6.37 4.298 10.268s8.844 4.274 10.269 4.298h.028c.528 0 1.027-.208 1.405-.586l2.712-2.712a.999.999 0 0 0 0-1.414l-4-4.001zm-.127 6.712c-1.248-.021-5.518-.356-8.873-3.712-3.366-3.366-3.692-7.651-3.712-8.874L7 4.414 9.586 7 8.293 8.293a1 1 0 0 0-.272.912c.024.115.611 2.842 2.271 4.502s4.387 2.247 4.502 2.271a.991.991 0 0 0 .912-.271L17 14.414 19.586 17l-2.006 2.005z"></path>
                        </svg>
                     </span>
                     <input class="inpEvent" type="tel" value="7491086498" required data-i="1" data-co="0" data-le="12" maxlength="12">
                  </div>
                  <span> <b>0</b> / 12 </span>
               </section>
            </fieldset>
            <fieldset class="submit">
               <button type="submit">Reservar</button>
            </fieldset>
         </form>
      </div>
   </div>
   <script src="./js/comp.js"></script>
   <script src="./js/agendar.js"></script>
</body>

</html>