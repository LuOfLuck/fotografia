<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="pruebas.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="img">
			<input type="submit" value="enviar">
	</form>
<?php
include("models.php");
echo "pruebas <br>";
/*

$res = $tableAlbum->add("titulo-1", "Una descripcion larga pero no tan larga");
$res = $tableAlbum->delete(4);
$res = $tableFoto->delete(7);
$res = $tableAlbum->update("nuevo titulo", "nueva descripcion", 3);
$sth = $tableUser->loginUser($username, $password);
$sth->bind_result($username, $email);

$username = "Lucas123";
$password = "12345678";
*/

/**/
?>

</body>
</html>