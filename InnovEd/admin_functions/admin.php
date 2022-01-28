<?php
include "connect.php";
class Analize extends Connect
{
    public function get_user()
    {
        $connect = parent::connection_db();
        $pupils = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `status` = 'p'"));
        $teachers = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE `status` = 't'"));
        $users = array($pupils,$teachers);
        return $users;
    }
    public function get_visit()
    {
        $connect = parent::connection_db();
        $visits = mysqli_query($connect, "SELECT `date`, `hosts`, `views` FROM `visits`");
        return $visits;
    }
}
$user = new Analize();
$array_user = $user->get_user();
$array_visit = $user->get_visit();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicon -->
    <link href="../img/pres.png" rel="shortcut icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/admin.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Admin Panel</title>
</head>
<body>
<div id="gray"></div>
<div class="container">
  <div class="modal-window" id="modal-window">

  </div>
  <div class="burger-menu">
    <!-- <div class="roll-up-menu">
			<div class="menu icon up"></div>
			<div class="menu icon center"></div>
			<div class="menu icon down"></div>
		</div> -->
    <ul>
      <li onclick="analize();">Аналіз активності сайту <span class="material-icons">donut_large</span></li>
      <li onclick="post_add();">Створення та редагування постів <span class="material-icons">feed</span></li>
      <!-- <li>Курси та лекції <span class="material-icons">local_library</span></li> -->
      <li onclick="get_contact_form();">Форма зворотного зв'язку <span class="material-icons">question_answer</span></li>
      <li onclick="get_user();">Користувачі платформи <span class="material-icons">people</span></li>
    </ul>
  </div>
  <div class="workplace">
    <div class="information-block" id="information_for_admin">

    </div>
  </div>  
</div>

