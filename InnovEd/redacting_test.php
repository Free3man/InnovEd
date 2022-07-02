<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Innoved</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Stylesheets -->
<link rel="stylesheet" href="css/extra.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/font-awesome.min.css"/>
<link rel="stylesheet" href="css/owl.carousel.min.css"/>
<link rel="stylesheet" href="css/flaticon.css"/>
<link rel="stylesheet" href="css/slicknav.min.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/style_test.css" type="text/css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   
<!--jQuery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
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
       <div class="house">
    <div class="container"> 
        <form enctype="multipart/form-data" method="POST" id="form_send" action="test_create_react.php">
    <div class="name_block">
        <input type="text" name="name_of_test" class="test-name-input" placeholder="Назва тесту" onkeypress="return isNumberKey(event)" maxlength="50" required id="testnameone" oninput="check_name_test();"/>
        <textarea name="instruction" placeholder="Інструкція до проходження тесту" onkeypress="return isNumberKey(event)" maxlength="200"></textarea>
        <div class="row">
            <div class="col-md-6 col-sm-12">
            <div class="form-group" name="class_of">
            <select class="form-control" id="subject_id" name="form_of" required>
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
            <div class="col-md-6 col-sm-12">
            <div class="form-group" name="class_of">
            <select class="form-control" id="subject_id" name="sub_of" required>
            <option disabled selected>Предмет</option>
                <option value="Алгебра">Алгебра</option>
                <option value="Біологія">Біологія</option>
                <option value="Англійська мова">Англійська мова</option>
                <option value="Всесвітня історія">Всесвітня історія</option>
                <option value="Географія">Географія</option>
                <option value="Геометрія">Геометрія</option>
                <option value="Громадянська освіта">Громадянська освіта</option>
                <option value="Зарубіжна література">Зарубіжна література</option>
                <option value="Інформатика">Інформатика</option>
                <option value="Історія України">Історія України</option>
                <option value="Математика">Математика</option>
                <option value="Природознавство">Природознавство</option>
                <option value="Російська мова">Російська мова</option>
                <option value="Українська література">Українська література</option>
                <option value="Українська мова">Українська мова</option>
                <option value="Фізика">Фізика</option>
                <option value="Хімія">Хімія</option>
            </select>
            </div>
            </div>
        </div>
        <div class="test_theme">
            <div class="color-block one" onclick="chooseback(this.id);" id="one"></div>
            <div class="color-block two" onclick="chooseback(this.id);" id="two"></div>
            <div class="color-block three" onclick="chooseback(this.id);" id="three"></div>
            <div class="color-block four" onclick="chooseback(this.id);" id="four"></div>
        </div>
        <div class="timer">
            <p>Хвилини:</p>
            <input type="text" name="timer" class="timer-time" placeholder="Час проходження тесту" onkeypress="return isNumberKey(event)" maxlength="4" required/>
        </div>  
        <input type="text" name="background_photo" id="background_photo" value="test3.jpg" hidden/>
    </div>
    <div class="question_block" id="question_1_part"> 
        <div class="row"> 
            <div class="col-lg-8 col-md-12"> 
                <div class="question"> 
                    <div class="form__group field"> 
                        <input type="input" class="form__field" placeholder="Питання" name="question[]" id="name0" required onkeypress="return isNumberKey(event)" maxlength="300"/> 
                        <label for="name0" class="form__label">Введіть питання</label> 
                    </div> 
                </div>
                <input type="number" name="quet_num[]" id="quet_num1" value="1" hidden> 
                <div id="quest1_before">
                <div class="answers">
                    <div id="quest1"> 
                        <label class="rad-label" id="ans1"> 
                            <input type="checkbox" class="rad-input" name="check_answer[]" value="true" id="checkbox0"> 
                            <div class="rad-design"></div> 
                            <input type="text" name="answer[]" value="Варіант відповіді" class="rad-text" onkeypress="return isNumberKey(event)" maxlength="100" required/> 
                                <input type="file" id="imgupload1" name="answer_photo[]" onChange="img_pathUrl(this);" hidden/> 
                                <i class="material-icons" id="image1" onclick="get_image(this.id); open_image(this.id);">image</i> 
                        </label>
                        <div class="ans-img" id="out_block1">
                        <i class="material-icons btn-cl" id="del_image1" onclick="del_image(this.id);">
                                close
                        </i>
                        <img id="output1" class="answer_image">
                        </div>
                    </div> 
                    <label class="rad-label" id="1" onclick="add_ans(this.id);"> 
                        <div class="rad-text">Додати варіант відповіді</div> 
                    </label> 
                </div> 
                 </div>
                </div> 
                    <div class="col-lg-4 col-md-12"> 
                        <div class="row"> <div class="form-group" name="class_of" form="test" style="text-align: center; display: block; margin-left: auto; margin-right: auto;"> 
                            <select class="form-control select-dark" id="const_1" onchange="type_q(this.id);" name="q_type[]"> 
                                <option disabled  class="option-dark" value="Тип питання:">Тип питання:</option> 
                                <option selected class="option-dark" value="Вибір з множини">Вибір з множини</option> 
                                <option class="option-dark" value="Відкрита відповідь">Відкрита відповідь</option> 
                                <option class="option-dark" value="Вибір відповідності">Вибір відповідності</option> 
                                <option class="option-dark" value="Есе (відповідь з поясненнями)">Есе (відповідь з поясненнями)</option>
                            </select> 
                            </div> 
                        </div> 
                        <div class="file-input"> 
                            <div class="form-group"> 
                                <label class="label"> 
                                    <i class="material-icons" id="photo0">attach_file</i> 
                                    <span class="title">Прикріпити додаткове фото</span> 
                                    <input type="file" id="photo_of_the_question0" name="photo_of_the_question[]" onChange="photo_quest(this.id);" accept=".jpg, .jpeg, .png"> 
                                </label> 
                            </div> 
                        </div> 
                        <div class="row" style="padding-bottom: 20px;"> 
                            <div class="col-12"> 
                                <i class="material-icons iconjust" id="1" onclick="clone(this.id);"> post_add </i> 
                            </div>
                                </div> 
                            </div> 
                        </div> 
                    </div>
                    <button class="bn54" type="submit">
                        <span class="bn54span">Надіслати</span>
                      </button>
                      <div class="stop">
                            
                    </div>
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
</body>
<!-- Footer section end -->
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
    <script src="js/check.js"></script>
    <script src="js/script_form.js"></script>
    <script src="js/range.js"></script>
    <script>
    var request = new XMLHttpRequest();
    function post_add()
    {
    var block_question = document.getElementById("question_1_part");
      request.open("POST", "test_get.php", true);
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
      request.send();
      request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) 
            { 
              var result = Array.from(JSON.parse(request.responseText));
              var questions = results[0];
              var answers = results[1];
              for (var i=0; i<questions.length; i++)
              {
                $("question_part").appendTo("#form_send");
              }
	        }; 
        }
    }
    </script>

</html>