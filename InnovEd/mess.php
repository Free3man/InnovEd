<?php
include("connection.php");
$send="INSERT INTO `message` (`id_group`, `id_user`, `message`, `date`) VALUES ('{$_POST['id_group']}','{$_POST['id_user']}','{$_POST['message']}','{$_POST['date']}')";
mysqli_query($connect, $send);
?>