<?php 
require_once 'include/config.inc.php';
require_once 'include/libs.inc.php';
 ?>
 <h3>Просмотр новости <?= $id?></h3>
 <?php 
//Незабыть отфильтровать данные GET
 $p = viewPost($id);
 ?>

   <p><h2><?= $p['title'] ?></h2></p>
 Полно:<br>
 <?= $p['full']?>
 <br>
 Дата: <?= date('d:m:Y', $p['datetime'])?>
 <br>
 Автор: <?= $p['author'] ?>
<hr>
<h4>Есть что сказать?</h4>
<form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
<p>
	<label>Автор</label><br>
	<input type="text" name="author"></input></p>
<p>
	<label>Коментарий</label><br>
	<textarea name="text"></textarea>
</p>
<input type="hidden" name="$id"></input>
<input type="submit" value="Отправить"></input>
</form>

<h4>Коментарии</h4>
<?php 
	$comms = getAllComments($id);
	if(count($comms) == 0){
		echo "Пока что нет коментариев!";
		exit;
	}
	foreach($comms as $comm){
 ?>
 <p>
 	<a href="user.php?name=<?= $comm['author']?>"><?= $comm['author'] ?></a><br>
 	<?= $comm['text'] ?>
 </p>
 <?php 
}


