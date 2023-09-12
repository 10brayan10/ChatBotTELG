<?php
 use function PHPSTORM_META\exitPoint;
 include('conexion_be.php');
 $objeto =new conexion();
 $conexion = $objeto->Conectar(); 
 $id=$_GET["id"];   
 $stmt = $conexion->prepare("SELECT * FROM usuarios where id_telegram=$id");
 $stmt->execute();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/01022f292d.js" crossorigin="anonymous"></script>

</head>
<body >
   
        <form  class="col-4 p-3 m-auto"  method="POST" enctype="multipart/form-data">
       <h5 class="text-center alert alert-secondary">Modificar</h5>
        <h3 class="text-center text-secondary">Modificar el registro </h3>
        <input type="hidden" name="id" value="<?= $_GET["id"]?>">

          <?php
          include "modificar_campos.php";
          while( $datos= $stmt->fetchObject()){
          ?>

          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">id_telegram</label>
              <input type="tetx" name="id"  value="<?= $datos->id_telegram?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              
            </div>  
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">nombre_de_usuario</label>
              <input type="text" name="nombre" value="<?= $datos->nombre_de_usuario?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre_completo</label>
                <input type="text" name="precio" value="<?= $datos->Nombre_completo?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">telefono</label> 
                <input type="text" name="telefono" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <!--<div id="emailHelp"  class="form-text">nombre_de_usuario</div>-->
              </div>
                
             </div>
            <div class="mb-3" enctype="multipart/form-data">
              <label for="imagen" class="form-label">Imagen *</label>
          <input type="file" type="file" id="selImg" name="imagen" value="<?= $datos->imagen?>" class="form-control" 
          onclick="actualizarImg()">
             </div>
          <?PHP
          }
          ?>
           
            <button type="submit"  name="btnregistrar" class="btn btn-primary" value="ok">Modificar Registro</button>
        </form>
         
    </div>



    <!--javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>