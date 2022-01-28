<?php
session_start();
error_reporting(0);
?>
	<?php
	include "connection.php";
	  mysqli_select_db($connect, "Online_school");
	  if(!empty($_FILES))
	  {
	if(copy($_FILES['fileInput']['tmp_name'],"./photo_of_users/".$_FILES['fileInput']['name']))
	{
		$x1="UPDATE `users` SET `photo` = '".$_FILES['fileInput']['name']."' WHERE ID = ".$_SESSION['user']['id'].";";
		mysqli_query($connect, $x1);
		$_SESSION['user']['photo']=$_FILES['fileInput']['name'];
	}
}
	?>
<!DOCTYPE HTML>
<html>
	<head>
	<html lang="zxx">
    <title>InnovEd</title>
    <meta charset="UTF-8">
    <meta name="description" content="Innoved_online_school">
    <meta name="keywords" content="innovation, school">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  	<!-- Favicon -->
  	<link href="img/pres.png" rel="shortcut icon" />

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style_profile.css">
	<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
	<div class="clearfix"></div>
	<!-- Header section end -->
	<div id="page">
   <!-- Header section -->
   <header class="header-section">
       <a href="index.php" class="site-logo">
        <img src="img/logo.jpg" alt="">
       </a>
       <ul class="main-menu" <?if($_SESSION['user']!=''){echo "style='padding: unset'";}?>>
        <li><a class="hover-underline-animation" href="index.php">Головна</a></li>
        <li><a href="library.php">Бібліотека</a></li>
        <li><a href="test_section.php">Тести</a></li>
        <li><a href="course.php">Курси</a></li>
        <li><a href="blog.php">Про нас</a></li>
        <li><a href="contact.php">Контакти</a></li>
        <?if($_SESSION['user']==""):?>
          <li id="blprofile"><a onclick="show('block')">Вхід/Реєстрація</a></li>
          <?else:?>
            <li id="blprofile">
              <a href="/profile.php" class="img-link">
                <div class='circle-image'><img src='/photo_of_users/<?echo $_SESSION['user']['photo'];?>'></div>
              </a>
            </li>
            <?endif;?>
       </ul>
       <div class="roll-up-menu">
        <div class="menu icon up"></div>
        <div class="menu icon center"></div>
        <div class="menu icon down"></div>
       </div>
       <ul class="main-menu-mobile">
        <li><a class="active" href="index.php">Головна</a></li>
        <li><a href="library.php">Бібліотека</a></li>
        <li><a href="test_section.php">Тести</a></li>
        <li><a href="course.php">Курси</a></li>
        <li><a href="blog.php">Про нас</a></li>
        <li><a href="contact.php">Контакти</a></li>
        <?if($_SESSION['user']==""):?>
          <li id="blprofilemob"><a onclick="show('block');">Вхід/Реєстрація</a></li>
          <?else:?>
            <li id="blprofilemob">
              <a href="/profile.php">
                <div class='circle-image'><img src='/photo_of_users/<?echo $_SESSION['user']['photo'];?>'></div>
                <?echo  $_SESSION['user']['surname']." ".$_SESSION['user']['name'];?>
              </a>
            </li>
            <?endif;?>
       </ul>
      </header>
      <div class="clearfix"></div>
      <!-- Header section end -->
	<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image:url(images/cover_bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-2 text-center">
					<div class="display-t js-fullheight">
						<div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
						<form method="post" enctype="multipart/form-data">
						<div style="height:0px;overflow:hidden"> 
  						<input type="file" id="fileInput" name="fileInput" onchange="this.form.submit()"/> 
 						</div>
						</form>
						<div class="profile-thumb" onclick="fileInput.click();" style="background: url(../photo_of_users/<?echo $_SESSION['user']['photo']?>);"></div>
							<h1><span><?echo $_SESSION['user']['surname']." ".$_SESSION['user']['name']?></span></h1>
							<h3><span><?if($_SESSION['user']['status']=="p"){echo "Учень / ".$_SESSION['user']['form']." клас";} else {echo "Вчитель";}?></span></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div id="fh5co-about">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-2 text-center fh5co-heading">
					<h2>Про себе</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<ul class="info">
						<li><span class="first-block">Повне ім'я:</span><span class="second-block"><?echo $_SESSION['user']['surname']." ".$_SESSION['user']['name']." ".$_SESSION['user']['patronymic']?></span></li>
						<li><span class="first-block">Почтова адреса:</span><span class="second-block"><?echo $_SESSION['user']['email'];?></span></li>
						<?if($_SESSION['user']['status']=="p"){?><li><span class="first-block">Клас:</span><span class="second-block"><?echo $_SESSION['user']['form'];?></span></li><?}?>
						<li><span class="first-block">Дата народження:</span><span class="second-block"><?echo $_SESSION['user']['birth_date'];?></span></li>
						<li><span class="first-block">Статус:</span><span class="second-block"><?if($_SESSION['user']['status']=="p"){echo "Учень";} else {echo "Вчитель";}?></span></li>
					</ul>
				</div>
				<div class="col-md-7">
					<p>Мене звуть <?echo $_SESSION['user']['surname']." ".$_SESSION['user']['name']." ".$_SESSION['user']['patronymic']?>. Я <?if($_SESSION['user']['status']=="p"){echo "учень ".$_SESSION['user']['form']." класу";} else {echo "вчитель";}?> платформи InnovEd. Я прагну зробити свій внесок у розвиток освітнього порталу, отримати новий досвід та знання, використовуючи інноваційні технології та новітні засоби надання освіти.</p>
				</div>
			</div>
		</div>
	</div>
	<?php if($_SESSION['user']['status']=="p"):?>
		<div id="fh5co-resume" class="fh5co-bg-color">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-md-offset-2 text-center fh5co-heading">
						<h2>Оцінки</h2>
					</div>
					<table>
						<tbody>
							<tr>
  								<th>Назва тесту</th>
  								<th>Результати тесту</th>
  								<th>Клас</th>
  								<th>Предмет</th>
  								<th>Звіт</th>
  							</tr>
 							<?php
  								$email_pupil=$_SESSION['user']['email'];
  								$result_p = mysqli_query($connect, "SELECT * FROM `test_results` WHERE `email` = '$email_pupil'");
								if($result_p)
								{
								  for ($i = 0 ; $i < mysqli_num_rows($result_p); ++$i)
								    {
								        $result = mysqli_fetch_row($result_p);
								        $result_r = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_test` = '$result[1]'");
								        $row_r = mysqli_fetch_row($result_r);
								        echo "<tr>";
								        echo "<td>$row_r[1]</td>";
								        echo "<td>$result[2]</td>";
								        echo "<td>$row_r[5]</td>";
								        echo "<td>$row_r[4]</td>";
										echo "<td><a href='../sites-test/ ".$result[3].".html' >Посилання</a></td>";
								        echo "</tr>";
								    }
								}
  							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?endif;?>
	<?php if($_SESSION['user']['status']=="t"):?>
		<div id="fh5co-resume" class="fh5co-bg-color">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-md-offset-2 text-center fh5co-heading">
						<h2>Створені тести</h2>
					</div>
					<table>
						<tbody>
							<tr>
  								<th>Назва тесту</th>
  								<th>Клас</th>
  								<th>Предмет</th>
  							</tr>
  							<?php
  								$email_o=$_SESSION['user']['email'];
  								$query ="SELECT * FROM `test` WHERE `teacher_email` = '$email_o'";
  								$result_q = mysqli_query($connect, $query);
								if($result_q)
								{
								  $rows_q = mysqli_num_rows($result_q);
								  for ($i = 0 ; $i < $rows_q ; ++$i)
								    {
								        $row = mysqli_fetch_row($result_q);
								        echo "<tr>";
								        echo "<td data-toggle='modal' data-target='#result_pupils' onclick='get_response(this.id);' id='".$row[0]."'>$row[1]</td>";
								        echo "<td>$row[5]</td>";
								        echo "<td>$row[4]</td>";
								        echo "</tr>";
								    }
								}
  							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?endif;?>
	<div class="modal fade" id="result_pupils" tabindex="-1" role="dialog" aria-labelledby="result_pupilsTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
        		<h5 class="modal-title" id="result_pupilsTitle">Результати</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
	      		</div>
	     		<div class="modal-body">
		  			<table >
						<tbody id="pupil_results">
							<tr>
								<th>Призвіще</th>
								<th>Ім'я</th>
	  							<th>Результати тесту</th>
	 							<th>Детальний аналіз</th>
	  						</tr>
						</tbody>
					</table>
	  			</div>
	    	</div>
	  	</div>
	</div>
	<div class="modal fade" id="book_list" tabindex="-1" role="dialog" aria-labelledby="book_listTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
        		<h5 class="modal-title" id="book_listTitle">Книги користувача</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
	      		</div>
	     		<div class="modal-body">
		  			<table>
						<tbody id="user_book">
							<tr>
								<th>Назва книги</th>
								<th>Автор</th>
	  							<th>Тип книги</th>
	  						</tr>
						</tbody>
					</table>
	  			</div>
	    	</div>
	  	</div>
	</div>
	  <div class="modal fade" id="redacting_book" tabindex="-1" role="dialog" aria-labelledby="redacting_bookLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="redacting_bookLabel">Редагування книги</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" name="book_add" id="book_add" enctype="multipart/form-data">
            <div class="box-input">
              <input class="input" type="text" name="name_of_book" id="name_of_book" style="width:100%" required>
              <label>Введіть назву підручника:</label>
            </div>
            <div class="box-input">
              <input class="input" type="text" name="author_of_book" id="author_of_book" style="width:100%" required>
              <label>Введіть автора:</label>
            </div>
            <select name="type_of" class="select-c" id="type_of" required>
              <option disabled >Оберіть тип підручника:</option>
              <option value="Література">Література</option>
              <option value="Підготовка до екзаменів">Підготовка до екзаменів</option>
              <option value="Учбовий матеріал">Учбовий матеріал</option>
              <option value="Поглиблене (додаткове) вивчення">Поглиблене (додаткове) вивчення</option>
            </select>
            <div class="file-input">
              <div class="form-group">
                <label class="label">
                  <i class="material-icons" id="photo">attach_file</i>
                  <span class="title">Прикріпити фото підручника</span>
                  <input type="file" id="photo_of_the_book" name="photo_of_book" accept=".jpg, .jpeg, .png">
				  <input type="text" name="photo_book" id="photo_book" hidden>
                </label>
                <script>
                  document.getElementById('photo_of_the_book').addEventListener('change', function() {
					$("#photo_book").val("");
                    if (this.value) {
                      $("#photo").html("image");;
                    } else {
                      $("#photo").html("attach_file");
                    }
                  });
                </script>
              </div>
            </div>
            <div class="file-input">
              <div class="form-group">
                <label class="label">
                  <i class="material-icons" id="file">attach_file</i>
                  <span class="title">Прикріпити файл підручика</span>
                  <input type="file" id="file_of_the_book" name="file_of_book" accept=".pdf">
				  <input type="text" name="file_book" id="file_book" hidden>
                </label>
                <script>
                  document.getElementById('file_of_the_book').addEventListener('change', function() {
					$("#file_book").val("");
                    if (this.value) {
                      $("#file").html("picture_as_pdf");
                    } else {
                      $("#file").html("attach_file");
                    }
                  });
                </script>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
          <button type="submit" name="submit_book" class="btn btn-primary" form="book_add" id="submit_book">Зберегти</button>
        </div>
      </div>
    </div>
  </div>
	<div id="fh5co-resume" class="fh5co-bg-color">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-2 text-center fh5co-heading">
					<h2>Книжна шухлядка</h2>
				</div>
			</div>
			<div class="book-shelf" id="<?echo $_SESSION['user']['email'];?>" onclick="get_books(this.id);" data-toggle='modal' data-target='#book_list'>
				<img src="./img/shelf.png" alt="">
			</div>
			<form method="post" action="./destroy.php">
				<button class="exit-button" name="exit_button">Вихід</button>
			</form>	
		</div>
	</div>
	<!-- Footer section -->
	<footer class="footer-section set-bg" data-setbg="img/footer-bg1.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget">
						<h4>Наше місцезнаходження</h4>
						<div class="fw-info-box">
							<img src="img/icons/1.png" alt="">
							<div class="fw-info-text">
								<p>49000, вул. Дарницька 9(А), Дніпро, Дніпропетровська область</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget">
						<h4>Контакні номери</h4>
						<div class="fw-info-box">
							<img src="img/icons/2.png" alt="">
							<div class="fw-info-text">
								<p>+38 (099)310-0138</p>
								<p>+38 (099)073-4310</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget">
						<h4>Поштова скриня</h4>
						<div class="fw-info-box">
							<img src="img/icons/3.png" alt="">
							<div class="fw-info-text">
								<p>innoved@ukr.net</p>
								<p>www.innoved.com</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget">
						<h4>Соціальні мережи</h4>
						<div class="fw-info-box">
							<img src="img/icons/4.png" alt="">
							<div class="social-links">
								<a href="#"><i class="fa fa-pinterest"></i></a>
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 order-2 order-md-1">
					<div><p class="copyright">
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> | All rights reserved</p></div>
				</div>
				<div class="col-md-6 order-1 order-md-2">
					<ul class="footer-menu">
						<li><a href="">Головна</a></li>
						<li><a href="">Бібліотека</a></li>
						<li><a href="">Тести</a></li>
						<li><a href="">Про нас</a></li>
						<li><a href="">Контакти</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->
	<script>$('.file-upload').file_upload();</script>
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/script_form.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script>
	  var request = new XMLHttpRequest();
	  function get_response(id_test)
	  {
	  	data = "id_test="+id_test;
	  	request.open("POST", "profile_react.php", true);
	  	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  	request.send(data);
	  	request.onreadystatechange = function() {
	 	if (request.readyState == 4 && request.status == 200) 
        {
			var results = Array.from(JSON.parse(request.responseText));
			document.getElementById("pupil_results").innerHTML = "<tr><th>Призвіще</th><th>Ім'я</th><th>Результати тесту</th><th>Детальний аналіз</th></tr>";
			for (var i=0; i<results.length; i++)
			{
				document.getElementById("pupil_results").innerHTML += "<tr><td>"+results[i]['surname']+"</td><td>"+results[i]['name']+"</td><td>"+results[i]['score']+"</td><td><a href='./sites-test/%20"+results[i]['review']+".html'>Результати</a></td></tr>";
			}			
		}
		}
	  }
	  var books ;
	  function get_books(email)
	  {
	  	data = "email_user="+email;
	  	request.open("POST", "profile_react.php", true);
	  	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  	request.send(data);
	  	request.onreadystatechange = function() {
	 	if (request.readyState == 4 && request.status == 200) 
        {
			books = Array.from(JSON.parse(request.responseText));
			document.getElementById("user_book").innerHTML = "<tr><th>Назва книги</th><th>Автор</th><th>Тип книги</th></tr>";
			for (var i=0; i<books.length; i++)
			{
				document.getElementById("user_book").innerHTML += "<tr data-toggle='modal' data-target='#redacting_book' onclick='get_book(this.id)' id='"+i+"'><td>"+books[i]['name_book']+"</td><td>"+books[i]['author']+"</td><td>"+books[i]['type_of']+"</td></tr>";
			}			
		}
		}
	  }
	  function get_book(book_id)
	  {
	  	$("#name_of_book").val(books[book_id]['name_book']);
		$("#author_of_book").val(books[book_id]['author']);
		$("#type_of").val(books[book_id]['type_of']);
		$("#photo_book").val(books[book_id]['photo']);
		$("#file_book").val(books[book_id]['name_of_file']);
		$("#photo").html("image");
		$("#file").html("picture_as_pdf");	
		$("#submit_book").val(books[book_id]['id_book']);
	  }
	</script>
	</body>
</html>
<?
 function getExtension( $filename ) 
 {
	 $temp = explode( '.', $filename );
	 return array_pop( $temp );
 }
  if(isset($_POST['submit_book']))
  {
    if($_SESSION['user']['email']!='')
    {
		if($_POST['file_book']!="")
		{
			$file_name = $_POST['file_book'];
		}
		elseif ($_FILES['file_of_book']!="")
		{
			$file = getExtension($_FILES['file_of_book']['name']);
			$key = md5(microtime(true));
			$file_name = $key.'.'.$file;
			copy($_FILES['file_of_book']['tmp_name'],"./pdf_files_of_library/".$key.'.'.$file);
		}
		if($_POST['photo_book']!="")
		{
			$photo_name = $_POST['photo_book'];
		}
		elseif ($_FILES['photo_of_book']!="")
		{
			$photo = getExtension($_FILES['photo_of_book']['name']);
			$key = md5(microtime(true));
			$photo_name = $key.'.'.$photo;
			copy($_FILES['photo_of_book']['tmp_name'],"./img/files_of_library/".$key.'.'.$photo);
		}
      $add="UPDATE `library` SET `name_book` = '{$_POST['name_of_book']}', `photo` = '$photo_name', `name_of_file` = '$file_name', `author` = '{$_POST['author_of_book']}', `type_of` = '{$_POST['type_of']}', `email` = '{$_SESSION['user']['email']}' WHERE `id_book` = '{$_POST['submit_book']}'";
      var_dump($add);
	  mysqli_query($connect, $add);
    }
  }
?>






