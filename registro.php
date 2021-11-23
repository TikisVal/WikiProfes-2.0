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
    <title>WikiProfes 2.0</title>
    <link rel="stylesheet" href="estilos/registro.css">
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script>
        function enviarDatos() {
            var nombre = document.formAddE.nombre.value;
            var correo = document.formAddE.correo.value;
            var pass = document.formAddE.pass.value;
            if(nombre.length != 0 && correo.length != 0 && pass.length != 0){
                document.formAddE.method = 'post';
                document.formAddE.action = 'agregar_Estudiante.php';
                document.formAddE.submit();
            }else{
                $('.mensaje').html('Faltan campos por llenar.');
                setTimeout("$('.mensaje').html('');",5000);
            }
        }
        
        function verificarCorreo() {
            var correo = document.formAddE.correo.value;

            if (/^\w+([\.-]?\w+)*@alumnos.udg.mx/.test(correo)){
                $.ajax({
                    url : 'funciones/verificarCorreo.php',
                    type : 'post',
                    dataType : 'text',
                    data : {'correo' : correo},
                    success : function(res){
                        if (res == 1){
                            $('.mensaje').html('Este correo ya existe.');
                            setTimeout("$('.mensaje').html('');",5000);
                        }
                    },error : function(){
                        alert('Error archivo no encontrado...');
                    }
                });
            } else {
                $('.mensaje').html('Correo no valido.');
                setTimeout("$('.mensaje').html('');",5000);
            }
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
                <img class="img-form" src="imagenes/img-form2.png" alt="Imagen Formulario">
            </div>
            <div class="form-c">
                <p class="form-t">Registro</p><br>
                <form name="formAddE">
                    <label class="et-p">Nombre</label><br><br>
                    <input class="inp-p" type="text" name="nombre"><br><br>
                    <label class="et-p">Correo</label><br><br>
                    <input class="inp-p" type="text" name="correo" onBlur="verificarCorreo(); return false;"><br><br><br>
                    <label class="et-p">Contraseña</label><br><br>
                    <input class="inp-p" type="password" name="pass"><br><br><br>
                    <input class="button-f" type="submit" onClick="enviarDatos(); return false;" value="Registrarse">
                </form>
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