</body>
<input type="file" name="" id="upload_gg">
</html>
<script>
  var request = new XMLHttpRequest();
  var posts;
    function post_add()
    {
      request.open("POST", "news.php", true);
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
      request.send();
      request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) 
        { 
          posts = Array.from(JSON.parse(request.responseText));
          document.getElementById("information_for_admin").innerHTML = "<select id='select_post' onchange='choose_post();' class='form-control'></select>";
          let option = document.createElement("option");
          option.value = "";
          option.text = "Створити тест";
          document.getElementById("select_post").append(option);
          for (var i=0; i<posts.length; i++)
          {
              let option = document.createElement("option");
              option.value = i;
              option.text = posts[i]['title'];
              document.getElementById("select_post").append(option);
          }
          document.getElementById("information_for_admin").innerHTML += "<div class='title'><input type='text' placeholder='Назва поста' id='post_title'></div><div class='author'><input type='text' placeholder='Автор' id='post_author'></div><div class='type'><input type='text' placeholder='Тема' id='post_theme'></div>";
          document.getElementById("information_for_admin").innerHTML += '<div class="instrument" id="instrument"> <img src="../img/font_text/bold.png" alt="" onclick="addTag(this.id);" id="b"> <img src="../img/font_text/italic.png" alt="" onclick="addTag(this.id);" id="i"> <img src="../img/font_text/strike.png" alt="" onclick="addTag(this.id);" id="strike"> <img src="../img/font_text/underline.png" alt="" onclick="addTag(this.id);" id="u"> <img src="../img/font_text/link.png" alt="" onclick="addTag(this.id);" id="a"> <img src="../img/font_text/paragraph.png" alt="" onclick="addTag(this.id);" id="p"> </div>';
          document.getElementById("information_for_admin").innerHTML += "<div class='add_post'><textarea id='control' rows='5'></textarea><label class='custom-file-upload' for='file-upload'><span class='material-icons' id='upload_status'>cloud_upload</span> Custom Upload</label><input id='file-upload' type='file'></div>";
          document.getElementById("information_for_admin").innerHTML += "<button class='save_post' onclick='send_post();'>Зберегти</button>";
	      }
	    }; 
    }
    function choose_post()
    {
      if ($("#select_post").val()!="")
      {
        var id_post = parseInt($("#select_post").val());
        $("#post_title").val(posts[id_post]['title']);
        $("#post_author").val(posts[id_post]['author']);
        $("#post_theme").val(posts[id_post]['type']);
        $("#control").val(posts[id_post]['article']);
      }
      else
      {
        $("#post_title").val("");
        $("#post_author").val("");
        $("#post_theme").val("");
        $("#control").val("");
        $("#photo_name").val("");
      }
    }
    function send_post()
    {
      var formData = new FormData();  
      var id_news = $("#select_post").val();
      formData.append("id_post", posts[id_news]['id_post']);
      formData.append("title", $("#post_title").val());
      formData.append("author", $("#post_author").val());
      formData.append("theme", $("#post_theme").val());
      formData.append("text", $("#control").val());
      formData.append("photo", document.getElementById('file-upload').files[0]);
      request.open("POST", "news.php", true);
      request.send(formData);
    }
    function get_user()
    {
        request.open("POST", "user.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        request.send();
        request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) 
        {
          document.getElementById("information_for_admin").innerHTML = "";
          var users = Array.from(JSON.  parse(request.responseText));
          document.getElementById("information_for_admin").innerHTML += "<div class='wrapper'><div class='table' id='user_table'><div class='row header'><div class='cell'>Призвіще</div><div class='cell'>Ім&#8217я</div><div class='cell'>По-батькові</div><div class='cell'>Дата народження</div><div class='cell'>Статус</div><div class='cell'>Клас</div><div class='cell'>Почтова адреса</div></div>";
          for(var i=0; i<users.length; i++)
          {
            document.getElementById("user_table").innerHTML += "<div class='row' id='user_row_"+users[i]['id']+"' onclick='show_redact_panel(this.id);'><div class='cell' data-title='Призвіще'>"+users[i]['surname']+"</div><div class='cell' data-title='Ім&#8217я'>"+users[i]['name']+"</div><div class='cell' data-title='По-батькові'>"+users[i]['patronymic']+"</div><div class='cell' data-title='Дата народження'>"+users[i]['birth_date']+"</div><div class='cell' data-title='Статус'>"+users[i]['status']+"</div><div class='cell' data-title='Клас'>"+users[i]['form']+"</div><div class='cell' data-title='Почтова адреса'>"+users[i]['email']+"</div></div><div class='panel' id='user_row_"+users[i]['id']+"_panel'><ul><li id="+users[i]['id']+" onclick='delete_data(this.id);'>Видалити користувача  <span class='material-icons'>delete</span></li><li id="+users[i]['id']+" onclick='get_row(this.id);'>Редагувати дані користувача  <span class='material-icons'>mode_edit_outline</span></li></ul></div>";
          }
          document.getElementById("information_for_admin").innerHTML += "</div></div>";
	      }
	      }; 
    }
    function get_contact_form()
    {
        request.open("POST", "contact.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        request.send();
        request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) 
        {
          document.getElementById("information_for_admin").innerHTML = "";
          var contacts = Array.from(JSON.parse(request.responseText));
          document.getElementById("information_for_admin").innerHTML += "<div class='wrapper'><div class='table' id='user_table'><div class='row header'><div class='cell'>Почтова адреса</div><div class='cell'>Призвіще та ім'я</div><div class='cell'>Тема</div><div class='cell'>Повідомлення</div></div>";
          for(var i=0; i<contacts.length; i++)
          {
            document.getElementById("user_table").innerHTML += "<div class='row'><div class='cell' data-title='Почтова адреса'>"+contacts[i]['email']+"</div><div class='cell' data-title='Призвіще та ім'я>"+contacts[i]['name']+"</div><div class='cell' data-title='Тема'>"+contacts[i]['theme']+"</div><div class='cell' data-title='Повідомлення'>"+contacts[i]['message']+"</div></div>";
          }
          document.getElementById("information_for_admin").innerHTML += "</div></div>";
	      }
	      }; 
    }
    function show_redact_panel(panel_id)
    {
      if($("#"+panel_id+"_panel").hasClass('.panel active')) {
            $("#"+panel_id+"_panel").removeClass(".panel active");
        }
        else {
            $("#"+panel_id+"_panel").addClass(".panel active");
        }
    }
    function delete_data(delete_id)
    {
      request.open("POST", "user.php", true);
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
      request.send("id_delete="+delete_id);
      $("#user_row_"+delete_id).remove();
      $("#user_row_"+delete_id+"_panel").remove();
    }
    function get_row(edit_id)
    {
      request.open("POST", "user.php", true);
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
      request.send("id_get="+edit_id);
      request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) 
        {
        user_row = JSON.parse(request.responseText);
        $("#gray").css("display", "block");
        $(".modal-window").css("display", "block");
        document.getElementById("modal-window").innerHTML = "";
        document.getElementById("modal-window").innerHTML += "<div class='wrapper'><div class='table' id='user_table'><div class='row header'><div class='cell'>Призвіще</div><div class='cell'>Ім&#8217я</div><div class='cell'>По-батькові</div><div class='cell'>Дата народження</div><div class='cell'>Статус</div><div class='cell'>Клас</div><div class='cell'>Почтова адреса</div></div><div class='row'><div class='cell' data-title='Призвіще'><input value='"+user_row['surname']+"' type='text' id='surname'></div><div class='cell' data-title='Ім&#8217я'><input value="+user_row['name']+" type='text' id='name'></div><div class='cell' data-title='По-батькові'><input value="+user_row['patronymic']+" type='text' id='patronymic'></div><div class='cell' data-title='Дата народження'><input value="+user_row['birth_date']+" type='date' id='birth_date'></div><div class='cell' data-title='Статус'><input value="+user_row['status']+" type='text' id='status'></div><div class='cell' data-title='Клас'><input value="+user_row['form']+" type='text' id='form'></div><div class='cell' data-title='Почтова адреса'><input value="+user_row['email']+" type='text' id='email'></div></div></div></div>";
        document.getElementById("modal-window").innerHTML += "<div class='button-down'><button>Зачинити</button><button id='"+edit_id+"' onclick='update_data(this.id);'>Зберегти</button></div>";
        }
      };
    }
    function update_data(update_id)
    {
      request.open("POST", "user.php", true);
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.send("id_set="+update_id+"&surname="+$("#surname").val()+"&name="+$("#name").val()+"&patronymic="+$("#patronymic").val()+"&birth_date="+$("#birth_date").val()+"&status="+$("#status").val()+"&form="+$("#form").val()+"&email="+$("#email").val());
      $("#gray").css("display", "none");
      $(".modal-window").css("display", "none");
    }
    $("#gray").click (function ()
	  {
      $("#gray").css("display", "none");
      $(".modal-window").css("display", "none");
	  });

    function addTag(tag) {
      tag0 = tag;
      if(tag == "a")
      {
        extra = prompt('Введите адрес', '');
        tag = tag + " href="+extra;
      }
	    var control = $('#control')[0];
  	  var start = control.selectionStart;
      var end = control.selectionEnd;
	    if (start != end) {
		    var text = $(control).val();
		    $(control).val(text.substring(0, start) + ("<"+tag+">") + text.substring(start, end) + ("</"+tag0+">")  + text.substring(end));
	    	$(control).focus();
	    	var sel = end + (("<"+tag+">")  + ("</"+tag0+">")).length;
		    control.setSelectionRange(sel, sel);
	    }
}
function analize() {
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawPie); 
  document.getElementById("information_for_admin").innerHTML = "";
  document.getElementById("information_for_admin").innerHTML += '<div id="donutchart" class="user_count"></div>';
  // document.getElementById("information_for_admin").innerHTML += '<div id="curve_chart" class="curve_chart"></div>';
}

function drawPie() {
  var data = google.visualization.arrayToDataTable([
    ['Користувач', 'Кількість'],
    ['Вчителі', <?echo $array_user[1];?>],
    ['Учні', <?echo $array_user[0];?>]
  ]);

  var options = {
    width: 400,
    height: 240,
    'backgroundColor': 'transparent',
    pieHole: 0.4
  };

  var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
  chart.draw(data, options);
}

// При клике на кнопки не снимаем фокус с textarea.
$('a').on('mousedown', function() {
	return false;
});
</script>
