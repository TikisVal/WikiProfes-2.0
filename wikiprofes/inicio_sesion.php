<?php
    session_start();
    $has_session = session_status();
    if(isset($_SESSION['id'])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script>
        function enviarDatos() {
            var correo = document.formulario.correo.value;
            var pass = document.formulario.pass.value;
            $.ajax({
                    url : 'funciones/validar_usuario.php',
                    type : 'post',
                    dataType : 'text',
                    data : {'correo' : correo, 'pass' : pass},
                    success : function(res){
                        if (res == 1){
                            window.location.href = 'index.php';
                        }else{
                            $('.mensaje').html('El usuario no existe.');
                            setTimeout("$('.mensaje').html('');",5000);
                        }
                    },error : function(){
                        alert('Error archivo no encontrado...');
                    }
                });
        }
    </script>
    <link rel="stylesheet" href="estilos/inicio_sesion.css">
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
                <img class="img-form" src="imagenes/img-form3.png" alt="Imagen Formulario">
            </div>
            <div class="form-c">
                <p class="form-t">Iniciar Sesión</p><br>
                <form name="formulario">
                    <label class="et-p">Correo</label><br><br>
                    <input class="inp-p" type="text" name="correo" required><br><br><br>
                    <label class="et-p">Contraseña</label><br><br>
                    <input class="inp-p" type="password" name="pass" required><br><br><br>
                    <input class="button-f" type="submit" value="Ingresar" onClick="enviarDatos(); return false;"><br><br><br>
                </form>
                <a href="registro.php" class="reg-f">Registrarse</a>
                <div class="mensaje"></div>
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