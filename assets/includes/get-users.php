<?php

include "connection.php";

$query = "SELECT * FROM users";

if ($result = $mysqli->query($query)) {

	$allUsers = [];
	while ($row = $result->fetch_assoc()) {
		echo "<a href='user.php?id=" .$row["snake_id"]. "'>";
			echo "<div class='user-box'>";
				echo "<p class='user-name'>" .$row["snake_user"]. "</p>";
				echo "<img src='" . "assets/" .$row["snake_avatar"]. "'>";
			echo "</div>";
		echo "</a>";

		// $allUsers[$row["snake_user"]] = $row["snake_avatar"];
	}

	// foreach ($allUsers as $name => $avatar) {
	// 	echo "<a href='user.php?'>";
	// 		echo "<div class='user-box'>";
	// 			echo "<p class='user-name'>" .$name. "</p>";
	// 			echo "<img src='" .$avatar. "'>";
	// 		echo "</div>";
	// 	echo "</a>";
	// }
}

?>