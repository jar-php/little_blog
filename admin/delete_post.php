<?php 
require_once '../include/config.inc.php';
require_once '../include/libs.inc.php';

if(isset($_GET['id'])){ 
	$id = $_GET['id'];
	if(!deletePost($id)){
	echo "Ошибка удаления!";
	}
}
$posts = getAllPosts();
?>
<h4>Выберите пост что бы удалить</h4>
<?php 
foreach($posts as $post){
 ?>
 <a href="?id=<?= $post['id'] ?>"><?= $post['title']?></a><br>
<?php 
}
 