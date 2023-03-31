<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/basicos.css">
   <link rel="stylesheet" href="../css/dashboard.css">
   <link rel="stylesheet" href="../css/loader.css">
   <title>Agregar Promotor</title>
   <script src="./js/eventos.js"></script>
</head>
<body>
   <div class="cont">
      <?php require("./components/header.php"); ?>
      <div class="cont-head">
         <?php require("./components/main.php"); ?>
         <div class="cont-body">
            <form action="">
               <fieldset>
                  <h3>Agregar Promotor</h3>
                  <div>
                     <section class="inp inp-img">
                        <!-- <label> -->
                        <label for="file">
                           <div>
                              <!-- <img src="../archivos/2_640259a2af9f68.37866290.png" alt=""> -->
                              <input type="file" id="file" hidden>
                              <span>
                                 <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><rect width="416" height="352" x="48" y="80" fill="none" stroke-linejoin="round" stroke-width="32" rx="48" ry="48"></rect><circle cx="336" cy="176" r="32" fill="none" stroke-miterlimit="10" stroke-width="32"></circle><path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 335.79l-90.66-90.49a32 32 0 00-43.87-1.3L48 352m176 80l123.34-123.34a32 32 0 0143.11-2L464 368"></path></svg>
                              </span>
                           </div>
                           <!-- <label>Subir Foto </label> -->
                        </label>
                     </section>
                     <section class="inp inp-nor inp-icon">
                        <label require="">Nombre: </label>
                        <div>
                           <span>
                              <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M858.5 763.6a374 374 0 0 0-80.6-119.5 375.63 375.63 0 0 0-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 0 0-80.6 119.5A371.7 371.7 0 0 0 136 901.8a8 8 0 0 0 8 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 0 0 8-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path>
                              </svg>
                           </span>
                           <input class="inpEvent inpIco" type="text" value="z" required data-i="1" data-co="0" data-le="30" maxlength="30">
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
                           <input class="inpEvent inpIco" type="text" value="z" required data-i="1" data-co="0" data-le="30" maxlength="30">
                           <!-- <input class="inpEvent inpIco" type="text" value=""  data-i="1" data-co="0" data-le="30" maxlength="30"> -->
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
                           <input class="inpEvent inpIco" type="text" value="z" data-i="1" data-co="0" data-le="30" maxlength="30">
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
                           <input class="inpEvent inpIco" type="email" value="123@123.come" required data-i="1" data-co="0" data-le="30" maxlength="30">
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
                           <input class="inpEvent inpIco" type="tel" value="1234567890" required data-i="1" data-co="0" data-le="12" maxlength="12">
                        </div>
                        <span> <b>0</b> / 12 </span>
                     </section>
                     <section class="inp inp-nor inp-icon">
                        <label require="">Direccion: </label>
                        <div>
                           <span>
                              <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M8 0c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zM8 15c-0.984 0-1.92-0.203-2.769-0.57l3.643-4.098c0.081-0.092 0.126-0.21 0.126-0.332v-1.5c0-0.276-0.224-0.5-0.5-0.5-1.765 0-3.628-1.835-3.646-1.854-0.094-0.094-0.221-0.146-0.354-0.146h-2c-0.276 0-0.5 0.224-0.5 0.5v3c0 0.189 0.107 0.363 0.276 0.447l1.724 0.862v2.936c-1.813-1.265-3-3.366-3-5.745 0-1.074 0.242-2.091 0.674-3h1.826c0.133 0 0.26-0.053 0.354-0.146l2-2c0.094-0.094 0.146-0.221 0.146-0.354v-1.21c0.634-0.189 1.305-0.29 2-0.29 1.1 0 2.141 0.254 3.067 0.706-0.065 0.055-0.128 0.112-0.188 0.172-0.567 0.567-0.879 1.32-0.879 2.121s0.312 1.555 0.879 2.121c0.569 0.569 1.332 0.879 2.119 0.879 0.049 0 0.099-0.001 0.149-0.004 0.216 0.809 0.605 2.917-0.131 5.818-0.007 0.027-0.011 0.055-0.013 0.082-1.271 1.298-3.042 2.104-5.002 2.104z"></path></svg>
                           </span>
                           <input class="inpEvent inpIco" type="text" value="z" required data-i="1" data-co="0" data-le="200" maxlength="200">
                        </div>
                        <span> <b>0</b> / 200 </span>
                     </section>
                  </div>
               </fieldset>
               <fieldset>
                  <input type="submit" value="Guardar">
               </fieldset>
            </form>
         </div>
      </div>
      <?php require("./components/load.php"); ?>
   </div>
   <script src="./js/rutas.js"></script>
   <script src="./js/peticion.js"></script>
   <script src="./js/plusAgregar.js"></script>
   <script>promotor()</script>
</body>
</html>