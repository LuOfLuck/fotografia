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
	<link rel="stylesheet" href="../css/log.css">
	<link rel="shortcut icon" href="https://www.luofluck.tech/assets/favicon.ico" type="image/x-icon">
	<title>Login</title>
</head>
<body>
	<div id="app">
		<div class="content">
			<h1 class="content__h1">INICIAR SESION</h1>
			<form action="models/views.php" method="POST" class="form">
				<input type="hidden" name="CSRFToken" value="<?php echo $_SESSION['CSRFToken']; ?>">
				<input type="hidden" name="login" value="true">
				<p class="form__p">
					<?php
						if(isset($_SESSION["message"])){
							echo $_SESSION["message"]; 
							$_SESSION["message"] = "";
						}

					?>
				</p>
				<div class="form__cont">
					<input type="text" name="username" minlength="6" maxlength="30" class="form__input form__input--text" id="id_username" placeholder="Username" required>	
				</div>
				<div class="form__cont">
					
	
					<input type="password" name="password" minlength="8" maxlength="50" class="form__input form__input--text" id="id_password" placeholder="Password" required>
				</div>
				<button class="form__input form__input--submit" type="submit"> enviar </button>
			</form>
		</div>
	</div>


</body>
</html>