

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/ckeditor.js"></script>
    <link rel="short icon" href="https://cdn.icon-icons.com/icons2/906/PNG/512/gear_icon-icons.com_70125.png">
    <title>Publicaciones</title>
    
    <!-- Incluyendo la funcion creada aparte para seleccionar autores y otros.. -->
    <?php include("funcampos.php"); ?>
    <script>
        function confirmacion(){
            var respuesta=confirm("¿Estas seguro de eliminar este registro?");
            if (respuesta ==true){
            return true;
            }else{
            return false;
            }
        }
    </script>
</head>
<style>
    body{
        font-size:18px;
    }
    #formulario{
        width:60%;
        margin:30px auto;
    }
    input{
        color:black;
    }
    #resultado{
        width:90%;
        margin:auto;
    }
    .info{
        text-align:center;
    }
    #ok{
        text-align:center;
    }
    #erase{
        text-decoration:none;
        color:black;
        text-shadow:0 0 2px blue;
    }
    #erase:hover{
        text-shadow:0 0 5px red;
    
    }
    .tables td, .tables th {
  border: 2px double black;
}
fieldset {
        border: 2px; /* Ajusta el grosor de la línea según tus necesidades */
        border-style: solid; /* Establece el estilo de línea como sólido */
        /* Otros estilos opcionales */
        border-color: #000; /* Color de la línea */
        padding: 10px;
    }
