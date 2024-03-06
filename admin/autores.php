<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="https://cdn.icon-icons.com/icons2/906/PNG/512/gear_icon-icons.com_70125.png">
    <title>Autores</title>
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
        font-size:20px;
    }
    #formulario{
        width:40%;
        margin: 30px auto;
    }
    #resultado{
        width:45%;
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
    table td, table th {
  border: 2px double black;
}
fieldset {
        border: 2px; /* Ajusta el grosor de la línea según tus necesidades */
        border-style: solid; /* Establece el estilo de línea como sólido */
        /* Otros estilos opcionales */
        border-color: black; /* Color de la línea */
        padding: 10px;
    }
</style>
<?php include("barra.php") ?>
<body>
    <div id="formulario">
        <fieldset>
            <legend align="center">Registrar</legend>
                <form action="autores.php" method="post">
                    <!-- <label for="id">ID: </label>    
                        <input type="text" name="id_autor" required >   -->
                    <label for="email">Correo: </label>    
                        <input type="email" name="correo" required>
                    <label for="nombre">Nombre: </label>    
                        <input type="text" name="nombre" required><br><br>
                        <!-- &nbsp; &nbsp; -->
                    <label for="tipo">Tipo: </label>
                    <select name="tipo">
                            <option value="Sin categoria" selected >Seleccionar Rol</option>
                            <option value="Periodista">Periodista</option>
                            <option value="Pasante">Pasante</option>
                        </select><br><br>
                        <!-- <br><br> -->
                    <label for="clave">Clave: </label>
                        <input type="text" name="clave">
                        <!-- <br><br>     -->
                    <label for="estado">Estado: </label>
                    <input type="radio" name="estado" value="1" checked> Activo &nbsp;
                    <input type="radio" name="estado" value="0"> Inactivo<br><br>
                        <!-- &nbsp; &nbsp; &nbsp; -->
                        <input class="info"type="submit" name="registrar" value="Registrar" >
                </form>
            </fieldset>
    </div>
    <?php
    if(isset($_REQUEST['nombre'])){
        $correo=$_REQUEST['correo'];
        $nombre=$_REQUEST['nombre'];
        $tipo=$_REQUEST['tipo'];
        $clave=$_REQUEST['clave'];
        $estado=$_REQUEST['estado'];
        //--------------------------------------
        include("conexion.php");

    $sql="INSERT INTO autores (correo, nombre, tipo, clave, estado)
            VALUES ('$correo','$nombre','$tipo','$clave','$estado')";
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
        <legend align="center">Consulta de la Tabla Autores</legend>
    <?php
    include("conexion.php");
    
                //Codigo para borrar registro
                if(isset($_GET["borrar"]))
                {
                    $sqlborar="DELETE FROM autores WHERE id_autor=".$_GET["id_autor"];
                    $result=$conn->query($sqlborar);
                    echo "<script type='text/javascript'>
                    window.alert('Registro Borrado Correctamente!!');
                    </script>";
                    // echo "Registro Borrado <a href='autores.php'>Ok</a>";
                }
                //Consulta de la base de la tabla autores
    $sql="SELECT id_autor, correo, nombre, tipo, clave, estado FROM autores";
    $result = $conn->query($sql);
    if($result->num_rows >0)
            {
                echo "<table border=1>
                            <tr>   
                                <td>ID Autor</td>
                                <td>Correo</td>
                                <td>Nombre</td>
                                <td>Tipo</td>
                                <td>Contraseña</td>
                                <td>Estado</td>
                                <td>Borrar</td>
                                <td>Editar</td>
                            </tr>";
                while($row=$result->fetch_assoc())
                {
                    echo "<tr>
                            <td>".$row['id_autor']."</td>
                            <td>".$row['correo']."</td>
                            <td>".$row['nombre']."</td>
                            <td>".$row['tipo']."</td>
                            <td>".$row['clave']."</td>
                            <td>".$row['estado']."</td>
                            <td><a id='erase' href='autores.php?borrar=ok&id_autor=".$row["id_autor"]."' onclick='return confirmacion()'>Borrar</a></td>
                            <td><a id='erase' href='autor_mod.php?id_autor=".$row["id_autor"]."'>Editar</a></td>
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
</body>
</html>