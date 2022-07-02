<?
session_start();
if(isset($_POST['exit_button']))
{
  	session_destroy();
}
header("Location: ./index.php");
?>	