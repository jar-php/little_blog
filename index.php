<?php 

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>My little Blogus</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<div class="nav">
				<ul>
					<li><a href="?page=index">Блог</a></li>
					<li><a href="?page=about">Обо мне</a></li>
					<li><a href="?page=contacts">Контакты</a></li>
				</ul>
			</div>
		</div>
		<div class="main">
			<div class="all">
				<p>Социальые сети</p>
				<p>Обо мне</p>
				<p>Последнии записи</p>
			</div>
			<div class="content">
				<?php 
			require_once 'include/router.inc.php';
				 ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<!-- Областы основного контента ДИНАМИЧИСКОЕ -->
	<div>
		

	</div>
	<!-- Областы основного контента ДИНАМИЧИСКОЕ -->
</body>
</html>