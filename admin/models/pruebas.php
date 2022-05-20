<?php
include("models.php");
echo "pruebas <br>";
/*
$res = $tableAlbum->add("titulo-1", "Una descripcion larga pero no tan larga");

$res = $tableFoto->add("img/prueba3.png", "Una descripcion larga pero no tan larga", 3);
$res = $tableAlbum->delete(4);
$res = $tableFoto->delete(7);
*/
$res = $tableAlbum->update("nuevo titulo", "nueva descripcion", 3);
if($res){
	echo "res correcto <br>";
}else{
	echo "error yqc";
}
?>