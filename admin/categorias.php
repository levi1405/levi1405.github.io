<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short icon" href="https://cdn.icon-icons.com/icons2/906/PNG/512/gear_icon-icons.com_70125.png">
    <title>Categorias</title>
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
        width:30%;
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
    .my-fieldset {
        border-width: 2px; /* Ajusta el grosor de la línea según tus necesidades */
        border-style: solid; /* Establece el estilo de línea como sólido */
        /* Otros estilos opcionales */
        border-color: #000; /* Color de la línea */
        padding: 10px;
    }
    table {
  border-collapse: collapse;
}

table td, .table th {
  border: 1px double black;
}
</style>
<?php include "barra.php"; ?>
<body>
    <div id="formulario">
        <fieldset class="my-fieldset">
            <legend align="center">Registrar</legend>
                <form action="categorias.php" method="post">
                    <!-- <label for="id">ID: </label>    
                        <input type="text" name="id_categoria" required >   -->
                    <label for="ncategoria">Categoria: </label>    
                        <input type="text" name="ncategoria" required>
                        <!-- &nbsp; &nbsp; --> <br><br>
                    <label for="estado">Estado: </label> &nbsp;
                    <input type="radio" name="estado" value="1" checked> Activo &nbsp;
                    <input type="radio" name="estado" value="0"> Inactivo<br><br>
                        <!-- &nbsp; &nbsp; &nbsp; -->
                        <input class="info"type="submit" name="registrar" value="Registrar" >
                </form>
            </fieldset>
    </div>
    <?php
    if(isset($_REQUEST['ncategoria'])){
        $categoria=$_REQUEST['ncategoria'];
        $estado=$_REQUEST['estado'];
        //--------------------------------------
        include("conexion.php");

    $sql="INSERT INTO categorias (ncategoria, estado)
            VALUES ('$categoria','$estado')";
            if($conn->query($sql)===TRUE){
                echo "<script type='text/javascript'>
                    window.alert('Registrado Correctamente!!');
                    </script>";
            }else{
                echo "Error al Insertar:".$sql. "<br>".$conn->error;
            }
            // $conn->close();
    }
    ?>
    <div id="resultado">
    <fieldset class="my-fieldset">
        <legend align="center">Consulta de la Tabla Categorias</legend>
    <?php
                //Codigo para borrar registro
                if(isset($_GET["borrar"]))
                {
                    $sqlborar="DELETE FROM categorias WHERE id_categoria=".$_GET["id_categoria"];
                    $result=$conn->query($sqlborar);
                    echo "<script type='text/javascript'>
                    window.alert('Registro Borrado Correctamente!!');
                    </script>";
                    // echo "Registro Borrado <a href='categorias.php'>Ok</a>";
                }
                //Consulta de la base de la tabla categorias
    $sql="SELECT id_categoria, ncategoria, estado FROM categorias";
    $result = $conn->query($sql);
    if($result->num_rows >0)
            {
                echo "<table border=1>
                            <tr>   
                                <td>ID Categoria</td>
                                <td>Categoria</td>
                                <td>Estado</td>
                                <td>Borrar</td>
                                <td>Editar</td>
                            </tr>";
                while($row=$result->fetch_assoc())
                {
                    echo "<tr>
                            <td>".$row['id_categoria']."</td>
                            <td>".$row['ncategoria']."</td>
                            <td>".$row['estado']."</td>
                            <td><a id='erase' href='categorias.php?borrar=ok&id_categoria=".$row["id_categoria"]."' onclick='return confirmacion()'>Borrar</a></td>
                            <td><a id='erase' href='categ_mod.php?id_categoria=".$row["id_categoria"]."'>Editar</a></td>
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
    <br><br><br>
</body>
</html>