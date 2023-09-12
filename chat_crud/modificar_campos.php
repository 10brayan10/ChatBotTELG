<?php

if(isset($_POST["btnregistrar"])){
    $id=$_POST["id"];
    $nombre=$_POST["nombre"];
    $precio=$_POST["precio"];
    $telefono=$_POST["telefono"];
    if($_FILES["imagen"]["error"] == 4){
      echo
      "<script> alert('Image no'); </script>"
      ;
    }
    else{
      $fileName = $_FILES["imagen"]["name"];
      $fileSize = $_FILES["imagen"]["size"];
      $tmpName = $_FILES["imagen"]["tmp_name"];
  
      $validImageExtension = ['jpg', 'jpeg', 'png','webp'];
      $imageExtension = explode('.', $fileName);
      $imageExtension = strtolower(end($imageExtension));
      if ( !in_array($imageExtension, $validImageExtension) ){
        echo
        "
        <script>
          alert('Invalid Image Extension');
        </script>
        ";
      }
      else if($fileSize > 1000000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
        </script>
        ";
      }
      else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
  
        if(!empty($_POST["btnregistrar"])){
            if(!empty($_POST["id"]) and !empty($_POST["nombre"]) and !empty($_POST["precio"] and !empty('imagen') and !empty('telefono'))){
               
                
        
                $stmt = $conexion->prepare(" update usuarios set nombre_de_usuario='$nombre',Nombre_completo='$precio', imagen='$newImageName', telefono='$telefono' where id_telegram=$id");
                $stmt->execute();
                
                if($stmt){
                    header("location:index.php");
                }else{
                    echo"<div class='alert-danger'>Error al modificar</div>";
                }
                $stmt->execute();
            }
        }
        
      }
    }
  }


?>