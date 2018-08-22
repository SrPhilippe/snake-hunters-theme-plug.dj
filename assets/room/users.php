<?php

header('Access-Control-Allow-Origin: https://plug.dj'); 
header('Content-Type: text/css');

// Conexão com BD
include "../includes/connection.php";

// Seleciona todas as colunas da tabela, ONDE plug_id não é nulo
$sql = "SELECT * FROM users WHERE plug_id IS NOT NULL";
$result = $mysqli->query($sql);

// Url para ser atribuída
$url = "https://snakehunters.com.br/";

if ($result) {
	$avatars = [];
	while ($row = $result->fetch_assoc()) {
		$avatars[$row["plug_id"]] = $row["snake_avatar"];
	}
}

foreach ($avatars as $id => $avatar) {
	$av = str_replace(" ", "%20", $avatar);
	echo "#chat-messages .id-" . $id . " .badge-box .bdg" . " {\n";
	echo "        " . "background-image: url(" . $url . "assets/" . $av . ");\n";
	echo "        " . "background-size: cover;\n";
	echo "        " . "background-position: center;\n";
	echo "        " . "border-radius: 6px;\n";
	echo "}" . "\n\n";
}

echo "\n\n" . "/" . "* ---------------------ROLLOVER--------------------- *" . "/";
echo "\n\n";

foreach ($avatars as $id => $avatar) {
	$av = str_replace(" ", "%20", $avatar);
	echo "#user-rollover.id-" . $id . " .badge-box .bdg" . " {\n";
	echo "        " . "background-image: url(" . $url . "assets/" . $av . ");\n";
	echo "        " . "background-size: cover;\n";
	echo "        " . "background-position: center;\n";
	echo "        " . "border-radius: 6px;\n";
	echo "}" . "\n\n";
}

echo "\n\n" . "/" . "* ---------------------AVATAR-HOVER--------------------- *" . "/";
echo "\n\n";

foreach ($avatars as $id => $avatar) {
	$av = str_replace(" ", "%20", $avatar);
	echo "#chat .message.id-" . $id . " .badge-box:hover {";
	echo " width: 75px; height: 75px; ";
	echo "}" . "\n\n";
}

?>

#chat .message .badge-box {
    transition: .3s ease-in-out;
}

#chat .message .badge-box .bdg {
    width: 100%;
    height: 100%;
}