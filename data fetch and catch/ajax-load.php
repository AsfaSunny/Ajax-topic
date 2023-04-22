<?php


$db_connect = mysqli_connect("localhost", "root", "", "imagine") or die("Connection Failed");

$query = "SELECT * FROM `team_member`";
$result = mysqli_query($db_connect, $query) or die("no query runned");
$output = "";

if (mysqli_num_rows($result) > 0) {
	$output = "<table border='1' width='100%' cellspacing='0' cellpadding='10px'>
				<tr>
					<th>Id.</th>
					<th>Name</th>
					<th>city</th>
				</tr>";

				while ($rows = mysqli_fetch_assoc($result)) {
					$output .= "<tr><td>{$rows['id']}</td><td>{$rows['name']}</td><td>{$rows['city']}</td></tr>";
				}
	$output .= "</table>";
	mysqli_close($db_connect);

	echo $output;
} else {

}


?>