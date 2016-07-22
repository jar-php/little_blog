<?php 
require_once '../include/config.inc.php';
require_once '../include/libs.inc.php';
require_once 'session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['title'])) $t = $_POST['title'];
	if(isset($_POST['short'])) $s = $_POST['short']; 
	if(isset($_POST['full'])) $f = $_POST['full']; 
	if(isset($_POST['author'])) $a = $_POST['author']; 
	//echo $t, $s, $f, $a;
	if(empty($t) or empty($s)){
		echo "Заполните все поля";
	}else{
		if(!addNewPost($t, $s, $f, $a)){
		echo "Ошибка добавления";
		}
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Добавление поста</title>
</head>
<body>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<p>
			<label>Введите заголовок</label><br>
			<input type="text" name="title"></input>
		</p>
		<p>
			<label>Введите краткое описание</label><br>
			<textarea name="short" rows="5" cols="35"></textarea>
		</p>
		<p>
			<label>Введите полное описание</label><br>
			<textarea name="full" rows="12" cols="35"></textarea>
		</p>
		<p>
			<label>Ваш псевдоним</label><br>
			<input type="text" name="author"></input>
		</p>
		<input type="submit" value="Отправить"></input>
	</form>
</body>
</html>