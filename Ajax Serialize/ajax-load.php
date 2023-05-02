<?php

$db_connect = mysqli_connect("localhost", "root", "", "imagine") or die("Connection Failed");

$name = $_POST['fullname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$country = $_POST['country'];

$sql = "INSERT INTO `ajax_serialize`(`Name`, `Age`, `Gender`, `Country`) VALUES ('$name','$age','$gender','$country')";

if (mysqli_query($db_connect, $sql)) {
	echo "Hello {$name} your record is saved";
} else {
	echo "Can't saved your data";
}

?>