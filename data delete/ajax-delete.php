<?php

$DeleteID = $_POST['del_ID'];

$db_connect = mysqli_connect("localhost", "root", "", "imagine") or die("Connection Failed");

$delete_query = "DELETE FROM `ajax_in` WHERE `Id` = {$DeleteID}";


if (mysqli_query($db_connect, $delete_query)) {
	echo 1;
} else {
	echo 0;
}

?>