</style>
<?php include("barra.php");
?>
<body>
    <div id="formulario">
        <fieldset>
            <legend align="center">Registrar</legend>
                <form action="publicaciones.php" method="post" enctype="multipart/form-data">
                    <!-- <label for="id">ID: </label>    
                        <input type="text" name="id_autor" required >   -->
                    <table>
                        <tr><td>
                                <label for="fecha">Fecha: </label>    
                                    <input type="date" name="fecha" required>
                            </td>
                            <td>
                                <!-- &nbsp; &nbsp; -->
                                <label for="autor">Autor: </label>
                                <span><?php echo camposelect("nombre","autores","id_autor"); ?></pspan>
                            </td>
                        </tr>
                        <tr>
                            <!-- <br><br> -->
                            <td>
                                <label for="titulo">Titulo: </label>
                                <input type="text" name="titulo" required>
                                <!-- <br><br>     -->
                            </td>
                            <td>
                                <label for="ncategoria">Categoria: </label>
                                <span><?php echo camposelect("ncategoria","categorias","id_categoria"); ?></span>
                        </tr>
                        <tr>
                            </td>
                            <td colspan="2" align="center" height="100px">
                                <label for="texto">Texto: </label>
                                <span><textarea type="text" name="txtDescripcion" id="txtDescripcion"></textarea></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="imagen1">Imagen 1: </label>
                                    <input type="file" name="imagen1" style='color:black;' required>
                            </td>
                            <td>
                            <label for="imagen12">Imagen 2: </label>
                                    <input type="file" name="imagen2" style='color:black;'>
                            </td>
                        </tr>
                    </table>
                        <!-- &nbsp; &nbsp; &nbsp; -->
                        <input class="info"type="submit" name="registrar" value="Registrar" >
                </form>
            </fieldset>
    </div>
    <?php
    include("conexion.php");
                        
    // Condicion imagen 1
    if(isset($_FILES["imagen1"]) && $_FILES["imagen1"]["error"] == 0){
        $sqlv="SELECT * FROM publicaciones ORDER BY id_publicacion DESC LIMIT 1";
               $resultado = mysqli_query($conn, $sqlv);
               if ($resultado->num_rows > 0){
                $row = mysqli_fetch_assoc($resultado);
                $id = $row['id_publicacion'];
                $idv=$id+1;
               }else{
                $idv=1;
               }
        $nombre_image1 = "IMG1_IdPublic_00" .$idv."." . pathinfo($_FILES["imagen1"]["name"], PATHINFO_EXTENSION);
        $ruta_image1 = "archivos/" . $nombre_image1;
        $tipo_archivo = strtolower(pathinfo($ruta_image1,PATHINFO_EXTENSION));
        $tamano_archivo = $_FILES["imagen1"]["size"];
        $es_imagen = getimagesize($_FILES["imagen1"]["tmp_name"]);
        if($es_imagen !== false && in_array($tipo_archivo, array("jpg", "jpeg", "png", "gif", "tiff", "svg")) && $tamano_archivo <= 5000000){
            if(move_uploaded_file($_FILES["imagen1"]["tmp_name"], $ruta_image1)){
                echo "<img src='$ruta_image1' width='230' >";
            } else {
                echo "img1 error.";
            }
        } else {
            echo "img no valida o demasiado grande.";
        }
    }
    //  else {
    //     echo "Debe seleccionar un archivo para subir.";
    // }
    ?>
    <?php
    // Condicion imagen 2
    if(isset($_FILES["imagen2"]) && $_FILES["imagen2"]["error"] == 0){
        $sqlv="SELECT * FROM publicaciones ORDER BY id_publicacion DESC LIMIT 1";
               $resultado = mysqli_query($conn, $sqlv);
               if ($resultado->num_rows > 0){
                $row = mysqli_fetch_assoc($resultado);
                $id = $row['id_publicacion'];
                $idv=$id+1;
               }else{
                $idv=1;
               }
        $nombre_image2 = "IMG2_IdPublic_00" .$idv."." . pathinfo($_FILES["imagen2"]["name"], PATHINFO_EXTENSION);
        $ruta_image2 = "archivos/" . $nombre_image2;
        $tipo_archivo = strtolower(pathinfo($ruta_image2,PATHINFO_EXTENSION));
        $tamano_archivo = $_FILES["imagen2"]["size"];
        $es_imagen = getimagesize($_FILES["imagen2"]["tmp_name"]);
        if($es_imagen !== false && in_array($tipo_archivo, array("jpg", "jpeg", "png", "gif", "tiff", "svg")) && $tamano_archivo <= 5000000){
            if(move_uploaded_file($_FILES["imagen2"]["tmp_name"], $ruta_image2)){
                echo "<img src='$ruta_image2' width='230' >";
            } else {
                echo "Ha ocurrido un error al subir el archivo.";
            }
        } else {
            echo "El archivo no es una imagen válida o es demasiado grande.";
        }
    }
    //  else {
    //     echo "Debe seleccionar un archivo para subir.";
    // }
    ?>



    <?php
    if(isset($_REQUEST['fecha'])){
        $fecha=$_REQUEST['fecha'];
        $autor=$_REQUEST['nombre'];
        $titulo=$_REQUEST['titulo'];
        $categoria=$_REQUEST['ncategoria'];
        $texto=$_REQUEST['txtDescripcion'];
        $imagen1=$ruta_image1;
        $imagen2=$ruta_image2;
        //--------------------------------------
        include("conexion.php");

    $sql="INSERT INTO publicaciones (fecha, autor, titulo, categoria, texto, imagen1, imagen2)
            VALUES ('$fecha','$autor','$titulo','$categoria', '$texto', '$imagen1','$imagen2')";
            if($conn->query($sql)===TRUE){
                echo "<script type='text/javascript'>
                    window.alert('Registrado Correctamente!!');
                    </script>";
            }else{
                echo "Error al Insertar:".$sql. "<br>".$conn->error;
            }
            $conn->close();
    }
    ?>
    <div id="resultado">
    <fieldset>
        <legend align="center">Consulta de la Tabla Publicacion</legend>
    <?php
    include("conexion.php");
    
                //Codigo para borrar registro
                if(isset($_GET["borrar"]))
                {
                    $sqlselect = "SELECT imagen1, imagen2 FROM publicaciones WHERE id_publicacion = ".$_GET["id_publicacion"];
                    $resultado = mysqli_query($conn, $sqlselect);
                    $fila = mysqli_fetch_assoc($resultado);
                    $direccion1 = $fila['imagen1'];
                    $direccion2 = $fila['imagen2'];
                    
                        @unlink($direccion1);
                        @unlink($direccion2);
                        /////////////////////////////////////////////////////////////////////////////////
                    $sqlborar="DELETE FROM publicaciones WHERE id_publicacion=".$_GET["id_publicacion"];
                    $result=$conn->query($sqlborar);
                    echo "<script type='text/javascript'>
                    window.alert('Registro Borrado Correctamente!!');
                    </script>";
                    // echo "Registro Borrado <a href='publicaciones.php'>Ok</a>";
                }
                //Consulta de la base de la tabla publicaciones
    $sql="SELECT id_publicacion, fecha, autor, titulo, categoria, imagen1, imagen2 FROM publicaciones";
    $result = $conn->query($sql);
    if($result->num_rows >0) 
            {
                echo "<table class='tables' border=1>
                            <tr>   
                                <td>ID Publicación</td>
                                <td>Fecha</td>
                                <td>Autor</td>
                                <td>Titulo</td>
                                <td>Categoria</td>
                                <td>Imagen 1</td>
                                <td>Imagen 2</td>
                                <td>Borrar</td>
                                <td>Editar</td>
                            </tr>";
                while($row=$result->fetch_assoc())
                {
                    echo "<tr>
                            <td>".$row['id_publicacion']."</td>
                            <td>".$row['fecha']."</td>
                            <td>".$row['autor']."</td>
                            <td>".$row['titulo']."</td>
                            <td>".$row['categoria']."</td>
                            <td>".$row['imagen1']."</td>
                            <td>".$row['imagen2']."</td>
                            <td><a id='erase' href='publicaciones.php?borrar=ok&id_publicacion=".$row["id_publicacion"]."' onclick='return confirmacion()'>Borrar</a></td>
                            <td><a id='erase' href='publica_mod.php?id_publicacion=".$row["id_publicacion"]."'>Editar</a></td>
                        </tr>";
                }
                echo " </table>";
            } else {
                echo "0 registros encontrados";
            }
    $conn->close();
    ?>
    </fieldset>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#txtDescripcion' ) )
            .catch( error => {
            console.error( error );
            } );
    </script>
    <br><br>
</body>
</html>