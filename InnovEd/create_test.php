<?session_start();?>
<html>
<head>
<title>Для тестів</title>
	<title>InnovEd</title>
	<meta charset="UTF-8">
	<meta name="description" content="Innoved_online_school">
	<meta name="keywords" content="innovation, school">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Favicon -->
	<link href="img/pres.png" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/test.css" type="text/css">
  <link rel="stylesheet" href="css/extra.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>

	<link rel="stylesheet" href="css/style_test.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>


	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
  <!-- Page Preloder -->

<!-- Header section -->
<header class="header-section">
		<a href="index.php" class="site-logo">
			<img src="img/logo.jpg" alt="">
		</a>
		<ul class="main-menu">
			<li><a href="index.php">Головна</a></li>
			<li><a href="library.php">Бібліотека</a></li>
			<li><a class="active" href="test_section.php">Тести</a></li>
			<li><a href="blog.php">Про нас</a></li>
			<li><a href="contact.php">Контакти</a></li>
		</ul>
	</header>
	<div class="clearfix"></div>
	<!-- Header section end -->
  <div class="set_test">
<div class="new-window">
<h2>
    <input class="name-main" name="name_of" form="test" value="Нова форма"></input>	
</h2>
<?php
 include "connection.php";
 mysqli_select_db($connect, "Online_school");
?>
<div class="row">
	<div class="col-4">
	<div class="form-group" name="class_of" form="test">
	<select class="form-control" id="subject_id" name="class_filter">
	<option disabled selected>Клас</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
	</select>
	</div>
	</div>
	<div class="col-4">
	<div class="form-group" name="class_of" form="test">
	<select class="form-control" id="subject_id" name="sub_of" form="test">
	<option disabled selected>Предмет</option>
		<option>Алгебра</option>
		<option>Біологія</option>
		<option>Англійська мова</option>
		<option>Всесвітня історія</option>
		<option>Географія</option>
		<option>Геометрія</option>
		<option>Громадянська освіта</option>
		<option>Зарубіжна література</option>
		<option>Інформатика</option>
		<option>Історія України</option>
		<option>Математика</option>
		<option>Природознавство</option>
		<option>Російська мова</option>
		<option>Українська література</option>
		<option>Українська мова</option>
		<option>Фізика</option>
		<option>Хімія</option>
	</select>
	</div>
	</div>
</div>
</div>
<div class="block_to_add" id="parent">
<input type="number" name="countclone" id="countclone" value="1">
<div class="row" id="question_1_part">
	<div class="col-md-9">
  		<div class="add row_add" form="test">  
    		<div class="col-md-8">
			<P>Введіть питання:</P>
    		<input class="in_b_o" form="test" id="q0" name="q0"><input type="number" name="count0" id="count0" value="1">
			<div id="extra0">
			</div>
			</div>
    		<div class="col-md-3">

			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="menu_button">
		<div>
			<label for="clone_republic"><h5>Додати питання </h5></label>
			<i class="fa fa-plus fa-1,7x" aria-hidden="true" onclick="clone()" id='clone_republic'></i>
		</div>
		<div>
			<label for="chtp"><h5>Тип питання:</h5></label>
			<select name="chtp0" onchange="type_q(this.id)" id="chtp0">
				<option value="nothing0" disabled selected>-</option>
  				<option value="mn0">Вибір з множини</option>
  				<option value="open0">Відкрита відповідь</option>
  				<option value="vid0">Вибір відповідності</option>
				<option value="vid0">Есе (відповідь з поясненнями)</option>
			</select>
		</div>
		<div>
			<label for="image_addition"><h5>Додати світлину </h5></label>
			<i class="fa fa-picture-o" aria-hidden="true"></i>
		</div>
		<div>
			<label for="clone_republic"><h5>Додати файл </h5></label>
			<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
		</div>
		</div>
	</div>
