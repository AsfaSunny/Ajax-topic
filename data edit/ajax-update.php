<?php
$student_update_id = $_POST['id'];

$db_connect = mysqli_connect("localhost", "root", "", "imagine") or die("Connection Failed");

$query = "SELECT * FROM `ajax_in` WHERE Id = {$student_update_id}";
$result = mysqli_query($db_connect, $query) or die("no query runned");
$output = "";

if (mysqli_num_rows($result) > 0) {
	while ($rows = mysqli_fetch_assoc($result)) {
		$output .= "<tr>
						<td>First Name</td>
						<td>
							<input type='text' id='edit_fname' value='{$rows["First_name"]}'>
							<input type='text' id='edit_id' hidden value='{$rows["Id"]}'>
						</td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input type='text' id='edit_lname' value='{$rows["last_name"]}'></td>
					</tr>
					<tr>
						<td></td>
						<td><input type='submit' id='edit' value='save'></td>
					</tr>";
	}


	mysqli_close($db_connect);

	echo $output;
} else {
	echo "<h2>No Records Found.</h2>";
}


?>