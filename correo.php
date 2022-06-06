<?php
if(isset($_POST['enviar'])){
    if(!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['asunto']) && !empty($_POST['mensaje']) )
    $nombre=_POST['nombre'];
    $corre=_POST['correo'];
    $asunto=_POST['asunto'];
    $mensaje=_POST['mensaje'];
    $from=$email;
    $to="juana2001molina@gmail.com";
    $menssaje=$mensaje
    $suject="nuevo mensaje de cliente".$correo;
    $headers = "From: " .$from; 

    if($email($to,$suject,$menssaje,$headers)){
        echo 1;
    }else{
        echo 0;
    }
}else{
    echo 0;
}
?>
