<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>InnovEd</title>
	<meta charset="UTF-8">
	<meta name="description" content="Innoved_online_school">
	<meta name="keywords" content="innovation, school">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	
	<!-- Favicon -->
	<link href="img/pres.png" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>

	
	<link rel="stylesheet" href="css/tick.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

	<!-- Main Stylesheets -->

    <link rel="stylesheet" href="css/style_test.css"/>
	<link rel="stylesheet" href="css/style.css" />

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<?
include "connection.php";
$tf = $_GET['test_id'];
$_SESSION['test_id'] = $tf;
mysqli_select_db($connect, "Online_school");
$get_test ="SELECT * FROM `test` WHERE `id_test` = '$tf'";
$result_test = mysqli_query($connect, $get_test);
$get_question ="SELECT * FROM `question` WHERE `parent_test` = '$tf'";
$result_question = mysqli_query($connect, $get_question);
$rows_question = mysqli_num_rows($result_question);
$test=mysqli_fetch_assoc($result_test);
?>
<style>
	<?if($test['background'] == "one"):?>
	body
	{
		background-color: #f5f0e1;
	}
	.block_instruction
	{
		background-color: #1e3d59;
		color: #f5f0e1;
	}
	.block_instruction label
	{
		background-color: #ff6e40;
		color: #f5f0e1;
	}
	.title_test
	{
		color: #f5f0e1;
	}
	.answer-st, .checkbox-part, .open-answer-area, .essay-area
	{
		background-color: #ff6e40;
		color: #f5f0e1;
	}
	.open-answer-area h3, .essay-area h3
	{
		color: #f5f0e1;
	}
	.question-part
	{
		background-color: #1e3d59;
	}
	.question-part p
	{
		color: #f5f0e1;
	}
	carousel page label, .submit_user
	{
		background-color: #1e3d59;
	}
	carousel page label b, .submit_user b
	{
		color: #f5f0e1;
	}
	<?elseif ($test['background'] == "two"):?>
	body
	{
		background-color: #aed6dc;
	}
	.block_instruction
	{
		background-color: #4a536b;
		color: white;
	}
	.block_instruction label
	{
		background-color: #ff9a8d;
		color: white;
	}
	.title_test
	{
		color: white;
	}
	.answer-st, .checkbox-part, .open-answer-area, .essay-area
	{
		background-color: #ff9a8d;
		color: white;
	}
	.open-answer-area h3, .essay-area h3
	{
		color: white;
	}
	.question-part
	{
		background-color: #4a536b;
	}
	.question-part p
	{
		color: white;
	}
	carousel page label, .submit_user
	{
		background-color: #4a536b;
	}
	carousel page label b, .submit_user b
	{
		color: white;
	}
	<?elseif ($test['background'] == "three"):?>
	body
	{
		background-color: #e1dd72;
	}
	.block_instruction
	{
		background-color: #a8c66c;
		color: white;
	}
	.block_instruction label
	{
		background-color: #1b6535;
		color: white;
	}
	.title_test
	{
		color: white;
	}
	.answer-st, .checkbox-part, .open-answer-area, .essay-area
	{
		background-color: #a8c66c;
		color: white;
	}
	.open-answer-area h3, .essay-area h3
	{
		color: white;
	}
	.question-part
	{
		background-color: #1b6535;
	}
	.question-part p
	{
		color: white;
	}
	carousel page label, .submit_user
	{
		background-color: #1b6535;
	}
	carousel page label b, .submit_user b
	{
		color: white;
	}
	<?else:?>
	body
	{
		background-color: #e7e7d1;
	}
	.block_instruction
	{
		background-color: #b85042;
		color: white;
	}
	.block_instruction label
	{
		background-color: #a7beae;
		color: white;
	}
	.title_test
	{
		color: white;
	}
	.answer-st, .checkbox-part, .open-answer-area, .essay-area
	{
		background-color: #a7beae;
		color: white;
	}
	.open-answer-area h3, .essay-area h3
	{
		color: white;
	}
	.question-part
	{
		background-color: #b85042;
	}
	.question-part p
	{
		color: white;
	}
	carousel page label, .submit_user
	{
		background-color: #b85042;
	}
	carousel page label b, .submit_user b
	{
		color: white;
	}
	<?endif;?>
	<?for($i=1;$i<=$rows_question+1;++$i):?>
		carousel #page<?echo $i;?>cb:checked ~ #page<?echo $i;?> {
	 		transform: scale(1);
		}
	<?endfor;?>
