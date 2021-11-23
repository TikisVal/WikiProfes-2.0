<?php
  require "funciones/conecta.php";
  $con = conecta();
      
  $nombre = $_REQUEST['nombre'];
  $materia = $_REQUEST['materia'];

  $sql = "INSERT INTO profesor (nombre, materia) VALUES ('$nombre','$materia')";
  $res = $con->query($sql);
      
  header("Location: profesores.php");
?>