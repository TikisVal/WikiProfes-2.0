<?php
    session_start();
    require "funciones/conecta.php";
    $con = conecta();
      
    $nombre = $_REQUEST['nombre'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];
    $enc_pass = md5($pass);

    $sql = "INSERT INTO estudiante (nombre, correo, pass) VALUES ('$nombre','$correo','$enc_pass')";
    $res = $con->query($sql);

    $sql2 = "SELECT * FROM estudiante WHERE correo = $correo";
    $res2 = $con->query($sql2);
    $num = $res2->num_rows;

    if($num){
        while($row = $res2->fetch_array()){
            $id = $row["id"];
            $nombre = $row["nombre"];
            $correo = $row["correo"];

            $_SESSION['id'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['correo'] = $correo;
        }
    }

    header("Location: inicio_sesion.php");
?>