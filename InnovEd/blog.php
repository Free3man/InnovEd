<?php
session_start();
class Connect
{
    protected $server = "localhost";
    protected $login_db = "root";
    protected $password_db = "";
    protected $db = "online_school";
    public function connection_db()
    {
        $connect = mysqli_connect("{$this->server}", "{$this->login_db}", "{$this->password_db}", "{$this->db}");
        return $connect;
    }
}
class Posts extends Connect
{
    public function get_posts()
    {
        $connect = parent::connection_db(); 
        $get_result = mysqli_query($connect, "SELECT * FROM `news`");
        return $get_result;
    }
}
$post = new Posts();
$arr_news = $post->get_posts();
$arr_sidebar =  $post->get_posts();
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
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>


	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

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
        <li><a href="course.php">Курси</a></li>
        <li><a class="active" href="blog.php">Про нас</a></li>
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
        <li><a class="active" href="blog.php">Про нас</a></li>
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

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/header-bg/3.jpg">
		<div class="container">
			<h2>Новини</h2>
		</div>
	</section>
	<!-- Page top section end -->

	<!-- Blog section -->
	<section class="blog-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
				<?
					for ($i=0; $i<5; $i++):
						if($i==mysqli_num_rows($arr_news)):
							break;
						else:
							$news_post = mysqli_fetch_assoc($arr_news);
				?>	
					<div class="blog-item">
						<img src="img/blog/<?echo $news_post['main_image'];?>" alt="">						
						<h2><?echo $news_post['title'];?></h2>
						<div class="blog-metas">
							<div class="blog-meta"><img src="img/icons/edit.png" alt=""><?echo $news_post['author'];?></div>
							<div class="blog-meta"><img src="img/icons/layout.png" alt=""><?echo $news_post['type'];?></div>
						</div>
						<div class="text_post_article" id="<?echo "article".$news_post['id_post'];?>">
							<?echo $news_post['article'];?>
						</div>
						<div id="<?echo $news_post['id_post'];?>" onclick="get_full(this.id);" class="site-btn">Читати далі</div>
					</div>
				<?
						endif;
					endfor;		
				?>
				</div>
				<div class="col-lg-4 col-md-7 col-sm-9 sidebar">				
					<div class="widget-area">
						<h2 class="widget-title">Останні повідомлення</h2>
						<div class="recent-post-widget">
						<?
						for ($i=0; $i<3; $i++):
							if($i==mysqli_num_rows($arr_sidebar)):
								break;
							else:
								$sidebar = mysqli_fetch_assoc($arr_sidebar);
						?>	
							<div class="rp-item">
								<a><img src="img/blog/<?echo $sidebar['main_image'];?>" alt="">
								<div class="rp-text">
									<p><?echo $sidebar['title'];?></p>
									<div class="rp-date">Листопад 30, 2021</div>
								</div></a>
							</div>
						<?
							endif;
							endfor;		
						?>
						</div>
					</div>
					<div class="widget-area">
						<h2 class="widget-title">Теги</h2>
						<div class="tags-widget">
							<a href="#">InnovEd</a>
							<a href="#">education</a>
							<a href="#">innovations</a>
							<a href="#">startups</a>
							<a href="#">tips</a>
							<a href="#">blog</a>
							<a href="#">eco</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end -->
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
		function get_full(article_id)
		{
			if($("#"+article_id).text()=="Читати далі")
			{
				$("#article"+article_id).removeClass("text_post_article");
				$("#"+article_id).text("Повернути");
			}
			else
			{
				$("#article"+article_id).addClass("text_post_article");
				$("#"+article_id).text("Читати далі");
			}
		}
	</script>
	</body>
</html>
