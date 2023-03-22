<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/basicos.css">
   <link rel="stylesheet" href="./css/loader.css">
   <link rel="stylesheet" href="./css/index.css">
   <link rel="stylesheet" href="./css/loader.css">
    <title>Buscar</title>
</head>
<body>
   <?php include("./php/cn.php"); ?>
   <?php include('./components/header.php') ?>
   <div class="cont-busqueda">
        <p>Busco en la localidad: <b> --- </b> del tipo <b> --- </b> </p>
   </div>
   <div class="contenido">
      <section></section>
   </div>
   <script src="./js/comp.js"></script>
   <script src="./js/rutas.js"></script>
   <script src="./js/peticion.js"></script>
   <script src="./js/traer.js"></script>

   <script>
        traer.buscar()
   </script>
</body>
</html>