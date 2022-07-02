<?php
  session_start();
  function getExtension( $filename ) 
  {
      $temp = explode( '.', $filename );
      return array_pop( $temp );
  }
  include ("connection.php");
  if(isset($_POST['submit_book']))
  {
    if($_SESSION['user']['email']!='')
    {
      $photo = getExtension($_FILES['photo_of_book']['name']);
      $file = getExtension($_FILES['file_of_book']['name']);
      $key = md5(microtime(true));
      copy($_FILES['photo_of_book']['tmp_name'],"./img/files_of_library/".$key.'.'.$photo);
      copy($_FILES['file_of_book']['tmp_name'],"./pdf_files_of_library/".$key.'.'.$file);
      $photo_name = $key.'.'.$photo;
      $file_name = $key.'.'.$file;
      $add="INSERT INTO `library` (`name_book`, `photo`, `name_of_file`, `author`, `type_of`, `email`) VALUES ('{$_POST['name_of_book']}','$photo_name','$file_name','{$_POST['author_of_book']}','{$_POST['type_of']}','{$_SESSION['user']['email']}')";
      mysqli_query($connect, $add);
      var_dump("INSERT INTO `library` (`name_book`, `photo`, `name_of_file`, `author`, `type_of`, `email`) VALUES ('{$_POST['name_of_book']}','$photo_name','$file_name','{$_POST['author_of_book']}','{$_POST['type_of']}','{$_SESSION['user']['email']}')");
    }
  }
  header('Location: ./library.php');
?>