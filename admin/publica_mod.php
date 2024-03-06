<?php
include("funcampos.php");
// date_default_timezone_set('UTC');

// date_default_timezone_set("America/El_Salvador");
//Estableciendo conexion
include("conexion.php");

    //Consultar tabla publicaciones
                $sql="SELECT * FROM publicaciones 
                WHERE id_publicacion=".$_GET["id_publicacion"];
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
                $id_publicacion=$row['id_publicacion'];
                $fecha=$row['fecha'];
                $autor=$row['autor'];
                $titulo=$row['titulo'];
                $categoria=$row['categoria'];
                $texto=$row['texto'];
                $nombre_image1=$row['imagen1'];
                $nombre_image2=$row['imagen2'];
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
    <script src="../js/ckeditor.js"></script>
</head>
<style>
    input{
        color:black;
    }
</style>
<body>
    <a href="publicaciones.php">Volver</a>
    <div id="formulario">
        <fieldset>
            <legend align="center">Actualizar Registro</legend>
                <form action="publica_mod.php?id_publicacion=<?php echo $id_publicacion ?>" method="post">
                <table>
                        <tr>
                            <td>
                            <label for="id_publicacion">ID Publicacion: </label>    
                                <input type="text" name="id_publicacion" readonly value="<?php echo $id_publicacion; ?>">  
                        
                                <label for="fecha">Fecha: </label>    
                                    <input type="date" name="fecha" value="<?php echo $fecha; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <!-- &nbsp; &nbsp; -->
                                <label for="autor">Autor: </label>
                                <span><?php echo editselect("nombre","autores","id_autor",$autor); ?></pspan>
                            </td>
                        
                            <!-- <br><br> -->
                            <td>
                            <label for="categoria">Categoria: </label>
                                <span><?php echo editselect("ncategoria","categorias","id_categoria",$categoria); ?></pspan>
                                <!-- <br><br>     -->
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                            <label for="titulo">Titulo: </label>
                                    <input type="text" name="titulo" value="<?php echo $titulo; ?>">
                            </td>
                        </tr>
                        <tr>    
                            <td colspan="2" align="center" height="100px">
                                <label for="texto">Texto: </label>
                                <span><textarea type="text" name="txtDescripcion" id="txtDescripcion"><?php echo $texto; ?></textarea></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="imagen1">Imagen 1: </label>
                                <?php echo $nombre_image1; ?>
                            </td>
                            <td>
                                <label for="imagen2">Imagen 2: </label>
                                <?php echo $nombre_image2; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                    <label for="new_imagen1">Reemplazar img1: </label>
                                        <input type="file" name="new_imagen1">
                            </td>
                            <td>
                                <label for="new_imagen2">Reemplazar img2: </label>
                                        <input type="file" name="new_imagen2">
                            </td>
                        </tr>
                    </table>
                        <input class="info"type="submit" name="modificar" value="Modificar" >
                </form>
            </fieldset>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#txtDescripcion' ) )
            .catch( error => {
            console.error( error );
            } );
    </script>
    <?php

