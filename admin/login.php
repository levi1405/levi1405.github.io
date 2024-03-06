
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro - Noticias</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
    <script>
    function togglePasswordVisibilityu() {
        var passwordInput = document.getElementById("password1");
        var showPasswordCheckbox = document.getElementById("mostrarClave1");

        if (showPasswordCheckbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
    function togglePasswordVisibilityd() {
        var passwordInput = document.getElementById("password2");
        var showPasswordCheckbox = document.getElementById("mostrarClave2");

        if (showPasswordCheckbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>
<style>
    /* Estilo para el contenedor del checkbox */
#check {
    display: flex; /* Utiliza flexbox para centrar verticalmente los elementos */
    align-items: center; /* Centra verticalmente los elementos en el contenedor */
    margin-bottom: 1px; /* Agrega espacio debajo del grupo de formulario */
}

/* Ajusta el espacio entre la etiqueta y el checkbox */
#check label {
    margin-left: 2px; /* Agrega espacio entre la etiqueta y el checkbox */
    margin-right: 2px; /* Agrega espacio entre la etiqueta y el checkbox */
}

/* Estilo para el checkbox en sí */
#check input[type="checkbox"] {
    margin: 0; /* Restaura los márgenes del checkbox por defecto */
}
</style>
</head>
<body>
    <?php
    $nombre='';
    $clave='';
    ?>
    <br>
    <button whith="200px" style="box-shadow: 0 0 5px rgb(89, 255, 48); background: skyblue;"><a style="color:white; text-shadow:0 0 5px black; font-size:20px;" href="../index.php">Volver</a></button>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="login.php" class="formulario__login" method="post">
                        <h2>Iniciar Sesión</h2>
                        <?php
                        
                        session_start();
                        if(isset($_POST['entrar'])){
                            $nombre=$_POST['nombre'];
                            $clave=$_POST['clave'];
                            ///////////////////////////////////////////////
                            include("conexion.php");
                        $consul="SELECT * FROM autores where nombre='$nombre' and clave='$clave'";
                        $resultado=mysqli_query($conn,$consul);
                        $filas=mysqli_num_rows($resultado);
                        if ($filas>0){
                            
                            $_SESSION["estado"]="ok";
                            $_SESSION["nombre"]=$nombre;
                            header("location:../index.php");
                            exit();
                        }else{
                            echo "<p style='color: red; text-shadow: 0 0 5px black;'>Usuario o Contraseña Incorrectos</p>";
                            $_SESSION["estado"]="0";
                        }
                        $conn->close();
                        }
                        ?>
                        <input type="text" name="nombre" placeholder="Nombre Usuario" value="<?php echo $nombre ?>">
                        <input type="password" id="password2" name="clave" placeholder="Contraseña">
                        <div id="check">
                        <input type="checkbox" id="mostrarClave2" onchange="togglePasswordVisibilityd()" />
                        <label>Mostrar Contraseña</label>
                        </div>
                        <!-- <div id="mensajeError" style="color: red; text-shadow: 0 0 5px white;"> -->
                        <!-- </div> -->
                        <button name="entrar">Entrar</button>
                    </form>
                    <!-- ------------------------- -->
                    <!-- ////////REGISTER///////// -->
                    <!-- ------------------------- -->
                    <!-- ------------------------- -->
                    <form action="login.php" class="formulario__register" method="post">
                        <h2>Regístrarse</h2>
                        <input name="correo" type="text" placeholder="Correo Electronico">
                        <select name="tipo" style="width: 100%; height: 30px; margin-top: 20px; padding: 5px; border: none; background: #F2F2F2; font-size: 16px;">
                            <option value="Sin categoria" selected >Seleccionar Rol</option>
                            <option value="Periodista">Periodista</option>
                            <option value="Pasante">Pasante</option>
                        </select>
                        <input type="text" name="name" placeholder="Usuario">
                        <input type="password" id="password1" name="clav" placeholder="Contraseña">
                        <div id="check">
                        <input type="checkbox" id="mostrarClave1" onchange="togglePasswordVisibilityu()" />
                        <label >Mostrar Contraseña</label>
                        </div>
                        <?php


////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
            if(isset($_POST['registrar'])){
                $correo=$_POST['correo'];
                $tipo=$_POST['tipo'];
                $nombre=$_POST['name'];
                $clave=$_POST['clav'];
            ///////////////////////////////////////////////////
            include("conexion.php");
            
            $sql="INSERT INTO autores (correo, nombre, tipo, clave, estado)
            VALUES ('$correo','$nombre','$tipo','$clave','$estado')";
            if($conn->query($sql)===TRUE){
                echo "<script type='text/javascript'>
                    window.alert('Bienvenido!!');
                    </script>";
                    session_start();
                    $_SESSION["estado"]="ok";
                    header("location:../index.php");
            }else{
                echo "<p style='color:red; text-shadow:0 0 5px black;'>Error al Registrarse:</p>".$sql. "<br>".$conn->error;
                $_SESSION["estado"]="0";
            }
            $conn->close();
        }
        ?>
                        <button name="registrar">Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>
        <script src="../js/script.js"></script>
        
</body>
</html>