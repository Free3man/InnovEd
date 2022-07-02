<?php
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

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>


	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

     <!-- Header section -->
	 <header class="header-section">
       <a href="index.php" class="site-logo">
        <img src="img/logo.jpg" alt="">
       </a>
       <ul class="main-menu" <?if($_SESSION['user']!=''){echo "style='padding: unset'";}?>>
        <li><a href="index.php">Головна</a></li>
        <li><a href="library.php">Бібліотека</a></li>
        <li><a href="test_section.php">Тести</a></li>
        <li><a href="course.php">Курси</a></li>
        <li><a href="blog.php">Про нас</a></li>
        <li><a class="active"  href="contact.php">Контакти</a></li>
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
        <li><a class="active" href="contact.php">Контакти</a></li>
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
	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/header-bg/4.jpg">
		<div class="container">
			<h2>Контакти</h2>
		</div>
	</section>
	<!-- Page top section end -->

	<!-- Contact section -->
	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h2 class="contact-title">Контактні дані</h2>
					<div class="contact-info-warp">
						<h4>Місцезнаходження</h4>
						<div class="contact-info">
							<img src="img/icons/1-dark.png" alt="">
							<div class="cf-text">
								<p>49000, вул. Дарницька 9(А), Дніпро, Дніпропетровська область</p>
							</div>
						</div>
					</div>
					<div class="contact-info-warp">
						<h4>Контакні номери</h4>
						<div class="contact-info">
							<img src="img/icons/2-dark.png" alt="">
							<div class="cf-text">
								<p>+38 (099)310-0138</p>
								<p>+38 (099)073-4310</p>
							</div>
						</div>
					</div>
					<div class="contact-info-warp">
						<h4>Поштова скриня</h4>
						<div class="contact-info">
							<img src="img/icons/3-dark.png" alt="">
							<div class="cf-text">
								<p>innoved@ukr.net</p>
								<p>www.innoved.com</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<h2 class="contact-title">Зв'язатися з нами</h2>
					<div class="contact-form">
						<div class="row">
							<div class="col-md-6">
								<input type="text" placeholder="Ваше ім'я" id="name">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Ваша поштова адреса" id="email">
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="Тема" id="theme">
								<textarea placeholder="Повідомлення" id="message"></textarea>
								<button class="site-btn" onclick="send_contacts();">Надіслати повідомлення</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6471.589990397551!2d35.06692137767398!3d48.50433062607041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d95863685f1c27%3A0x78bc80660427f23c!2z0YPQu9C40YbQsCDQlNCw0YDQvdC40YbQutCw0Y8sIDnQkCwg0JTQvdC40L_RgNC-LCDQlNC90LXQv9GA0L7Qv9C10YLRgNC-0LLRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwgNDkwMDA!5e0!3m2!1sru!2sua!4v1609860799887!5m2!1sru!2sua" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
	</section>
	<!-- Contact section end -->


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
	<script>
		var request = new XMLHttpRequest();
		  function send_contacts()
		  {
			  let message = $("#message").val();
			  let name = $("#name").val();
			  let email = $("#email").val();
			  let theme = $("#theme").val();
			  data = "message="+message+"&name="+name+"&email="+email+"&theme="+theme;
			  request.open("POST", "contact_form.php", true);
			  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
			  request.send(data);
			  $("#message").val("");
			  $("#name").val("");
			  $("#email").val("");
			  $("#theme").val("");
		  }
	  </script>
	</body>
</html>
