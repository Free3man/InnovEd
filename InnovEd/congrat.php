<?
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Favicon -->
  <link href="img/pres.png" rel="shortcut icon" />
    <title>Document</title>
    <!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
</head>
<?
$total=$_SESSION['score'];
$key=$_SESSION['analyze'];
?>
<style>
    body
    {
        <?if($total<500):?>
        background:  no-repeat center/100% url("./img/interstellar.gif");
        <?elseif(($total>=500)&&($total<1000)):?>
        background:  no-repeat center/100% url("./img/office.gif");
        <?elseif(($total>=1000)&&($total<1400)):?>
        background:  no-repeat center/100% url("./img/cruella.gif");
        <?else:?>
        background:  no-repeat center/100% url("./img/gatsby.gif");
        <?endif;?>
    }
</style>
<body>
    <div class="congrats">
        <h1 style="color:white;">Твій результат: <?echo $total?></h1>
        <?if($total<500):?>
        <h2 style="color:white;">Це жахливо! <br> Скоріше повертайся до теорії!</h2>
        <?elseif(($total>=500)&&($total<1000)):?>
        <h2 style="color:white;">NO GOD! <br> Більше практики!</h2>
        <?elseif(($total>=1000)&&($total<1400)):?>
        <h2 style="color:white;">Almost there! <br> Ще трішки практики!</h2>
        <?else:?>
        <h2 style="color:white;">WOW! <br> Це чудово!</h2>
        <?endif;?>
    </div>
</body>
</html>

<script>
function timecode() {
window.location.href = "./sites-test/ <?echo $key?>.html";
}
setTimeout(timecode, 6000);
</script>