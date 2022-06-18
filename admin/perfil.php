	<?php
		include("models/security.php");
		$security->userActive();
		$_SESSION['CSRFToken'] = $security->creartedToken();
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<title><?php echo $_SESSION['username']; ?></title>
	<a href="models/urls.php?logout=true"><button>logout</button></a>
</head>
<body>
</body>
</html>