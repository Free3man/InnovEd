<h2><b>Форма для файлів</b></h2>
<form method="post" enctype="multipart/form-data">
<input type="file" name="filename"><br>
<input type="submit" value="Загрузить"><br>
</form>
<?
if(copy($_FILES['filename']['tmp_name'],"file/".$_FILES['filename']['name']))
{
echo "Файл загружен";
}
else
{
echo "Ошибка";
}
?>