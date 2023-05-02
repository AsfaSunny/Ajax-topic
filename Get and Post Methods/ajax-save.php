<?php

$db_connect = mysqli_connect("localhost", "root", "", "imagine") or die("Connection Failed");

$first_name = $_POST['f_name'];
$last_name = $_POST['l_name'];

$sql = "INSERT INTO `ajax_in`(`First_name`, `last_name`) VALUES ('$first_name', '$last_name')";

if (mysqli_query($db_connect, $sql)) {
	echo 1;
} else {
	echo 0;
}

?>