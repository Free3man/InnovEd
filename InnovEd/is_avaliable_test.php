<?php
include "connection.php";
mysqli_select_db($connect, "Online_school");
$testname=$_POST['testname'];
$query_check_test ="SELECT * FROM `test` WHERE `name_test` = '$testname'";
$result_check_test = mysqli_query($connect,$query_check_test);
$test_table = mysqli_fetch_assoc($result_check_test);
$check_test = $test_table['name_test'];
echo $check_test;   
?>