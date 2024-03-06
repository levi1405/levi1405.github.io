<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="subirimagen.php" method="post" enctype="multipart/form-data">
  Seleccione una imagen o archivo:
  <input type="file"   style='color:blue;' name="cargar" id="cargar">
  <input type="submit" style='color:blue;' value="cargar archivo" name="submit">
</form>

<?php
//condicion para quitar advertencia
if(isset($_FILES["cargar"]["name"]))
{

$target_dir = "archivos/";
$target_file = $target_dir . basename($_FILES["cargar"]["name"]);

if (move_uploaded_file($_FILES["cargar"]["tmp_name"], $target_file)) {
    echo "<br>El archivo ". htmlspecialchars( basename( $_FILES["cargar"]["name"])). " se ha subido.";
  } else {
    echo "Error al cargar el Archivo intente de nuevo";

  }

  echo "<br><br><img src='$target_file'> <br><br>";
  echo "<a href='$target_file'> Ver archivo </a> ";
   }
?>



</body>
</html>