</div>
</div>
<button class="site-btn" type="submit" id="button_s" name="submit12" form="test" style="position: relative;left: 50%;transform: translate(-50%, 0); margin:10px;">Надіслати</button>
</div>
</div>
</div>
</div>
<?php
 $a=0;
 $x2="CREATE TABLE IF NOT EXISTS answer (id_a INT NOT NULL AUTO_INCREMENT PRIMARY KEY, answers VARCHAR(20) NOT NULL, parent_question int(20) NOT NULL, `correct_answer` ENUM('0','1') NOT NULL, FOREIGN KEY (parent_question) REFERENCES question (id_q) ON DELETE CASCADE)ENGINE=InnoDB CHARACTER SET utf8";
 $x4="CREATE TABLE IF NOT EXISTS answerv (id_priv INT NOT NULL AUTO_INCREMENT PRIMARY KEY, priv VARCHAR(20) NOT NULL, ansv VARCHAR(20) NOT NULL, parent_question int(20) NOT NULL, FOREIGN KEY (parent_question) REFERENCES question (id_q) ON DELETE CASCADE)ENGINE=InnoDB CHARACTER SET utf8";
 $x1="CREATE TABLE IF NOT EXISTS test (id_t INT NOT NULL AUTO_INCREMENT PRIMARY KEY, test_name VARCHAR(50) NOT NULL, class VARCHAR(20) NOT NULL, subj VARCHAR(30) NOT NULL, email VARCHAR(50) NOT NULL)ENGINE=InnoDB CHARACTER SET utf8";
 $x3="CREATE TABLE IF NOT EXISTS question (id_q INT NOT NULL AUTO_INCREMENT PRIMARY KEY, questions VARCHAR(80) NOT NULL, parent_test int(20) NOT NULL, `type_question` ENUM('0','1','2') NOT NULL, FOREIGN KEY (parent_test) REFERENCES test (id_t) ON DELETE CASCADE)ENGINE=InnoDB CHARACTER SET utf8";
 mysqli_query($connect, $x2);
 mysqli_query($connect, $x3);
 mysqli_query($connect, $x1);
 mysqli_query($connect, $x4);
if (!empty ($_POST))
{
if (isset($_POST['submit12']))
{
	 $tf= $_POST['name_of'];
	 $query_check ="SELECT * FROM test WHERE `test_name` = '$tf'";
	 $result_check = mysqli_query($connect, $query_check);
	 $rows_check = mysqli_num_rows($result_check);
	 if($rows_check>0)
	 {
		?>
		<script>alert("Така назва тесту вже існує");</script>
		<?
	 }
	if($rows_check==0)
	{
	$email_o=$_SESSION['user']['email'];
	$x1="INSERT INTO `test` (`test_name`, `class`, `subj`, `email`) VALUES ('{$_POST['name_of']}','{$_POST['class_of']}','{$_POST['sub_of']}','{$email_o}')";
	mysqli_query($connect, $x1);
    while($a<$_POST['countclone'])
    {
		$f=$_POST['count'.$a.''];
		$qo=$_POST['q'.$a.''];
		$query_check ="SELECT * FROM test WHERE `test_name` = '$tf'";
		$result_check = mysqli_query($connect, $query_check);
		$test_table = mysqli_fetch_assoc($result_check);
		$idt=$test_table['id_t'];
		if($_POST['ansc'.$a.'0']!='')
		{
			$f3="INSERT INTO `question` (`questions`, `parent_test`, `type_question`) VALUES ('{$qo}','{$idt}','1')";
			mysqli_query($connect, $f3);
			$query_check1 ="SELECT * FROM question WHERE `parent_test` = '$idt' AND `questions` = '$qo'";
			$result_check1 = mysqli_query($connect, $query_check1);
			$question_table = mysqli_fetch_assoc($result_check1);
			$idq=$question_table['id_q'];
			$d = $_POST['ansc'.$a.'0'];
			$f1="INSERT INTO `answer` (`answers`, `parent_question`, `correct_answer`) VALUES ('{$d}','{$idq}','1')";				
			mysqli_query($connect, $f1);	
		}
		elseif ($_POST['ansv'.$a.'0']!='')
		{
			$f3="INSERT INTO `question` (`questions`, `parent_test`, `type_question`) VALUES ('{$qo}','{$idt}','2')";
			mysqli_query($connect, $f3);
			$query_check1 ="SELECT * FROM question WHERE `parent_test` = '$idt' AND `questions` = '$qo'";
			$result_check1 = mysqli_query($connect, $query_check1);
			$question_table = mysqli_fetch_assoc($result_check1);
			$idq=$question_table['id_q'];
			for($i = 0; $i < $f; $i++)
		{
			$d = $_POST['ansv'.$a.''.$i.''];
			$de = $_POST['ansvpr'.$a.''.$i.''];
			echo $de." ".$d." ".$idq;
			$f1="INSERT INTO `answerv` (`priv`, `ansv`, `parent_question`) VALUES ('{$de}','{$d}','{$idq}')";				
			mysqli_query($connect, $f1);
		}
		}
		else
		{
		$f3="INSERT INTO `question` (`questions`, `parent_test`, `type_question`) VALUES ('{$qo}','{$idt}','0')";
		mysqli_query($connect, $f3);
		$query_check1 ="SELECT * FROM question WHERE `parent_test` = '$idt' AND `questions` = '$qo'";
			$result_check1 = mysqli_query($connect, $query_check1);
			$question_table = mysqli_fetch_assoc($result_check1);
			$idq=$question_table['id_q'];
		for($i = 0; $i < $f; $i++)
		{
			$d = $_POST['ans'.$a.''.$i.''];
			$check = $_POST['cor'.$a.''.$i.''];
			if($check == '')
			{
				$f1="INSERT INTO `answer` (`answers`, `parent_question`, `correct_answer`) VALUES ('{$d}','{$idq}','0')";				
			}
			else
			{
				$f1="INSERT INTO `answer` (`answers`, `parent_question`, `correct_answer`) VALUES ('{$d}','{$idq}','1')";
			}
			mysqli_query($connect, $f1);
		}
		}
    	$a=$a+1;
    }
}
}
}
?>
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
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
    <script src="js/script_form.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