</style>
	<!-- Header section end -->
<carousel>
<input id="timer_start" value="<?echo $test['timer']?>" hidden>
<div class="timer-block">
	<p id="timer"></p>
</div>
<form action="check.php" method="post" id="test_form">
<input type="radio" id="page1cb" checked name="pages" hidden checked/>
<?for($i=2;$i<=$rows_question+1;++$i):?>
	<input type="radio" id="page<?echo $i?>cb" name="pages" hidden/>
<?endfor;?>
	<page id="page1">
    <div class="block_instruction container">
        <h2 class="title_test">Назва тесту: <?echo $test['name_test']?></h2>
		<h4 class="title_test">Інструкція: <?echo $test['instruction']?></h3>
		<label for="page2cb" title="Наступне"><b>Розпочати</b></label>
    </div>
	</page>
  <?for($i=1;$i<=$rows_question;++$i):?>
  <page id="page<?echo $i+1;?>">	
    <div class="question-part container">
		<?$question=mysqli_fetch_assoc($result_question);
		$idq=$question['id_question'];
		$get_answer ="SELECT * FROM `answer` WHERE `parent_question` = '$idq'";
		$result_answer = mysqli_query($connect, $get_answer);
		$get_prompt ="SELECT * FROM `answer` WHERE `parent_question` = '$idq'";
		$result_prompt = mysqli_query($connect, $get_prompt);
		$rows_answer = mysqli_num_rows($result_answer);
		$result_true_answers = mysqli_query($connect, $get_prompt);
		$true_count=0;
		for($j=0; $j<$rows_answer; ++$j)
			{
				$position=mysqli_fetch_assoc($result_true_answers);
				if($position['checkbox']=="true")
				{
					$true_count++;
				}
			}			
		?>
		<?if ($question['photo']!='')
		{
			echo '<img src="img/files_of_test/'.$question['photo'].'" alt="">';
		}
		?>
		<p><?echo $question['question'];?></p>
	</div>
	<?if($question['type_of']=="Вибір з множини"):?>
		<div class="row post-item-ac container">
			<?
			for($j=0; $j<$rows_answer; ++$j)
			{
				$answer=mysqli_fetch_assoc($result_answer);
				if($answer['photo']!="")
				{
					if($true_count==1)
					{
						echo '<div class="col-lg-3 col-md-6 col-sm-12 mar-ans"><div class="checkbox-part post-item-b"><input name="ch'.$i.'[]" type="radio" hidden value="'.$answer['answer'].'" form="test_form"><img src="img/files_of_test/'.$answer['photo'].'" alt="">'.$answer['answer'].'</div></div>';
					}
					else
					{
						echo '<div class="col-lg-3 col-md-6 col-sm-12 mar-ans"><div class="checkbox-part post-item-a"><input name="ch'.$i.'[]" type="checkbox" hidden value="'.$answer['answer'].'" form="test_form"><img src="img/files_of_test/'.$answer['photo'].'" alt="">'.$answer['answer'].'</div></div>';
					}
				}
				else
				{
					if($true_count==1)
					{
						echo '<div class="col-lg-3 col-md-6 col-sm-12 mar-ans"><div class="checkbox-part post-item-b"><input name="ch'.$i.'[]" type="radio" hidden value="'.$answer['answer'].'" form="test_form">'.$answer['answer'].'</div></div>';
					}
					else
					{
						echo '<div class="col-lg-3 col-md-6 col-sm-12 mar-ans"><div class="checkbox-part post-item-a"><input name="ch'.$i.'[]" type="checkbox" hidden value="'.$answer['answer'].'" form="test_form">'.$answer['answer'].'</div></div>';
					}
				}
			}
			?>	
		</div>
	<?elseif($question['type_of']=="Есе (відповідь з поясненнями)"):
		$answer=mysqli_fetch_assoc($result_answer);?>
			<div class="essay-area container">
				<h3>Місце для есе:</h3>
				<div class="instrument" id="instrument"> 
					<img src="./img/font_text/bold.png" alt="" onclick="addTag(this.id);" id="b"> 
					<img src="./img/font_text/italic.png" alt="" onclick="addTag(this.id);" id="i"> 
					<img src="./img/font_text/strike.png" alt="" onclick="addTag(this.id);" id="strike"> 
					<img src="./img/font_text/underline.png" alt="" onclick="addTag(this.id);" id="u"> 
					<img src="./img/font_text/link.png" alt="" onclick="addTag(this.id);" id="a"> 
					<img src="./img/font_text/paragraph.png" alt="" onclick="addTag(this.id);" id="p"> 
				</div>
				<textarea type="text" placeholder="<?echo $answer['answer'];?>" name="ch<?echo $i?>[]" form="test_form" id="textplace" required class="essay-place"></textarea>
			</div>
	<?elseif($question['type_of']=="Відкрита відповідь"):?>
			<div class="open-answer-area container">
				<h3>Введіть відповідь:</h3>
				<input type="text" class="input-area" name="ch<?echo $i?>[]" form="test_form">
			</div>
	<?elseif($question['type_of']=="Вибір відповідності"):?>
		<div class="row container">
				<div class="col-md-6">
					<?
					$array= array();
					for ($a=0;$a<$rows_answer; ++$a) 
					{
						$row_aspr = mysqli_fetch_row($result_answer);
						$array[]=$row_aspr[1];
					}
					shuffle($array);
					for($j=0; $j<$rows_answer; ++$j)
					{
						$prompt=mysqli_fetch_assoc($result_prompt);
						echo '<div class="answer-st">'.$prompt['prompt'].'</div>';
					}
					?>
				</div>
				<div class="col-md-6 tasks__list">
				<?
					for($j=0; $j<$rows_answer; ++$j)
						{
						echo '<div class="answer-st tasks__item">'.$array[$j].'<input type="text" name="ch'.$i.'[]" value="'.$array[$j].'" hidden></div>';
					}
					?>
				</div>
		</div>
	<?endif;?>
	<div class="row container">
	<?if(($i==0)&&($rows_question!=1)):?>
		<label for="page<?echo $i+1;?>cb" title="Наступне"><b>Наступне</b></label>
	<?elseif($rows_question==1):?>
		<button title="Закінчити" type="submit"><b>Закінчити</b></button>
	<?elseif($i==$rows_question):?>
		<div class="col-md-6 col-sm-12"><label for="page<?echo $i;?>cb" title="Минуле"><b>Минуле</b></label></div>
		<div class="col-md-6 col-sm-12"><button class="submit_user" title="Закінчити" type="submit"><b>Закінчити</b></button></div>
	<?else:?>
		<div class="col-md-6 col-sm-12"><label for="page<?echo $i;?>cb" title="Минуле"><b>Минуле</b></label></div>
		<div class="col-md-6 col-sm-12"><label for="page<?echo $i+2;?>cb" title="Наступне"><b>Наступне</b></label></div>
	<?endif;?>
	</div>
	</page>
	<?endfor;?>
	</form>
	</carousel>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="/js/main.js"></script>
