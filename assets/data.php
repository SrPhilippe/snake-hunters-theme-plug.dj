<?php
session_start();
include "includes/connection.php";

if (isset($_POST["login"])) {
	$username = $mysqli->escape_string($_POST["username"]);
	$password = $mysqli->escape_string(password_hash($_POST["password"], PASSWORD_BCRYPT));

	// Checa se usuário e senha são iguais no BD
	$result = $mysqli->query("SELECT * FROM users WHERE snake_user='$username'");

	if ($result->num_rows > 0) {

		$user = $result->fetch_assoc();

		if (password_verify($_POST["password"], $user["snake_password"])) {
			$_SESSION["id"] = $user["snake_id"];
			$_SESSION["bio"] = $user["snake_bio"];
			$_SESSION["plug_id"] = $user["plug_id"];
			$_SESSION["user"] = $user["snake_user"];
			$_SESSION["hash"] = $user["snake_hash"];
			$_SESSION["power"] = $user["snake_power"];
			$_SESSION["avatar"] = $user["snake_avatar"];

			// cookie
			// if (isset($_POST["keep"])) {
			// 	setcookie("keeping", $_SESSION["id"], strtotime("+30 days"), "/", false);
			// }

			exit("1");
		} else {
			exit("2");
		}
	} else {
		exit("3");
	}

} else if (isset($_POST["register"])) {
	
	if (!empty($_POST["plugID"])) {
		$plugID = $_POST["plugID"];
	} else {
		$plugID = "NULL";
	}

	$username = $mysqli->escape_string($_POST["username"]);		
	$password = $mysqli->escape_string(password_hash($_POST["password"], PASSWORD_BCRYPT));
	$email = $mysqli->escape_string($_POST["email"]);
	$hash = $mysqli->escape_string(md5(rand(0, 1000)));

	// Checar se e-mail e usuário já existe na tabela
	$sql = "SELECT * FROM users WHERE snake_mail='$email' OR snake_user='$username'";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		exit("4");
	} else {

		$sql = "INSERT INTO users (plug_id, snake_id, snake_power, snake_user, snake_mail, snake_password, snake_hash, snake_avatar, snake_time, status, snake_bio) VALUES ($plugID, NULL, 1, '$username', '$email', '$password', '$hash', 'uploads/default.png', NULL, 0, 'Essa é a sua biografia.')";

		// executa a query e verifica
		if ($mysqli->query($sql)) {
			exit("5");
		}
	}

} else { exit("Something is wrong here!"); }

?>