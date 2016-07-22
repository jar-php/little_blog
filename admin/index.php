<?php 
require_once 'session.php';

if(isset($_GET['logout'])){
	session_destroy();
	header("Location: login.php");
	exit;
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>
		Админ панель
	</title>
</head>
<body>
<div class="aNav">
	<ul>
		<li><a href="add_post.php">Добавить пост</a></li>
		<li><a href="edit_post.php">Редактировать пост</a></li>
		<li><a href="delete_post.php">Удалить пост</a></li>
		<li><a href="add_user.php">Добавить пользователя</a></li>
		<li><a href="?logout">Выйти с админки</a></li>
	</ul>
</div>
</body>
</html>