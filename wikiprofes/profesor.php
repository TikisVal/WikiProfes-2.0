<?php
    session_start();
    $idS = $_SESSION['id'];
    $nombreS = $_SESSION['nombre'];
    $has_session = session_status();
    if(!isset($_SESSION['id'])){
        header("Location: inicio_sesion.php");
    }
    require "funciones/conecta.php";
    $con = conecta();

    $id = $_GET['id'];
    $sql = "SELECT * FROM profesor WHERE id = $id";
    $res = $con->query($sql);
    while($row = $res->fetch_array()){
        $nombre = $row["nombre"];
        $materia = $row["materia"];
        $puntuacion = $row["puntuacion"];
    }

    $sql2 = "SELECT * FROM comentario WHERE id_profesor = $id";
    $res2 = $con->query($sql2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WikiProfes 2.0</title>
    <link rel="stylesheet" href="estilos/profesor.css">
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
                <p class="nombre"><?php echo $nombre; ?></p>
                <p class="materia">Materia:<br><?php echo $materia; ?></p>
            </div>
            <a class="button-evaluate" href="evaluar.php?id=<?php echo $id; ?>">Evaluar Profesor</a> 

            <div class="cont-coments">
                <div class="com1">
                    <p class="puntuacion">Puntuación</p>
                    <p class="punt-n"><?php echo $puntuacion; ?></p>
                </div>
                <div class="com2">
                    <p class="tittle-coms">Comentarios:</p>
                    <table class="table-coms">
                        <tr>
                            <td class="column-coms coms-t">Id de comentario</td>
                            <td class="column-coms coms-t">Estudiante</td>
                            <td class="column-coms coms-t">Comentario</td>
                        </tr>
                        <?php 
                            while($row = $res2->fetch_array()){
                                $idC = $row["id"];
                                $id_estudiante = $row["id_estudiante"];
                                $comentario = $row["comentario"];

                                $sql3 = "SELECT nombre FROM estudiante WHERE id = $id_estudiante";
                                $res3 = $con->query($sql3);

                                while($row = $res3->fetch_array()){
                                    $nombreE = $row["nombre"];
                                }
                        ?>
                        <tr>
                            <td class="column-coms col-id"><?php echo $idC; ?></td>
                            <td class="column-coms col-nom"><?php echo $nombreE; ?></td>
                            <td class="column-coms col-com"><?php echo $comentario; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
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