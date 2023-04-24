<?php

$FirstName = $_POST['first_name'];
$LastName = $_POST['last_name'];

$db_connect = mysqli_connect("localhost", "root", "", "imagine") or die("Connection Failed");

$query = "INSERT INTO `ajax_in`(`First_name`, `last_name`) VALUES ('$FirstName', '$LastName')";
// $result = mysqli_query($db_connect, $query) or die("no query runned");


if (mysqli_query($db_connect, $query)) {
	echo 1;
} else {
	echo 0;
}



?>