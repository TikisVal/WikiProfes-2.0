<?php
    session_start();
    $has_session = session_status();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WikiProfes 2.0</title>
    <link rel="stylesheet" href="estilos/estilos.css">
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
            <div class="main-text">
                En esta página podrás encontrar reseñas, comentarios y calificaciones de los profesores de CUCEI,
                es una página de estudiantes para los estudiantes, te invitamos a crear una cuenta para que puedas realizar 
                comentarios sobre tus profesores.
            </div>
            <a class="button-register" href="registro.php">Crear cuenta</a> 
        </div>
    </div>
    <div class="container2">
        <div class="content2">
            <div class="cont">
                <img src="imagenes/icono1.png" alt="icono1"><br>
                Realiza comentarios<br>
                sobretus profesores para<br>
                alimentar el siti web.
            </div>
            <div class="cont">
                <img src="imagenes/icono2" alt="icono2"><br>
                Otorga una puntuación<br>
                a tus profesores en una<br>
                escala del 1 al 100.
            </div>
            <div class="cont">
                <img src="imagenes/icono3" alt="icono3"><br>
                Consulta reseñas sobre<br>
                cualquier profesor de CUCEI<br>
                para conocer mas sobre el.
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