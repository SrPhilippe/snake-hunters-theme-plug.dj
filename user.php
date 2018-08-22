<?php 
session_start();
include "assets/includes/connection.php";

if (!empty($_GET["id"])) {
	$proID = $_GET["id"];

	$sql = "SELECT * FROM users WHERE snake_id='$proID'";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$proUser = $row["snake_user"];
			$proAvatar = $row["snake_avatar"];
			$proBio = $row["snake_bio"];
		}
	} else {
		header("location: index.php");
	}

} else {
	header("location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo "Perfil " . $proUser ?></title>
	<link rel="stylesheet" href="assets/css/profile.css">
	<link rel="icon" href="assets/images/snake-icon.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">
</head>
<body>
	<a id="back-main" href="index.php"><i class="fas fa-chevron-circle-left"></i></a>
	<div id="proHead">
		<div class="background-blur" style="background-image: url('<?php echo "assets/" . $proAvatar ?>');"></div>
		<div class="content">
			<div class="head-box">
				<div class="img-profile">
					<img src="<?php echo "assets/" . $proAvatar ?>" alt="avatar <?php echo $proUser ?>">
				</div>
				<h1 class="name"><?php echo ucfirst($proUser) ?></h1>
				<p class="bio"><?php echo ucfirst($proBio) ?></p>
			</div>
		</div>
	</div>
</body>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		// Script para ocultar marca d'agua 000webhost
		$("div[style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;']").css("display", "none");
	});
</script>
</html>