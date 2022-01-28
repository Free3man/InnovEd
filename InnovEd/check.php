<?
session_start();
ob_start();
?>
<html>
<head>
<title>Для тестів</title>
	<title>InnovEd</title>
	<meta charset="UTF-8">
	<meta name="description" content="Innoved_online_school">
	<meta name="keywords" content="innovation, school">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Favicon -->
	<link href="../img/pres.png" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="../css/test.css" type="text/css">
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="../css/flaticon.css"/>
	<link rel="stylesheet" href="../css/slicknav.min.css"/>
	<link rel="stylesheet" href="../css/style_form.css" type="text/css">
	<link rel="stylesheet" href="../css/style_test.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="../css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<div class="container">
<h2 class="test_check" align="center">Результати тесту</h2>
<?
include "connection.php";
mysqli_select_db($connect, "Online_school");
//question_connect
$tf=$_SESSION['test_id'];
$email=$_SESSION['user']['email'];
$all_true_score=0;
	//question_connect
	$get_question ="SELECT * FROM `question` WHERE `parent_test` = '$tf'";
	$result_question = mysqli_query($connect, $get_question);
	$result_question_circle = mysqli_query($connect, $get_question);
	$rows_question = mysqli_num_rows($result_question_circle);
	//end question_connect
		for($i=0; $i<$rows_question; $i++):
			//question
			$question=mysqli_fetch_assoc($result_question);
			$idq=$question['id_question'];
			// all answers
			$get_answer ="SELECT * FROM `answer` WHERE `parent_question` = '$idq'";
			$result_answer = mysqli_query($connect, $get_answer);
			$rows_answer = mysqli_num_rows($result_answer);
			$k=0;
			// true score
			$num_true ="SELECT * FROM `answer` WHERE `parent_question` = '$idq' AND `checkbox` = 'true'";	
			$result_num_true = mysqli_query($connect, $num_true);
			$rows_num_true = mysqli_num_rows($result_num_true );
			if($question['type_of']=="Вибір відповідності")
			{
				$all_true_score+=$rows_answer;
			}
			else
			{
				$all_true_score+=$rows_num_true;
			}
			$check_miss=0;
					while ($k<$rows_answer):
					$answer=mysqli_fetch_assoc($result_answer);
					$prop_true=0;
					$prop_false=0;
					$nb=0;
					// true answers
					$get_true ="SELECT * FROM `answer` WHERE `parent_question` = '$idq' AND `checkbox` = 'true'";	
					$result_true = mysqli_query($connect, $get_true);
					$rows_true = mysqli_num_rows($result_true);
					if($question['type_of']=="Вибір відповідності")
					{
						if($_POST['ch'.($i+1).''][$k]==$answer['answer']):
							$correct++;
						elseif($_POST['ch'.($i+1).''][$k]!=$answer['answer']):
							$incorrect++;
						endif;
					}
					elseif($question['type_of']=="Відкрита відповідь")
					{?>		
					<?if($_POST['ch'.($i+1).''][0]==$answer['answer']):
						$correct++;
					?>
					<?elseif($_POST['ch'.($i+1).''][0]!=$answer['answer']):
						$incorrect++;
					?>							
					<?endif;?>				
					<?}
					else
					{
					while ($true_check_ok = mysqli_fetch_assoc($result_true)) {					
						if($_POST['ch'.($i+1).''][$nb]==$answer['answer'])
						{
							if(($_POST['ch'.($i+1).''][$nb]==$true_check_ok['answer']))
							{
							$prop_true++;
							}
							if(($_POST['ch'.($i+1).''][$nb]!=$true_check_ok['answer']))
							{
							$prop_false++;
							}
							
						}
						$nb++;
					}

							if($prop_true>$prop_false):
								$correct++;
							elseif($prop_true<$prop_false):
								$incorrect++;
							endif;
					}
					$k++;
					endwhile;
	endfor;
	$per_true=round($correct/$all_true_score,2)*100;
	$per_false=round($incorrect/$all_true_score,2)*100;
	$per_miss=round(($all_true_score-$correct-$incorrect)/$all_true_score,2)*100;
	?>
	<div class="flex-wrapper">  
  <div class="single-chart">
    <svg viewBox="0 0 36 36" class="circular-chart green">
      <path class="circle-bg"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      <path class="circle"
        stroke-dasharray="<?echo $per_true;?>, 100"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      <text x="18" y="20.35" class="percentage"><?echo $per_true;?>%</text>
    </svg>
	<h4 align="center">Правильні відповіді</h4>
  </div>
  <div class="single-chart">
    <svg viewBox="0 0 36 36" class="circular-chart red">
      <path class="circle-bg"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      <path class="circle"
        stroke-dasharray="<?echo $per_false;?>, 100"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      <text x="18" y="20.35" class="percentage"><?echo $per_false;?>%</text>
    </svg>
	<h4 align="center">Неправильні відповіді</h4>
  </div>
  <div class="single-chart">
    <svg viewBox="0 0 36 36" class="circular-chart gray">
      <path class="circle-bg"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      <path class="circle"
        stroke-dasharray="<?echo $per_miss;?>, 100"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      <text x="18" y="20.35" class="percentage"><?echo $per_miss;?>%</text>
    </svg>
	<h4 align="center">Пропущені відповіді</h4>
  </div>