var clonecount=1;
function clone() {
	clonecount=clonecount+1;
	$("#countclone").val(clonecount);
	$('<div class="row" id="question_'+clonecount+'_part"><div class="col-md-9"> <div class="add row_add" form="test"> <div class="col-md-8"><P>Введіть питання:</P> <input class="in_b_o" form="test" id="q0" name="q0"><input type="number" name="count0" id="count0" value="1"><div id="extra0"></div></div> <div class="col-md-3"></div><i class="fa fa-trash fa-2x" aria-hidden="true" onclick="del(this.id)"  id="question_'+clonecount+'"></i></div></div><div class="col-md-3"><div class="menu_button"><div><label for="clone_republic"><h5>Додати питання </h5></label><i class="fa fa-plus fa-1,7x" aria-hidden="true" onclick="clone()"></i></div><div><label for="chtp"><h5>Тип питання:</h5></label><select id="chtp0" name="chtp0" onchange="type_q()"><option value="nothing0" disabled selected>-</option> <option value="mn0">Вибір з множини</option> <option value="open0">Відкрита відповідь</option> <option value="vid0">Вибір відповідності</option><option value="vid0">Есе (відповідь з поясненнями)</option></select></div><div><label for="image_addition"><h5>Додати світлину </h5></label><i class="fa fa-picture-o" aria-hidden="true"></i></div><div><label for="clone_republic"><h5>Додати файл </h5></label><i class="fa fa-file-pdf-o" aria-hidden="true"></i></div></div></div></div>').insertAfter("#question_1_part");
}
function del(clicked_id) {
	clonecount=clonecount-1;
	$("#countclone").val(clonecount);	
	$('#'+clicked_id+'_part').remove();
}
function type_q(select) {
	alert(select);	
    let ol=select.options[select.selectedIndex].id;
    var sel=document.getElementById('chtp'+ol+'').selectedIndex;
	alert(sel);	
    var options=document.getElementById('chtp'+ol+'').options;
    var extra0 = document.getElementById('extra'+ol+'');
    if (options[sel].value=='mn'+ol+'')
    {
        f = 0;
        valcount= 1;
        $("#count"+ol+"").val(valcount);
        extra0.innerHTML ='<div id="mn'+ol+'"><P>Варіанти відповідей:</P><div class="answer" id="add'+ol+'"><input class="check" form="test" name="cor'+ol+'0" type="checkbox"><input class="in_b_o" form="test" name="ans'+ol+'0" value="Варіант 1"></div></div></div><div class="col-md-4"><label for="0">Додайте варіант відповіді:</label><img  class="click_to_add_block" onclick="reply_click(this.id)" id="'+ol+'" src="img/add.png"><br><br></div></div>';
    }
    if (options[sel].value=='open'+ol+'')
    {
        f = 0;
        valcount= 1;
        $("#count"+ol+"").val(valcount);
        extra0.innerHTML ='<div id="open'+ol+'"><P>Відповідь:</P><div class="answer" id="add'+ol+'"><input class="in_b_o" form="test" name="ansc'+ol+'0" value="Запис"></div></div>';
    }
    if (options[sel].value=='vid'+ol+'')
    {
        f = 0;
        valcount= 1;
        $("#count"+ol+"").val(valcount);
        extra0.innerHTML ='<div id="vid'+ol+'"><div class="answer" id="add'+ol+'">Приклад 1)<input class="in_b_o" form="test" name="ansvpr'+ol+'0" value="" >&rarr;Відповідь 1)<input class="in_b_o" form="test" name="ansv'+ol+'0" value=""></div><div class="col-md-2"><label for="0">Додайте варіант відповіді:</label><img  class="click_to_add_block" onclick="reply_click1(this.id)" id="'+ol+'" src="img/add.png"><br><br></div>';
    }
    if (options[sel].value=='nothing'+ol+'')
    {
        f = 0;
        valcount= 1;
        $("#count"+ol+"").val(valcount);
        extra0.innerHTML ='';
    }
    }
</script>
</body>
</html>