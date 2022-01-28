<?php
include 'connection.php';
var_dump(mysqli_query($connect, "INSERT INTO `contact` (`email`, `theme`, `message`, `name`) VALUES ('{$_POST['email']}','{$_POST['theme']}','{$_POST['message']}','{$_POST['name']}')"));
?>