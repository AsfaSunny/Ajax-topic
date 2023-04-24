<?php

$search_data = $_POST['search'];

$db_connect = mysqli_connect("localhost", "root", "", "imagine") or die("Connection Failed");

$query = "SELECT * FROM `ajax_in` WHERE First_name LIKE '%{$search_data}%' OR last_name LIKE '%{$search_data}%'";
$result = mysqli_query($db_connect, $query) or die("no query runned");
$output = "";

if (mysqli_num_rows($result) > 0) {
	$output = "<table border='1' width='100%' cellspacing='0' cellpadding='10px'>
				<tr>
					<th>Id.</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Action</th>
				</tr>";

				while ($rows = mysqli_fetch_assoc($result)) {
					$output .= "<tr><td>{$rows['Id']}</td><td>{$rows['First_name']}</td><td>{$rows['last_name']}</td><td><button class='delete-btn' data-id='{$rows['Id']}'>Delete</button><button class='edit-btn' data-eid='{$rows['Id']}'>Edit</button></td></tr>";
				}
	$output .= "</table>";

	mysqli_close($db_connect);

	echo $output;
} else {
	echo "<h2>No Record Found.</h2>";
}


?>