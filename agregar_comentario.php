<?php
    require "funciones/conecta.php";
    $con = conecta();
    session_start();
    $idS = $_SESSION['id'];

    $idP = $_REQUEST['id'];
    $puntuacion = $_REQUEST['estrellas'];
    $comentario = $_REQUEST['comentario'];

    $sql = "INSERT INTO comentario (id_profesor, id_estudiante, comentario) VALUES ('$idP','$idS','$comentario')";
    $res = $con->query($sql);

    $sql2 = "SELECT puntuacion FROM profesor WHERE id = $idP";
    $res2 = $con->query($sql2);
    while($row = $res2->fetch_array()){
        $puntuacion2 = $row["puntuacion"];
    }
    if($puntuacion2 != 0){
        $puntuacion = ($puntuacion + $puntuacion2) / 2;
    }
   
    $sql3 ="UPDATE profesor SET puntuacion = $puntuacion WHERE id = $idP";
    $res3 = $con->query($sql3);
    header("Location: profesores.php");
?>