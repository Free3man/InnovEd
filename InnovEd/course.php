<?
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
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
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>

	<link rel="stylesheet" href="css/tick.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

</head>
<body>
        <!-- Header section -->
		<header class="header-section">
       <a href="index.php" class="site-logo">
        <img src="img/logo.jpg" alt="">
       </a>
       <ul class="main-menu" <?if($_SESSION['user']!=''){echo "style='padding: unset'";}?>>
        <li><a href="index.php">Головна</a></li>
        <li><a href="library.php">Бібліотека</a></li>
        <li><a href="test_section.php">Тести</a></li>
        <li><a class="active" href="course.php">Курси</a></li>
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
        <li><a href="index.php">Головна</a></li>
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
	  <!-- Form section -->
      <div id="gray">
       <div class="dws-wrapper" id="dws-wrapper">
        <div class="dws-form">
          <label class="tab active" title="Авторизація">Авторизація</label>
          <label class="tab" title="Реєстрація">Реєстрація</label>
          <img class="cross" onclick="show('none')" src="img/close.png" width="20px" height="20px">
          <div class="tab-form active">
            <div class="box-input" id="email_block_auth">
              <input class="input" type="text" id="email_auth" required>
              <label>Введіть E-mail</label>
            </div>
            <div class="box-input" id="pass_block_auth">
              <input class="input" type="password" id="pass_auth" required>
              <label>Введіть пароль</label>
            </div>
            <a class="button" onclick="get_user();">Увійти</a>
            <ul class="social">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-vk"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            </ul>
            <a onclick="showemail()">Я забув свій E-mail або пароль</a>
          </div>
          <div class="tab-form del">
            <div class="box-input">
              <input class="input" type="text" id="surname_reg" required>
              <label>Введіть своє призвіще</label>
            </div>
            <div class="box-input">
              <input class="input" type="text" id="name_reg" required>
              <label>Введіть своє ім'я</label>
            </div>
            <div class="box-input">
              <input class="input" type="text" id="patronymic_reg" required>
              <label>Введіть своє по-батькові</label>
            </div>
            <div class="box-input" id="email_block_reg">
              <input class="input " type="text" id="email_reg" required>
              <label>Введіть E-mail адресу</label>
            </div>
            <div class="box-input check-valid">
              <input class="input" type="password" id="password_reg" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
              <label>Введіть пароль</label>
              <span class='wartext'>
					<ul>
						<li id="length" class="invalid">8 символів</li>
						<li id="capital" class="invalid">Велика літера</li>
						<li id="number" class="invalid">Цифри</li>
					</ul>
				</span>
            </div>
            <div class="box-input">
              <input type="date" id="birth_reg" value="2005-01-01" min="1950-01-01" max="2019-12-31" required>
              <label>Введіть вашу дату народження</label>
            </div>
            <div style="margin-bottom: -15px;">
              <p style="text-align: center;">Статус учасника</p>
              <div class="check_bar">
                <div>
                  <input id="status_p" name="status" type="radio" value="p" class="check_user_status">
                  <label for="status_p">Учень(иця)</label>
                </div>
                <div>
                  <input id="status_t" name="status" type="radio" value="t" class="check_user_status">
                  <label for="status_t">Вчитель</label>
                </div>
              </div>
            </div>
            <select id="form_reg" class="select-c" required style="display:none;">
              <option disabled selected>Оберіть свій клас</option>
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
            <a class="button" onclick="add_user();">
              <div class="div-1"></div>Зареєструватися
              <div class="div-2"></div>
            </a>
            <div class="recover">
              <input type="checkbox" id="ckbox">
              <label for="ckbox">Ознайомлений (-а) і приймаю <a href="#"> умови реєстрації</a></label>
            </div>
          </div>
          <form class="tab-form del" id="email" method="POST">
            <div class="box-input">
              <input class="input" type="text" name="почта1" required>
              <label>Введіть E-mail адресу</label>
            </div>
            <a href="" type="button" class="button" onClick="" name="check" id="check">
              <div class="div-1"></div>Отримати код
              <div class="div-2"></div>
            </a>
          </form>
        </div>
       </div>
      </div>
      <!-- Form section end -->
	<div id="gray"></div>
	<div class="course-menu">
	<img class="close-course" onclick="close_course_block();" src="img/close.png" width="20px" height="20px">
	<h3 class="title-modal">Програмування</h3>
	<div class="row">
	<div class="col-md-5 col-sm-12">
	<ul class="menu__box" id="menu__box">

	</ul>
	</div>
	<div class="col-md-7 col-sm-12">
		<div class="area-information">
			<iframe class="video_box" src="https://www.youtube.com/embed/FCMxA3m_Imc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<div class="row">
				<div class="col-6"><a href="pdf_files_of_courses/GG.pdf" id="lecture_link"><img src="./img/icons/exam.png" alt="Додаткові матеріали" class="icon-bottom"></a></div>
				<div class="col-6"><a href="./ok.php"><img src="./img/icons/article.png" alt="Перевірка засвоєного матеріалу" class="icon-bottom"></a></div>
			</div>
		</div>
		<div class="message-area" id="message-area">

		</div>
	</div>
	</div>
	</div>
    </div>
    	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/header-bg/5.png">
		<div class="container">
			<h2 style="color:black;">Курси та лекції</h2>
		</div>
	</section>
	<!-- Page top section end -->
	<div class="container">
    	<div class="search__container">
    		<input class="search__input" type="text" placeholder="Пошук">
		</div>
    	<div class="row" id="course_area">
				
    	</div>
		<div class="page-content page-container" id="page-content"	>
        	<div class="row container d-flex justify-content-center">
            	<div class="col-md-4 col-sm-6 grid-margin stretch-card">
            		<div class="loader-demo-box">
                		<div class="jumping-dots-loader"> <span></span> <span></span> <span></span> </div>
            		</div>
            	</div>
        	</div>
		</div>
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
									
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/script_form.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script>
	var request = new XMLHttpRequest();
	var name_course = "";
	var courses;
	var modules;
	var topics;
	var part = 0;
	$(document).ready(function() {	
	  	filter_course();
		window.addEventListener("scroll", scroll_event);
	});
	$(".search__input").on("keyup", function() {
		part = 0;
		name_course = $(this).val();
		window.removeEventListener("scroll", scroll_event);
		filter_course();
		window.addEventListener("scroll", scroll_event);
	});
	function filter_course()
	{
		var data = "name_course="+name_course;
		request.open("POST", "course_react.php", true);
	  	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  	request.send(data);
	  	request.onreadystatechange = function() {
	 	if (request.readyState == 4 && request.status == 200) 
        {
			document.getElementById("course_area").innerHTML = "";
			courses = Array.from(JSON.parse(request.responseText));
			for (var i = 12*part; i<12*part+12; i++)
			{
				document.getElementById("course_area").innerHTML += '<div class="col-lg-3 col-sm-6 course-block"  onclick="course_block(); get_modules(this.id);" id="'+courses[i]['id_course']+'"><img src="./course_img/'+courses[i]['course_photo']+'"><h3>'+courses[i]['name_course']+'</h3><div class="course_description">'+courses[i]['description']+'</div></div>';
			}
		}
	  	};
	}
	function get_modules(id_course)
	{
		$(".area-information").hide();
		$(".message-area").show();	
		var data = "id_course="+id_course;
		request.open("POST", "course_react.php", true);
	  	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  	request.send(data);
	  	request.onreadystatechange = function() {
	 	if (request.readyState == 4 && request.status == 200) 
        {
			document.getElementById("menu__box").innerHTML = "";
			var structure = Array.from(JSON.parse(request.responseText));
			modules = structure[0];
			topics = structure[1];
			for (var i=0; i<courses.length; i++)
			{
				if(courses[i]['id_course'] == id_course)
				{
					document.getElementById("message-area").innerHTML = courses[i]['description'];
					break;
				}
			}
			for (var i = 0; i<modules.length; i++)
			{
				document.getElementById("menu__box").innerHTML += '<li class="modal__item" onclick="module_description(this.id);" id='+modules[i]['id_module']+'>'+modules[i]['name_module']+'</li>';
				k=0;

				while (topics[k]['id_module'] == modules[i]['id_module'])
				{
					document.getElementById("menu__box").innerHTML += '<li onclick="get_topic(this.id);" id="'+topics[k]['id_topic']+'" class="topic__item">'+topics[k]['name_topic']+'</li>';
					k=k+1;
				}
			}
		}
	  	};
	}
	function module_description(id_module)
	{
		$(".area-information").hide();
		$(".message-area").show();	
		for (var i=0; i<modules.length; i++)
		{
			if(modules[i]['id_module'] == id_module)
			{
				document.getElementById("message-area").innerHTML = "<h3 style='margin-bottom:10px;'>"+modules[i]['name_module']+"</h3>";
				document.getElementById("message-area").innerHTML += modules[i]['description'];
			}
		}
	}
	function get_topic(id_topic)
	{
		for (var i=0; i<topics.length; i++)
		{
			if(topics[i]['id_topic'] == id_topic)
			{
				$('#lecture_link').attr('href', "pdf_files_of_courses/"+topics[i]['lecture_name']+"");
				$('.video_box').attr('src', ""+topics[i]['video_name']+"");
				$(".message-area").hide();	
				$(".area-information").show();
				break;
			}
		}
	}
	function add_course()
	{
		part++;	
		$("#page-content").css("display", "block");	
		setTimeout(function (){
			$("#page-content").css("display", "none");
			for (var i = 12*part; i<12*part+12; i++)
			{
				document.getElementById("course_area").innerHTML += '<div class="col-lg-3 col-sm-6 course-block"  onclick="course_block(); get_modules(this.id);" id="'+courses[i]['id_course']+'"><img src="./course_img/'+courses[i]['course_photo']+'"><h3>'+courses[i]['name_course']+'</h3><div class="course_description">'+courses[i]['description']+'</div></div>';
			}
			window.addEventListener("scroll", scroll_event);
		}, 1500);
	}
	var scroll_event=function(event){
		let height_footer = $(".footer-section").height();
		let scroll = document.documentElement.clientHeight+window.pageYOffset;
		success = false;
		if (scroll>=(document.body.scrollHeight-height_footer-200))
		{
			window.removeEventListener("scroll", scroll_event);
			add_course();
		}
	}
</script>