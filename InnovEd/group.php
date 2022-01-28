<?php
include("connection.php");
$message_result = mysqli_query($connect, "SELECT * FROM `message` WHERE `id_group` = '{$_POST['group_id']}'");
$arr = array();
for ($i=0; $i<mysqli_num_rows($message_result); $i++)
{
    $arr_extra = mysqli_fetch_assoc($message_result);
    array_push($arr, $arr_extra);
}
echo json_encode($arr);
?>