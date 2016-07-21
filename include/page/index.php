<?php 
require_once 'include/config.inc.php';
require_once 'include/libs.inc.php';
 ?>
<h3>Вывод блога</h3>
<?php 
	$post = getAllPosts();
	//print_r($post);
	foreach($post as $p){
 ?>
 <p><h2><?= $p['title'] ?></h2></p>
 Кратко:<br>
 <?= $p['short']?>
 <br>
 <a href="?page=view&id=<?=$p['id']?>">Читать</a>

 <?php 
}