<script src="/js/replace.js"></script>
<script>
var count = $("#timer_start").val();
var time_t=0;
var timeout1;
function timer_countdown() {
	document.getElementById("timer").innerHTML = '<p>Час: '+(count-time_t)+' хвилини</p>';
	time_t=time_t+1;
	timeout1 = setTimeout(timer_countdown, 60000);
	if(count-time_t==1)
	{
		time_t=0;
		clearTimeout(timeout1);
		timer_count_sec();
	}
}
function timer_count_sec() {
	document.getElementById("timer").innerHTML = '<p>Час: '+(60-time_t)+' секунди</p>';
	time_t=time_t+1;
	setTimeout(timer_count_sec, 1000);
	if(60-time_t==0)
	{
		$("#test_form").submit();
	}
}
setTimeout(timer_countdown, 1000);

$('.post-item-a').click(function() {
	if($(this).find('input').prop('checked')!=true)
	{
		$(this).find('input').prop('checked', true);
		$(this).addClass("selected_highlight");
	}
	else
	{
		$(this).find('input').prop('checked', false) ;
		$(this).removeClass("selected_highlight");
	}
});
$('.post-item-b').click(function() {
	$(this).find('input').prop('checked', true);
	if($(this).find('input').prop('checked')==true)
	{
		$('.post-item-b').each(function() {
  			$( this ).removeClass("selected_highlight");
		});
		$(this).addClass("selected_highlight");
	}
});
function addTag(tag) {
      tag0 = tag;
      if(tag == "a")
      {
        extra = prompt('Введите адрес', '');
        tag = tag + " href="+extra;
      }
	    var control = $('#textplace')[0];
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
</script>
</body>
</html>
