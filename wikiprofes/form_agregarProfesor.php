<?php
    session_start();
    $id = $_SESSION['id'];
    $nombre = $_SESSION['nombre'];
    $has_session = session_status();
    if(!isset($_SESSION['id'])){
        header("Location: inicio_sesion.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WikiProfes 2.0</title>
    <link rel="stylesheet" href="estilos/addP.css">
    <script>
        function enviarDatos() {
            document.formAddP.method = 'post';
			document.formAddP.action = 'agregar_Profesor.php';
			document.formAddP.submit();
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <a href="index.php"><img src="imagenes/logo.png" class="logo" alt="Main Logo"></a>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="profesores.php">Profesor</a></li>
                <li><a href="perfil.php">Perfil</a></li>
                <?php
                    if(isset($_SESSION['id'])){
                        ?>
                        <li><a href="funciones/cerrar_sesion.php">Cerrar Sesión</a></li>
                        <?php
                    }else{
                        ?>
                        <li><a href="inicio_sesion.php">Iniciar Sesión</a></li>
                        <?php
                    }
                ?>
            </ul>
        </div>
        
        <div class="cont-bg">
            <div class="form-c">
                <img class="img-form" src="imagenes/img-form.png" alt="Imagen Formulario">
            </div>
            <div class="form-c">
                <p class="form-t">Agregar Profesor</p><br>
                <form name="formAddP">
                    <label class="et-p">Nombre</label><br><br>
                    <input class="inp-p" type="text" name="nombre" required><br><br>
                    <label class="et-p">Materia</label><br><br>
                    <input class="inp-p" type="text" name="materia" required><br><br><br>
                    <input class="button-f" type="submit" onClick="enviarDatos(); return false;" value="Agregar">
                </form>
            </div>
        </div>
    </div>
    <div class="container3">
        <div class="footer">
            <div class="footer-cont"><p>!Agenda de una mejor manera!</p><img class="img-footer" src="imagenes/footer.jpg" alt="Imagen Footer"></div>
            <div class="footer-cont">@ Copyright 2021 WikiProfes 2.0</div>
            <div class="footer-cont"><img class="cucei-logo" src="imagenes/logo_cucei.png" alt="Logo Cucei"></div>
            <div class="footer-cont"><img class="logo-footer" src="imagenes/logo.png" alt="Logo"></div>
        </div>
    </div>
</body>
</html>