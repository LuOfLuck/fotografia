<?php
include("models.php");
echo "pruebas <br>";
/*
$res = $tableAlbum->add("titulo-1", "Una descripcion larga pero no tan larga");

$res = $tableFoto->add("img/prueba3.png", "Una descripcion larga pero no tan larga", 3);
$res = $tableAlbum->delete(4);
$res = $tableFoto->delete(7);
$res = $tableAlbum->update("nuevo titulo", "nueva descripcion", 3);
*/

$username = "Lucas123";
$password = "12345678";




$sth = $tableUser->loginUser($username, $password);
$sth->bind_result($username, $email);
while ($sth->fetch()){
	echo $username . " - " . $email;
}

?>