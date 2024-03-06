<?php
date_default_timezone_set('UTC');

date_default_timezone_set("America/El_Salvador");
//Estableciendo conexion
include("conexion.php");

    //modificar con update
    if(isset($_POST["id_categoria"]))
    {
        $id_categoria=$_REQUEST["id_categoria"];
        $categoria=$_REQUEST["ncategoria"];
        $estado=$_REQUEST['estado'];
        
        $sqlUpdate = "UPDATE categorias SET ncategoria='$categoria',
        estado='$estado' WHERE id_categoria=$id_categoria";
        if ($conn->query($sqlUpdate) === TRUE) {
            echo "<script type='text/javascript'>
                    window.alert('Registro Actualizado Correctamente!!');
                    </script>";
          } else {
            echo "Error en UPDATE: " . $sql . "<br>" . $conn->error;
          } 
    }
    //Consultar tabla categorias
                $sql="SELECT * FROM categorias 
                WHERE id_categoria=".$_GET["id_categoria"];
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
                $id_categoria=$row["id_categoria"] ;
                $categoria=$row["ncategoria"] ;
                $estado=$row["estado"];
            }
    $conn->close();
                
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="https://cdn.icon-icons.com/icons2/906/PNG/512/gear_icon-icons.com_70125.png">
    <title>Actualizar Categoria</title>
</head>
<body>
<a href="categorias.php">Volver</a>
    <div id="formulario">
        <fieldset>
            <legend align="center">Actualizar Registro</legend>
                <form action="categ_mod.php?id_categoria=<?php echo $id_categoria ?>" method="post">
                    <label for="id_categoria">ID Categoria: </label>    
                        <input type="number" name="id_categoria" readonly value="<?php echo $id_categoria; ?>">  
                        <label for="ncategoria">Categoria: </label>    
                        <input type="text" name="ncategoria" value="<?php echo $categoria; ?>"d>
                        <!-- &nbsp; &nbsp; -->
                        <?php if($estado==1){$valor='Activo';}else{$valor='Inactivo';} ?>
                    <label for="estado">Estado: <?php echo "(actual) $valor"; ?></label>
                    <input type="radio" name="estado" value="1" checked> Activo &nbsp;
                    <input type="radio" name="estado" value="0"> Inactivo<br><br>
                        <!-- &nbsp; &nbsp; &nbsp; -->
                        <input class="info"type="submit" name="modificar" value="Modificar" >
                </form>
            </fieldset>
    </div>
</body>
</html>
