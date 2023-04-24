<?php

$student_Id = $_POST['id'];
$student_Firstname = $_POST['first_name'];
$student_Lastname = $_POST['last_name'];

$db_connect = mysqli_connect("localhost", "root", "", "imagine") or die("Connection Failed");

$update_query = "UPDATE `ajax_in` SET `First_name` = '{$student_Firstname}', `last_name` = '{$student_Lastname}' WHERE `Id` = {$student_Id}";

if (mysqli_query($db_connect, $update_query)) {
    echo 1;
} else {
    echo 0;
}

?>