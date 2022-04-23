<?php
	include("models/security.php");
	$security->userInactive();
	$_SESSION['CSRFToken'] = $security->creartedToken();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<header>
		
	</header>
	<div id="app">
		<div class="">
			<?php
			if(isset($_SESSION["message"])){
				echo $_SESSION["message"]; 
			}
			echo (isset($_SESSION["violation"]))?"<br>solicitudes no permitidas: ".$_SESSION["violation"] : "";
			echo (isset($_SESSION["loginIncorrect"]))?"<br>inicios de intentos fallidos: " . $_SESSION["loginIncorrect"] :"";
			?>
			<form action="models/views.php" method="POST">
				<input type="hidden" name="CSRFToken" value="<?php echo $_SESSION['CSRFToken']; ?>">
				<input type="hidden" name="login" value="true">
				<label for="id_username">Username</label>
				<input type="text" name="username" id="id_username">
				<label for="id_password">Password</label>
				<input type="password" name="password" id="id_password">
				<input type="submit" value="enviar">
			</form>
		</div>
	</div>
</body>
</html>