<?php
session_start();
if(isset($_SESSION['nombre'])){
  $name=$_SESSION['nombre'];
  
  include("conexion.php");

  $sqll="SELECT tipo FROM autores WHERE nombre='".$name."'";
  $resultado = mysqli_query($conn, $sqll);
                  $fila = mysqli_fetch_assoc($resultado);
                  $rol = $fila['tipo'];

}else{
  header("location:../index.php");
}
?>
<link rel="stylesheet" href="../fonts.css">
  <script src="../js/jquery.js"></script>
        <script src="../js/menu.js"></script>
  <link rel="stylesheet" href="../css/notice.css">
  <?php
  $currentPage = $_SERVER['PHP_SELF'];
  $currentPage = basename($currentPage); // Obtener el nombre del archivo con su extensión
  
  // Eliminar la extensión .php del nombre del archivo
  $currentPage = str_replace('.php', '', $currentPage);

  echo "<style>
        #".$currentPage."{
          color: white;
          text-shadow: 0 0 3px yellow;
          background:rgba(71, 22, 46, 0.884);
          box-shadow: 0 0 5px white;
          padding:7px 10px;
        }
        </style>";
  ?>
  <header>
        <p><a href="index.php"><img class="logo" src="../img/nsv-logo.png" height="100px"></a></p>
        <h3 style="color:white; text-align:center; text-shadow:0 0 5px black;">Bienvenido al area de Administración &nbsp; &nbsp; Haz cambios con precaución</h3>
        
    </header>
    <div class="menu_bar">
        <a href="#" class="btn_menu"><span class="icon-menu"></span> Menu</a>
    </div>
  <nav>
    <?php
    if($rol=="Administrador"){
      echo "<a id='autores' href='autores.php'><span class='icon-4'></span> Autores</a>
    <a id='categorias' href='categorias.php'><span class='icon-10'></span> Categorias</a>";
    }
    /////////////////////////////////
    ?>
    <a id='publicaciones' href='publicaciones.php'><span class='icon-7'></span> Publicaciones</a>
    <a href='../index.php'><span class='icon-9'></span> Pag Principal</a>
</nav>