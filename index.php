<?php 

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>My little Blogus</title>
</head>
<body>
	<div>
		<a href="?page=index">Блог</a>
		<a href="?page=about">Обо мне</a>
		<a href="?page=contacts">Контакты</a>
		<a href="?page=view&id=2">Переглад поста №2</a>
	</div>

	<!-- Областы основного контента ДИНАМИЧИСКОЕ -->
	<div>
		<?php 
			require_once 'include/router.inc.php';
		 ?>

	</div>
	<!-- Областы основного контента ДИНАМИЧИСКОЕ -->
</body>
</html>