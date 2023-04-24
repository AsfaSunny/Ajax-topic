<?php


$db_connect = mysqli_connect("localhost", "root", "", "imagine") or die("Connection Failed");


$page_limit = 4;
$page = "";
if (isset($_POST['page_number'])) {
	$page = $_POST['page_number'];
} else {
	$page = 1;
}

$offset = ($page - 1) * $page_limit;


$query = "SELECT * FROM `ajax_in` LIMIT {$offset}, {$page_limit}";
$result = mysqli_query($db_connect, $query) or die("no query runned");
$output = "";

if (mysqli_num_rows($result) > 0) {
	$output .= "<table border='1' width='100%' cellspacing='0' cellpadding='10px'>
				<tr>
					<th>Id.</th>
					<th>Name</th>
				</tr>";

				while ($rows = mysqli_fetch_assoc($result)) {
					$output .= "<tr><td>{$rows['Id']}</td><td>{$rows['First_name']} {$rows['last_name']}</td></tr>";
				}
	$output .= "</table>";

	//pagination output
	$total_data_query = "SELECT * FROM `ajax_in`";
	$records = mysqli_query($db_connect, $total_data_query) or die("no query runned");
	$total_records_num = mysqli_num_rows($records);
	$total_pages = ceil($total_records_num/$page_limit);

	$output .= "<div id='pagination'>";
	for ($i=1; $i <= $total_pages; $i++) {
		if ($i == $page) {
			$active = "active";
		} else {
			$active = "";
		}

		$output .= "<a class='{$active}' id='{$i}' href=''>{$i}</a>";
	}
	$output .= "</div>";

	mysqli_close($db_connect);



	echo $output;
} else {
	echo "<h2>No Records Found.</h2>";
}


?>