</div>
	<?
	//question_connect
$get_question ="SELECT * FROM `question` WHERE `parent_test` = '$tf'";
$result_question = mysqli_query($connect, $get_question);
$result_question_circle = mysqli_query($connect, $get_question);
$rows_question = mysqli_num_rows($result_question_circle);
//end question_connect
	for($i=0; $i<$rows_question; $i++):
		//question
		$question=mysqli_fetch_assoc($result_question);
		$idq=$question['id_question'];
		// all answers
		$get_answer ="SELECT * FROM `answer` WHERE `parent_question` = '$idq'";
		$result_answer = mysqli_query($connect, $get_answer);
		$rows_answer = mysqli_num_rows($result_answer);
		$k=0;
	?>
	<div class="block-check">
		<div class="answer-test">
			<div class="question-check">
				<h3><?echo ($i+1).") ".$question['question'];?></n3>
			</div>
			<ul class="answer-check">
				<?
				$check_miss=0;
				while ($k<$rows_answer):
				$answer=mysqli_fetch_assoc($result_answer);
				// true answers
				$get_true ="SELECT * FROM `answer` WHERE `parent_question` = '$idq' AND `checkbox` = 'true'";	
				$result_true = mysqli_query($connect, $get_true);
				$result_true_end = mysqli_query($connect, $get_true);
				$rows_true = mysqli_num_rows($result_true);
				$prop_true=0;
				$prop_false=0;
				$nb=0;
				if($question['type_of']=="Вибір відповідності")
				{?>
					<li>
					<?if($_POST['ch'.($i+1).''][$k]==$answer['answer']):?>
						<svg enable-background="new 0 0 512.063 512.063" height="30px" viewBox="0 0 512.063 512.063" width="30px" xmlns="http://www.w3.org/2000/svg"><g><g><ellipse cx="256.032" cy="256.032" fill="#00df76" rx="255.949" ry="256.032"/></g><path d="m256.032 0c-.116 0-.231.004-.347.004v512.055c.116 0 .231.004.347.004 141.357 0 255.949-114.629 255.949-256.032s-114.592-256.031-255.949-256.031z" fill="#00ab5e"/><path d="m111.326 261.118 103.524 103.524c4.515 4.515 11.836 4.515 16.351 0l169.957-169.957c4.515-4.515 4.515-11.836 0-16.351l-30.935-30.935c-4.515-4.515-11.836-4.515-16.351 0l-123.617 123.615c-4.515 4.515-11.836 4.515-16.351 0l-55.397-55.397c-4.426-4.426-11.571-4.526-16.119-.226l-30.83 29.149c-4.732 4.475-4.837 11.973-.232 16.578z" fill="#fff5f5"/><path d="m370.223 147.398c-4.515-4.515-11.836-4.515-16.351 0l-98.187 98.187v94.573l145.473-145.473c4.515-4.515 4.515-11.836 0-16.352z" fill="#dfebf1"/></g></svg><p><?echo $answer['prompt'];?><svg xmlns="http://www.w3.org/2000/svg" width="30px" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="258.0001" x2="512.0002" y2="258.0001" gradientTransform="matrix(1 0 0 -1 0 514.0002)"><stop offset="0" style="stop-color:#80D8FF"/><stop offset="0.16" style="stop-color:#88D1FF"/><stop offset="0.413" style="stop-color:#9FBEFE"/><stop offset="0.725" style="stop-color:#C4A0FD"/><stop offset="1" style="stop-color:#EA80FC"/></linearGradient><path style="fill:url(#SVGID_1_);" d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104 c-7.829-7.791-20.492-7.762-28.285,0.068c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20 s8.954,20,20,20h423.557l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104 c0.006-0.006,0.011-0.013,0.018-0.019C513.968,262.339,513.943,249.635,506.134,241.843z"/></svg><?echo $_POST['ch'.($i+1).''][$k];?></p>
					<?elseif($_POST['ch'.($i+1).''][$k]!=$answer['answer']):?>
						<svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 55 55" width="30px" data-name="Layer 1"><circle cx="27.5" cy="27.5" fill="#e95652" r="24"/><g opacity=".4"><path d="m46.66 13.05a24 24 0 0 0 -33.66 33.57 24 24 0 1 1 33.66-33.57z" fill="#cf3b36"/></g><g fill="#556065"><path d="m17.94 37.81a.73.73 0 0 1 -.53-.22.75.75 0 0 1 0-1.06l19.12-19.12a.75.75 0 1 1 1.06 1.06l-19.12 19.12a.74.74 0 0 1 -.53.22z"/><path d="m37.06 37.81a.74.74 0 0 1 -.53-.22l-19.12-19.12a.75.75 0 1 1 1.06-1.06l19.12 19.12a.75.75 0 0 1 0 1.06.73.73 0 0 1 -.53.22z"/><path d="m27.5 52.25a24.75 24.75 0 1 1 24.75-24.75 24.77 24.77 0 0 1 -24.75 24.75zm0-48a23.25 23.25 0 1 0 23.25 23.25 23.28 23.28 0 0 0 -23.25-23.25z"/></g></svg><p><?echo $answer['prompt'];?><svg xmlns="http://www.w3.org/2000/svg" width="30px" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="258.0001" x2="512.0002" y2="258.0001" gradientTransform="matrix(1 0 0 -1 0 514.0002)"><stop offset="0" style="stop-color:#80D8FF"/><stop offset="0.16" style="stop-color:#88D1FF"/><stop offset="0.413" style="stop-color:#9FBEFE"/><stop offset="0.725" style="stop-color:#C4A0FD"/><stop offset="1" style="stop-color:#EA80FC"/></linearGradient><path style="fill:url(#SVGID_1_);" d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104 c-7.829-7.791-20.492-7.762-28.285,0.068c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20 s8.954,20,20,20h423.557l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104 c0.006-0.006,0.011-0.013,0.018-0.019C513.968,262.339,513.943,249.635,506.134,241.843z"/></svg><?echo $_POST['ch'.($i+1).''][$k]."<div class='correct_answer'>(Правильний варіант відповіді: ".$answer['answer'].");</div>";?></p>
					<?endif;?>
					</li>
				<?}
				elseif($question['type_of']=="Відкрита відповідь")
				{?>		
				<li>
					<?if($_POST['ch'.($i+1).''][0]==$answer['answer']):?>
					<svg enable-background="new 0 0 512.063 512.063" height="30px" viewBox="0 0 512.063 512.063" width="30px" xmlns="http://www.w3.org/2000/svg"><g><g><ellipse cx="256.032" cy="256.032" fill="#00df76" rx="255.949" ry="256.032"/></g><path d="m256.032 0c-.116 0-.231.004-.347.004v512.055c.116 0 .231.004.347.004 141.357 0 255.949-114.629 255.949-256.032s-114.592-256.031-255.949-256.031z" fill="#00ab5e"/><path d="m111.326 261.118 103.524 103.524c4.515 4.515 11.836 4.515 16.351 0l169.957-169.957c4.515-4.515 4.515-11.836 0-16.351l-30.935-30.935c-4.515-4.515-11.836-4.515-16.351 0l-123.617 123.615c-4.515 4.515-11.836 4.515-16.351 0l-55.397-55.397c-4.426-4.426-11.571-4.526-16.119-.226l-30.83 29.149c-4.732 4.475-4.837 11.973-.232 16.578z" fill="#fff5f5"/><path d="m370.223 147.398c-4.515-4.515-11.836-4.515-16.351 0l-98.187 98.187v94.573l145.473-145.473c4.515-4.515 4.515-11.836 0-16.352z" fill="#dfebf1"/></g></svg>
					<?elseif($_POST['ch'.($i+1).''][0]==""):?>
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 502 502" style="enable-background:new 0 0 502 502;" xml:space="preserve" width="30px" height="30px"><g><g><circle style="fill:#CCCCCC;" cx="251" cy="251" r="241"/><path d="M251,502c-67.044,0-130.076-26.108-177.484-73.516S0,318.044,0,251S26.108,120.924,73.516,73.516S183.956,0,251,0    s130.076,26.108,177.484,73.516S502,183.956,502,251s-26.108,130.076-73.516,177.484S318.044,502,251,502z M251,20    C123.626,20,20,123.626,20,251s103.626,231,231,231s231-103.626,231-231S378.374,20,251,20z"/></g><g><path d="M223.988,56.754c-4.946,0-9.244-3.667-9.903-8.703c-0.717-5.476,3.141-10.497,8.618-11.213    C232.019,35.618,241.54,35,251,35c5.523,0,10,4.477,10,10s-4.477,10-10,10c-8.595,0-17.242,0.562-25.701,1.669    C224.859,56.727,224.421,56.754,223.988,56.754z"/></g><g><path d="M45,261c-5.523,0-10-4.477-10-10c0-44.91,13.653-87.969,39.484-124.521c25.256-35.739,60.188-62.681,101.02-77.915    c5.174-1.93,10.935,0.699,12.865,5.874c1.931,5.175-0.699,10.934-5.874,12.865C106.236,95.752,55,169.575,55,251    C55,256.523,50.523,261,45,261z"/></g></g></svg>
					<?elseif($_POST['ch'.($i+1).''][0]!=$answer['answer']):?>
					<svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 55 55" width="30px" data-name="Layer 1"><circle cx="27.5" cy="27.5" fill="#e95652" r="24"/><g opacity=".4"><path d="m46.66 13.05a24 24 0 0 0 -33.66 33.57 24 24 0 1 1 33.66-33.57z" fill="#cf3b36"/></g><g fill="#556065"><path d="m17.94 37.81a.73.73 0 0 1 -.53-.22.75.75 0 0 1 0-1.06l19.12-19.12a.75.75 0 1 1 1.06 1.06l-19.12 19.12a.74.74 0 0 1 -.53.22z"/><path d="m37.06 37.81a.74.74 0 0 1 -.53-.22l-19.12-19.12a.75.75 0 1 1 1.06-1.06l19.12 19.12a.75.75 0 0 1 0 1.06.73.73 0 0 1 -.53.22z"/><path d="m27.5 52.25a24.75 24.75 0 1 1 24.75-24.75 24.77 24.77 0 0 1 -24.75 24.75zm0-48a23.25 23.25 0 1 0 23.25 23.25 23.28 23.28 0 0 0 -23.25-23.25z"/></g></svg>
					<?endif;?>
					<?if($_POST['ch'.($i+1).''][0]==""):?>
					<p><?echo "Пропущено";?></p>
					<?else:?>
					<p><?echo $_POST['ch'.($i+1).''][0];?></p>
					<?endif;?>
				</li>					
				<?}
				elseif($question['type_of']=="Есе (відповідь з поясненнями)")
				{?>	
						<?echo "<div class='check_essay'>".$_POST['ch'.($i+1).''][0]."</div>"?>
				<?}
				elseif($question['type_of']=="Вибір з множини")
				{
				while ($true_check_ok = mysqli_fetch_assoc($result_true)) {					
					if($_POST['ch'.($i+1).''][$nb]==$answer['answer'])
					{
						if(($_POST['ch'.($i+1).''][$nb]==$true_check_ok['answer']))
						{
						$prop_true++;
						}
						if(($_POST['ch'.($i+1).''][$nb]!=$true_check_ok['answer']))
						{
						$prop_false++;
						}
					}
					$nb++;
				}
					?>
					<li>
						<?if($prop_true>$prop_false):?>
						<svg enable-background="new 0 0 512.063 512.063" height="30px" viewBox="0 0 512.063 512.063" width="30px" xmlns="http://www.w3.org/2000/svg"><g><g><ellipse cx="256.032" cy="256.032" fill="#00df76" rx="255.949" ry="256.032"/></g><path d="m256.032 0c-.116 0-.231.004-.347.004v512.055c.116 0 .231.004.347.004 141.357 0 255.949-114.629 255.949-256.032s-114.592-256.031-255.949-256.031z" fill="#00ab5e"/><path d="m111.326 261.118 103.524 103.524c4.515 4.515 11.836 4.515 16.351 0l169.957-169.957c4.515-4.515 4.515-11.836 0-16.351l-30.935-30.935c-4.515-4.515-11.836-4.515-16.351 0l-123.617 123.615c-4.515 4.515-11.836 4.515-16.351 0l-55.397-55.397c-4.426-4.426-11.571-4.526-16.119-.226l-30.83 29.149c-4.732 4.475-4.837 11.973-.232 16.578z" fill="#fff5f5"/><path d="m370.223 147.398c-4.515-4.515-11.836-4.515-16.351 0l-98.187 98.187v94.573l145.473-145.473c4.515-4.515 4.515-11.836 0-16.352z" fill="#dfebf1"/></g></svg>
						<?elseif($prop_true<$prop_false):?>
						<svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 55 55" width="30px" data-name="Layer 1"><circle cx="27.5" cy="27.5" fill="#e95652" r="24"/><g opacity=".4"><path d="m46.66 13.05a24 24 0 0 0 -33.66 33.57 24 24 0 1 1 33.66-33.57z" fill="#cf3b36"/></g><g fill="#556065"><path d="m17.94 37.81a.73.73 0 0 1 -.53-.22.75.75 0 0 1 0-1.06l19.12-19.12a.75.75 0 1 1 1.06 1.06l-19.12 19.12a.74.74 0 0 1 -.53.22z"/><path d="m37.06 37.81a.74.74 0 0 1 -.53-.22l-19.12-19.12a.75.75 0 1 1 1.06-1.06l19.12 19.12a.75.75 0 0 1 0 1.06.73.73 0 0 1 -.53.22z"/><path d="m27.5 52.25a24.75 24.75 0 1 1 24.75-24.75 24.77 24.77 0 0 1 -24.75 24.75zm0-48a23.25 23.25 0 1 0 23.25 23.25 23.28 23.28 0 0 0 -23.25-23.25z"/></g></svg>
						<?else:?>
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 502 502" style="enable-background:new 0 0 502 502;" xml:space="preserve" width="30px" height="30px"><g><g><circle style="fill:#CCCCCC;" cx="251" cy="251" r="241"/><path d="M251,502c-67.044,0-130.076-26.108-177.484-73.516S0,318.044,0,251S26.108,120.924,73.516,73.516S183.956,0,251,0    s130.076,26.108,177.484,73.516S502,183.956,502,251s-26.108,130.076-73.516,177.484S318.044,502,251,502z M251,20    C123.626,20,20,123.626,20,251s103.626,231,231,231s231-103.626,231-231S378.374,20,251,20z"/></g><g><path d="M223.988,56.754c-4.946,0-9.244-3.667-9.903-8.703c-0.717-5.476,3.141-10.497,8.618-11.213    C232.019,35.618,241.54,35,251,35c5.523,0,10,4.477,10,10s-4.477,10-10,10c-8.595,0-17.242,0.562-25.701,1.669    C224.859,56.727,224.421,56.754,223.988,56.754z"/></g><g><path d="M45,261c-5.523,0-10-4.477-10-10c0-44.91,13.653-87.969,39.484-124.521c25.256-35.739,60.188-62.681,101.02-77.915    c5.174-1.93,10.935,0.699,12.865,5.874c1.931,5.175-0.699,10.934-5.874,12.865C106.236,95.752,55,169.575,55,251    C55,256.523,50.523,261,45,261z"/></g></g></svg>
						<?endif;?>
						<p><?echo $answer['answer'];?></p>
					</li>
					<?
				}
				$k++;
				endwhile;
				if($check_miss==$rows_answer)
				{
					$miss++;
				}
				?>
			</ul>
			<?
			if($question['type_of']!="Вибір відповідності" && $question['type_of']!="Есе (відповідь з поясненнями)"):?>
			<div class="correct_answer">
				Правильні відповіді: <?for ($l=0; $l<$rows_true; $l++){$answer_true_result=mysqli_fetch_assoc($result_true_end); echo $answer_true_result['answer']."; <br>";}?>
			</div>
			<?endif;?>
		</div>
	</div>
	<?endfor;?>
	<button class="bn54" onclick="location.href='../profile.php'">
        <span class="bn54span">Перейти до профілю</span>
    </button>
	</div>

	<!--====== Javascripts & Jquery ======-->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.slicknav.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/circle-progress.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/script_form.js"></script>
	<script src="../https://code.jquery.com/jquery-3.5.1.js"></script>	
</body>
</html>
<?php
$score_total_data=round(1600/$all_true_score,0)*$correct;
$_SESSION['score']=$score_total_data;
$key=md5(microtime(true));
$_SESSION['analyze']=$key;
$path="C:\OpenServer\domains\InnovEd\sites-test\ ".$key.".html";
$user_add="INSERT INTO `test_results` (`email`, `id_test`, `score`, `review`) VALUES ('$email','$tf','$score_total_data', '$key')";
mysqli_query($connect,$user_add);
$out = ob_get_contents();
ob_end_clean();
file_put_contents($path,$out);
header ('Location: congrat.php'); 
exit(); 
?>
