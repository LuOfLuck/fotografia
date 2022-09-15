<?php
$nombre= $_POST['nombre'];
$correo=$_POST['correo'];
$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];
$from="lucasgabrielcarmeloph@gmail.com";
$to="lucasgabrielcarmeloph@gmail.com";
$menssaje=$mensaje;
$suject="nuevo mensaje de cliente".$correo;
$headers = "From: " . $from; 

if(mail($to,$suject,$menssaje,$headers)){
    echo "email enviado";
}else{
    echo "email no enviado";
}


?>
