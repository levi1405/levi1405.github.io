<?php
include("admin/funcampos.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Noticias light</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="fonts.css">
  <script src="js/jquery.js"></script>
        <script src="js/menu.js"></script>
  <link rel="stylesheet" href="css/notice.css">
  <script>
        function confirmacion1(){
            var respuesta=confirm("¿Estas seguro de Cerrar Sesión?");
            if (respuesta){
            window.location.href='index.php?respuesta=true';
            }
            return respuesta;
            }
    </script>
  <style>
  .fakeimg1 {
    height: 200px;
    width:200px;
    border-radius: 50%;
    overflow: hidden; /* Oculta cualquier parte de la imagen que se salga del div */
    background: #aaa;
  }
  #imgg{
    object-fit: cover; /* Ajusta la imagen para que cubra todo el div */
  }
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
    <header>
        <p><a href="index.php"><img class="logo" src="./img/nsv-logo.png" height="100px"></a></p>
        <h3 style="color:white; text-align:center">Te mantenemos informado con el acontecer Nacional e Internacional</h3>
        <?php
        session_start();
        if(isset($_SESSION['nombre'])){
          echo '<span class="lag"><a name="close" class="log" href="admin/cerrar_sesion.php" onclick="return confirm(\'¿Estás seguro de que deseas cerrar la sesión?\')">Cerrar Sesión</a></span>';
          }
          else{
            echo "<span class='lag'><a class='log' href='admin/login.php'>Iniciar Sesión</a></span>";
        }
        if(isset($_GET["respuesta"]))
                {
                  $_SESSION["estado"]="0";
                  session_unset();
                  
                  session_destroy();
                    echo "<script type='text/javascript'>
                    window.alert('Hasta pronto!!');
                    </script>";
                    // echo "Registro Borrado <a href='autores.php'>Ok</a>";
                }
        ?>
    </header>
    <div class="menu_bar">
        <a href="#" class="btn_menu"><span class="icon-menu"></span> Menu</a>
    </div>
        <?php
            include("admin/conexion.php");
            // Obtener los registros de la tabla "categorias"
            $sql = "SELECT id_categoria,ncategoria FROM categorias";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<nav>";
                while ($row = $result->fetch_assoc()) {
                  $id_categoria=$row['id_categoria'];
                    $categoria = $row['ncategoria'];
                    echo "<a id='".$categoria."' href='index.php?categoria=".$categoria."'><span class='icon-".$id_categoria."'></span> ".$categoria."</a>";
                }
            
            if(isset($_SESSION['nombre'])){
            $name=$_SESSION['nombre'];
            $sqll="SELECT tipo FROM autores WHERE nombre='".$name."'";
  $resultado = mysqli_query($conn, $sqll);
                  $fila = mysqli_fetch_assoc($resultado);
                  $rol = $fila['tipo'];
            echo "<a href='admin/index.php'><span class='icon-8'></span> Area Admin</a>";
            }
            echo "</nav>";
            }

            // $conn->close();
        ?>
<body>

<div class="container mt-5">
  <div class="row">
    <?php
    if(isset($_SESSION['nombre'])){
      echo "<div class='col-sm-4'>
      <h2>Acerca de mi</h2>
      <h5>______(/°-°)/________</h5>
      <div class='fakeimg1' ><img id='imgg' src='img/perfil.png' width='100%'></div>
      <h3 style='color:black'>Bienvenido Usuario</h3>
      <h3 style='color:darkblue;'>".$name."</h3>
      <h3 class='mt-4' style='color:black; text-shadow:0 0 5px firebrick'>Rol Del Usuario</h3>
      <h3 style='margin-bottom: 20px; color:#8b0051; font-weight: bold;'>".$rol."</h3>";
     } ?>
      <div id='adn'>
        <img src="./img/dna.gif" alt="">
      </div>
      <?php

      // Obtener los registros de la tabla "categorias"
      $sql = "SELECT id_categoria ,ncategoria FROM categorias";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          echo "
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
          while ($row = $result->fetch_assoc()) {
              $id_categoria=$row['id_categoria'];
              $categoria = $row['ncategoria'];
              echo "<li class='nav-item'>";
              echo "<a class='nav-link' id='".$categoria."' href='index.php?categoria=".$categoria."'><span class='icon-".$id_categoria."'></span> ".$categoria."</a>";
              echo "</li>";
          }
          echo "</ul>";
      }
      // $conn->close();
      ?>

      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
      <?php
      // include("admin/conexion.php");
      if (isset($_GET["categoria"]))
      {
        $sql = "SELECT * FROM publicaciones where categoria='".$_GET["categoria"]."'";
        echo "<style>
        #".$_GET["categoria"]."{
          color: white;
          text-shadow: 0 0 3px yellow;
        }
        li > a#".$_GET["categoria"].", nav > a#".$_GET["categoria"]."{
          background:rgba(71, 22, 46, 0.884);
          box-shadow: 0 0 5px white;
          padding:7px 10px;
        }
        </style>"; 
        
      }
      else
      {
        $sql = "SELECT * FROM publicaciones"; 
      }
        $result = $conn->query($sql);
      if ($result->num_rows > 0) {
       
      while($row = $result->fetch_assoc())
       {
          echo "<div class='divider'>";
          echo  "<h2 class='mt-5'style='color:blue;'>".$row["titulo"]. "</h2>";
          echo  "<h5>Escrito por:".$row["autor"].". &nbsp; &nbsp; &nbsp; &nbsp; Publicado el: &nbsp;".$row["fecha"]."</h5>";
            echo  "<div  ><img class='img1' src='admin/".$row["imagen1"] ."' ></div>";
          echo "<h5 style='font-size:15px;'>Categoria:".$row["categoria"]."</h5>";
          echo  "<p>".$row["texto"]. "</p>";
          if($row['imagen2'] != ""){
            echo  "<div class='cimg2' ><img class='img2' src='admin/".$row["imagen2"] ."' ></div>";
          }
          echo "</div>";     
          }
       
      }else{
        echo '<h3>"No hay publicaciones en esta categoria"</h3>';
      } $conn->close();
      ?>
    </div>
  </div>
</div>

<div class="mt-5 p-4 bg-dark text-white text-center">
</div>
<footer class="bg-dark text-center text-white">
        <a href='index.php'>
            <img class='logo' src='img/nsv-logo.png' height='100' alt=''>
          </a>
          <br><br>
          <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2023 Copyright:
          <a class="text-white" href="https://mdbootstrap.com/">Newselsalvador.com</a>
        </div>
        
        <!-- Copyright -->
      </footer>
</body>
</html>
