<?php
$nombre= $_POST['nombre'];
$correo=$_POST['correo'];
$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];
$from="juana2001molina@gmail.com";
$to="juana2001molina@gmail.com";
$menssaje=$mensaje;
$suject="nuevo mensaje de cliente".$correo;
$headers = "From: " . $from; 

if(mail($to,$suject,$menssaje,$headers)){
    echo "email enviado";
}else{
    echo "email no enviado";
}


?>
