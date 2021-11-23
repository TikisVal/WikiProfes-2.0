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
    <link rel="stylesheet" href="estilos/profesores.css">
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
        <div class="cont-button">
            <div class="add-prof">
                <a class="button-add-prof" href="form_agregarProfesor.php">Agregar Profesor</a>
            </div>
        </div>
        
        <div class="cont-bg">
            <table class="prof-table">
                <tr>
                    <td class="column title-column">Nombre</td>
                    <td class="column title-column">Materia</td>
                    <td class="column title-column">Puntuación</td>
                </tr>
                <?php
                    require "funciones/conecta.php";
                    $con = conecta();
                
                    $sql = "SELECT * FROM profesor";
                    $res = $con->query($sql);

                    while($row = $res->fetch_array()){
                        $id = $row["id"];
                        $nombre = $row["nombre"];
                        $materia = $row["materia"];
                        $puntuacion = $row["puntuacion"];
                ?>
                    <tr>
                        <td class="column"><a href="profesor.php?id=<?php echo $id; ?>"><?php echo $nombre; ?></a></td>
                        <td class="column"><?php echo $materia; ?></td>
                        <td class="column"><?php echo $puntuacion; ?></td>
                    </tr>
                <?php } ?>
            </table>
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