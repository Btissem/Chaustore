<?php

session_start();

$user = 'btissem';
$password_definit ='btissem';
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username&&$password){
		if($username==$user&&$password==$password_definit){
			$_SESSION['username']=$username;
			header('Location: admin.php');
		}else{
			echo 'Mauvais identifiant.';
		}
	}
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Chaustore :: Admin</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
		<div id="background"></div>
		<div id="form">
			<h2>Administration</h2>
			<form method="POST">
				<!-- ID -->
				<label for="">Identifiant</label>
				<input type="text" name="username" required>
				<!-- MDP -->
				<label for="">Mot de passe</label>
				<input type="password" name="password" required>
				<!-- BUTTON -->
				<input type="submit" name="submit" value="Envoyer">
			</form>
		</div>
	</div>
</body>
</html>
