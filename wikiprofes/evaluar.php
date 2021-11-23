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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WikiProfes 2.0</title>
    <link rel="stylesheet" href="estilos/evaluar.css">
    <script>
        function enviarDatos(){
        var puntuacion = document.formulario.estrellas.value;
        var comentario = document.formulario.comentario.value;

        document.formulario.method = 'post';
        document.formulario.action = 'agregar_comentario.php?id=<?php echo $id; ?>';
        document.formulario.submit();
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
            <div class="main-text">
                <p class="nombre"><?php echo $nombre; ?></p>
                <p class="materia">Materia:<br><?php echo $materia; ?></p>
            </div>
        </div>
    </div>
    <div class="container2">
        <div class="cont2">
            <p class="tittle-e">Evaluación al Profesor</p><br>
            <p class="instruction-e">Puntua a tu profesor del 1 al 10, tomando en cuenta que 1 es lo más malo y 10 es lo más bueno.</p><br>
            <form name="formulario" class="form-e">
                <p class="clasificacion">
                    <input id="radio1" type="radio" name="estrellas" value="10">
                    <label class="etiqueta-e" for="radio1">★</label>
                    <input id="radio2" type="radio" name="estrellas" value="8">
                    <label class="etiqueta-e" for="radio2">★</label>
                    <input id="radio3" type="radio" name="estrellas" value="8">
                    <label class="etiqueta-e" for="radio3">★</label>
                    <input id="radio4" type="radio" name="estrellas" value="7">
                    <label class="etiqueta-e" for="radio4">★</label>
                    <input id="radio5" type="radio" name="estrellas" value="6">
                    <label class="etiqueta-e" for="radio5">★</label>
                    <input id="radio6" type="radio" name="estrellas" value="5">
                    <label class="etiqueta-e" for="radio6">★</label>
                    <input id="radio7" type="radio" name="estrellas" value="4">
                    <label class="etiqueta-e" for="radio7">★</label>
                    <input id="radio8" type="radio" name="estrellas" value="3">
                    <label class="etiqueta-e" for="radio8">★</label>
                    <input id="radio9" type="radio" name="estrellas" value="2">
                    <label class="etiqueta-e" for="radio9">★</label>
                    <input id="radio10" type="radio" name="estrellas" value="1">
                    <label class="etiqueta-e" for="radio10">★</label><br><br>
                </p>
                <label class="com-t">Escribe tu comentario</label><br><br>
                <textarea class="coment" name="comentario" cols="30" rows="5" maxlength="250" required></textarea><br><br>
                <input class="button-e" type="submit" onClick="enviarDatos(); return false;" value="Enviar">
            </form>
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