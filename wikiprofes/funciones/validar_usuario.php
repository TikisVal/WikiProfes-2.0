<?php
	session_start();
	require "conecta.php";
	$con = conecta();
	$ban = 0;

	$correo = $_REQUEST['correo'];
	$pass = $_REQUEST['pass'];
	$enc_pass = md5($pass);
	
	$sql = "SELECT * FROM estudiante WHERE correo = '$correo' AND pass = '$enc_pass'";
	$res = $con->query($sql);
    $num = $res->num_rows;

    if($num){
        $ban = 1;
        while($row = $res->fetch_array()){
		  $id = $row["id"];
		  $nombre = $row["nombre"];
		  $correo = $row["correo"];

		  $_SESSION['id'] = $id;
		  $_SESSION['nombre'] = $nombre;
		  $_SESSION['correo'] = $correo;
	   }
    }

	echo $ban;
?>