include("conexion.php");

    if(isset($_FILES["new_imagen1"]) && $_FILES["new_imagen1"]["error"] == 0 && $_FILES["new_imagen2"]["size"] > 0){
        $new_image1 = "IMG2_IdPublic_00" .$id_publicacion."." . pathinfo($_FILES["imagen1"]["name"], PATHINFO_EXTENSION);
        $nombre_image1 = "archivos/" . $new_image1;
        $tipo_archivo = strtolower(pathinfo($nombre_image1,PATHINFO_EXTENSION));
        $tamano_archivo = $_FILES["new_imagen1"]["size"];
        $es_imagen = getimagesize($_FILES["new_imagen1"]["tmp_name"]);
        if($es_imagen !== false && in_array($tipo_archivo, array("jpg", "jpeg", "png", "gif", "tiff", "svg")) && $tamano_archivo <= 5000000){
            if(move_uploaded_file($_FILES["new_imagen1"]["tmp_name"], $nombre_image1)){
                echo 'img1 subida exitosa.';
                $sqlselect = "SELECT imagen1 FROM publicaciones WHERE id_publicacion = ".$_GET["id_publicacion"];
                        $resultado = mysqli_query($conn, $sqlselect);
                        $fila = mysqli_fetch_assoc($resultado);
                        $direccion1 = $fila['imagen1'];
                            @unlink($direccion1);
            } else {
                echo "img1 error.";
            }
        } else {
            echo "img no valida o demasiado grande.";
        }
    }
    // else{
    //     $sqlimg = "SELECT imagen1 FROM publicaciones WHERE id_publicacion = ".$_GET["id_publicacion"];
    //                 $resultado = mysqli_query($conn, $sqlimg);
    //                 $fila = mysqli_fetch_assoc($resultado);
    //                 $nombre_image1 = $fila['imagen1'];
    //     }
    ?>
    <?php
    // Condicion imagen 2
        if(isset($_FILES["new_imagen2"]) && $_FILES["new_imagen2"]["error"] == 0 && $_FILES["new_imagen2"]["size"] > 0){
            $new_image2 = "IMG2_IdPublic_00" .$id_publicacion."." . pathinfo($_FILES["imagen1"]["name"], PATHINFO_EXTENSION);
            $nombre_image2 = "archivos/" . $new_image2;
            $tipo_archivo = strtolower(pathinfo($nombre_image2,PATHINFO_EXTENSION));
            $tamano_archivo = $_FILES["new_imagen2"]["size"];
            $es_imagen = getimagesize($_FILES["new_imagen2"]["tmp_name"]);
            if($es_imagen !== false && in_array($tipo_archivo, array("jpg", "jpeg", "png", "gif", "tiff", "svg")) && $tamano_archivo <= 5000000){
                if(move_uploaded_file($_FILES["new_imagen2"]["tmp_name"], $nombre_image2)){
                    $sqlselect = "SELECT imagen2 FROM publicaciones WHERE id_publicacion = ".$_GET["id_publicacion"];
                            $resultado = mysqli_query($conn, $sqlselect);
                            $fila = mysqli_fetch_assoc($resultado);
                            $direccion2 = $fila['imagen2'];
                                @unlink($direccion2);
                } else {
                    echo "Ha ocurrido un error al subir el archivo.";
                }
            } else {
                echo "El archivo no es una imagen válida o es demasiado grande.";
            }
        }
        // else{
        //     $sqlimg = "SELECT imagen2 FROM publicaciones WHERE id_publicacion = ".$_GET["id_publicacion"];
        //                 $resultado = mysqli_query($conn, $sqlimg);
        //                 $fila = mysqli_fetch_assoc($resultado);
        //                 $nombre_image2 = $fila['imagen2'];
        //     }
//////////////////////////////////////////////////////////////////////////////////

//---------------------------------------------------------------------------------------------------------------------
//conexion a base de datos

        //modificar con update
        if(isset($_REQUEST['modificar'])){
            $id_publicacion=$_REQUEST['id_publicacion'];
            $fecha=$_REQUEST['fecha'];
            $autor=$_REQUEST['nombre'];
            $titulo=$_REQUEST['titulo'];
            $categoria=$_REQUEST['ncategoria'];
            $texto=$_REQUEST['txtDescripcion'];

            
///////////////////////////////////////////////////////////////////////
            $sqlUpdate = "UPDATE publicaciones SET fecha='$fecha', autor='$autor', titulo='$titulo', categoria='$categoria', texto='$texto', imagen1='$nombre_image1', imagen2='$nombre_image2'
            WHERE id_publicacion=".$_GET["id_publicacion"];
            if ($conn->query($sqlUpdate) === TRUE) {
                echo "<script type='text/javascript'>
                        window.alert('Registro Actualizado Correctamente!!');
                        </script>";
            } else {
                echo "Error en UPDATE: " . $sql . "<br>" . $conn->error;
            } 
        }
        $conn->close();
    ?>
</body>
</html>
