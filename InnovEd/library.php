<?
session_start();
include "connection.php";
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
  <link href="img/pres.png" rel="shortcut icon" />

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/flaticon.css" />

  <link rel="stylesheet" href="css/tick.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="css/style.css" />

</head>

<body>
      <!-- Header section -->
      <header class="header-section">
       <a href="index.php" class="site-logo">
        <img src="img/logo.jpg" alt="">
       </a>
       <ul class="main-menu" <?if($_SESSION['user']!=''){echo "style='padding: unset'";}?>>
        <li><a href="index.php">Головна</a></li>
        <li><a class="active" href="library.php">Бібліотека</a></li>
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

  <!-- Feature section -->
  <section class="library set-bg" data-setbg="img/library.png">
    <div class="container">
      <h1 style="color:rgb(255, 255, 255);">Нова бібліотека</h1>
    </div>
  </section>
  <section class="feature-section">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-lg-10">
          <div class="section-title text-center">
            <h2 class="animate__animated animate__swing"><span class="color-span-one">Читання</span> - це один з витоків мислення і розумового розвитку</h2>
          </div>
        </div>
      </div>
      <div class="row filter-box">
        <div class="col-lg-3">
            <select id="type_of_book">
              <option value="">Тип підручника:</option>
              <option value="Література">Література</option>
              <option value="Підготовка до екзаменів">Підготовка до екзаменів</option>
              <option value="Учбовий матеріал">Учбовий матеріал</option>
              <option value="Поглиблене (додаткове) вивчення">Поглиблене (додаткове) вивчення</option>
            </select>
        </div>
        <div class="col-lg-3" >
            <input class="input" type="text" id="author_book" placeholder="Автор книги">
        </div>
		    <div class="col-lg-3" >
        		<input class="input" type="text" id="name_of_book" placeholder="Назва книги">
        </div>
        <div class="col-lg-3">
            <button name="clear_filter" class="filter-box-button" id="stop_filter"><span class="front"> Прибрати фільтр </span></button>
        </div>
      </div>
	  <div class="row" id="book_area">

	  </div>
	  <div id="pagination" class="site-pagination">

	  </div>
    </div>
    <div class="container">
      <button type="button" class="site-btn" data-toggle="modal" data-target="#exampleModal" style="display: flex; padding: 10px;margin-bottom: 20px;">
        <h3>Додати книгу</h3><i class="fa fa-plus fa-1,7x" aria-hidden="true"></i>
      </button>
    </div>
    </div>
  </section>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Створення книги</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" name="book_add" id="book_add" enctype="multipart/form-data" action="add_book.php">
            <div class="box-input">
              <input class="input" type="text" name="name_of_book" style="width:100%" required>
              <label>Введіть назву підручника:</label>
            </div>
            <div class="box-input">
              <input class="input" type="text" name="author_of_book" style="width:100%" required>
              <label>Введіть автора:</label>
            </div>
            <select name="type_of" class="select-c" required>
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
                  <input type="file" id="photo_of_the_book" name="photo_of_book" accept=".jpg, .jpeg, .png" required>
                </label>
                <script>
                  document.getElementById('photo_of_the_book').addEventListener('change', function() {
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
                  <input type="file" id="file_of_the_book" name="file_of_book" accept=".pdf" required>
                </label>
                <script>
                  document.getElementById('file_of_the_book').addEventListener('change', function() {
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
          <button type="submit" name="submit_book" class="btn btn-primary" form="book_add">Зберегти</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Feature section end -->
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
          <div>
            <p class="copyright">
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script> | All rights reserved</p>
          </div>
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
	  var page = 0;
	  var books;
	  function send_filter()
	  {
		let author = $("#author_book").val();
	  	let name_book = $("#name_of_book").val();
	  	let type_book = $("#type_of_book").val();
	  	data = "author="+author+"&name_book="+name_book+"&type_book="+type_book;
	  	request.open("POST", "library_react.php", true);
	  	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  	request.send(data);
	  	request.onreadystatechange = function() {
	 		if (request.readyState == 4 && request.status == 200) 
        {
				document.getElementById("book_area").innerHTML = '';
				var books = Array.from(JSON.parse(request.responseText));
        if(books.length>8)
		 		{
					document.getElementById("pagination").innerHTML = '';
          var k = 0;
          if(page>=5)
          {
            var k = page - 4;
          }
          else
          {
            k=0;
          }
          if(page!=0)
          {
            document.getElementById("pagination").innerHTML += '<p onclick="pagination(this.id);" id='+(page-1)+'><</p>';
          }
          for (var i = k; i<Math.ceil(books.length/8); i++)
					{
            if(i==6+k)
            {
              break;
            }
						document.getElementById("pagination").innerHTML += '<p onclick="pagination(this.id);" id='+i+'>'+(i+1)+'</p>';
					}
          if(page<Math.ceil(books.length/8)-1)
          {
            document.getElementById("pagination").innerHTML += '<p onclick="pagination(this.id);" id='+(parseInt(page)+1)+'>></p>';
          }
		 		}
				else
				{
					document.getElementById("pagination").innerHTML = '';
				}
				for(var i=8*page; i<8*page+8; i++)
          		{
					if(books[i]['author']!="")
					{
						document.getElementById("book_area").innerHTML += '<div class="col-lg-3 col-sm-6"><a href="pdf_files_of_library/'+books[i]['name_of_file']+'"><div class=pricing-box><img alt="" src="img/files_of_library/'+books[i]['photo']+'"><p class=subject_c>'+books[i]['author']+'</p><p class=subject_c>'+books[i]['name_book']+'</p></div></a></div>';
					}
					else
					{
						break;
					}
				}
			}
	  	};
	  }
	  function pagination(page_selected)
	  {
		page = page_selected;
		send_filter();
	  }
	  $("#author_book").on("keyup", function() {
		page = 0;
		send_filter();
	  });
	  $("#name_of_book").on("keyup", function() {
		page = 0;
		send_filter();
	  });
	  $("#type_of_book").on("change", function() {
		page = 0;
		send_filter();
	  });
	  $("#stop_filter").on("click", function() {
		$("#author_book").val("");
	  	$("#name_of_book").val("");
	  	$("#type_of_book").val("");
		page = 0;
		send_filter();
	  });
	  $( document ).ready(function() {
		page = 0;
		send_filter();
	  });
  </script>
</body>
</html>