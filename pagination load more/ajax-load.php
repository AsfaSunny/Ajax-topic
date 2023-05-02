<?php

$db_connect = mysqli_connect("localhost", "root", "", "imagine") or die("Connection Failed");


$page_limit = 3;

if (isset($_POST['page_number'])) {
	$page = $_POST['page_number'];
} else {
	$page = 0;
}


$query = "SELECT * FROM `ajax_in` LIMIT {$page}, {$page_limit}";
$result = mysqli_query($db_connect, $query) or die("no query runned");


if (mysqli_num_rows($result) > 0) {
	$output = "";
	$output .= "<tbody>";

				while ($rows = mysqli_fetch_assoc($result)) {
					$last_id = $rows['Id'];
					$output .= "<tr><td>{$rows['Id']}</td><td>{$rows['First_name']} {$rows['last_name']}</td></tr>";
				}

	
	$output .= "</tbody>
                  <tbody id='pagination'>
                    <tr>
                      <td colspan='2'>
                        <button id='ajaxbtn' data-id='{$last_id}'>Load More</button>
                      </td>
                    </tr>
                  </tbody>";


	echo $output;
} else {
	echo "";
}

mysqli_close($db_connect);
?>