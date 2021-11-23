<?php
    require "conecta.php";
    $con = conecta();

    $correo = $_REQUEST['correo'];
    $ban = 0;

    $sql = "SELECT correo FROM estudiante";
    $res = $con->query($sql);

    while($row = $res->fetch_array()){
        $correoE = $row["correo"];
        
        if($correo == $correoE){
            $ban = 1;
        }
    } 
    
    echo $ban;
?>