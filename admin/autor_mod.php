<?php
date_default_timezone_set('UTC');

date_default_timezone_set("America/El_Salvador");
//Estableciendo conexion
include("conexion.php");

    //modificar con update
    if(isset($_POST["id_autor"]))
    {
        $id_autor=$_REQUEST["id_autor"];
        $correo=$_REQUEST["correo"];
        $nombre=$_REQUEST["nombre"];
        $tipo=$_REQUEST['tipo'];
        $clave=$_REQUEST['clave'];
        $estado=$_REQUEST['estado'];
        
        $sqlUpdate = "UPDATE autores SET correo='$correo',nombre='$nombre', 
        tipo='$tipo',clave='$clave',estado='$estado' WHERE id_autor=$id_autor";
        if ($conn->query($sqlUpdate) === TRUE) {
            echo "<script type='text/javascript'>
                    window.alert('Registro Actualizado Correctamente!!');
                    </script>";
          } else {
            echo "Error en UPDATE: " . $sql . "<br>" . $conn->error;
          } 
    }
    //Consultar tabla autores
                $sql="SELECT * FROM autores 
                WHERE id_autor=".$_GET["id_autor"];
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
                $id_autor=$row["id_autor"] ;
                $correo=$row["correo"] ;
                $nombre=$row["nombre"] ;
                $tipo=$row["tipo"] ;
                $clave=$row["clave"] ;
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
    <title>Actualizar Documento</title>
</head>
<body>
<a href="autores.php">Volver</a>
    <div id="formulario">
        <fieldset>
            <legend align="center">Actualizar Registro</legend>
                <form action="autor_mod.php?id_autor=<?php echo $id_autor ?>" method="post">
                    <label for="id_autor">ID Autor: </label>    
                        <input type="text" name="id_autor" readonly value="<?php echo $id_autor; ?>">  
                        <label for="correo">Correo : </label>    
                        <input type="text" name="correo" value="<?php echo $nombre; ?>">
                        <label for="nombre">Nombre: </label>    
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>"d>
                        <!-- &nbsp; &nbsp; -->
                        <label for="tipo">Tipo:<?php echo $tipo ?> &nbsp; (Actual) </label>
                        <select name="tipo">
                            <option value="Sin categoria" selected >Seleccionar Rol</option>
                            <option value="Periodista">Periodista</option>
                            <option value="Pasante">Pasante</option>
                        </select><br><br>
                        <!-- <br><br> -->
                    <label for="clave">Clave: </label>
                        <input type="text" name="clave" value="<?php echo $clave; ?>">
                        <!-- <br><br>     -->
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
