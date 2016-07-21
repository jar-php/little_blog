<?php 
//helpers
function result2Arr($data){
	$arr = [];
	while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)){
		$arr[] = $row;
	}
	return $arr;

}

/*
@param return array of posts 
*/
function getAllPosts(){
	global $con;
	$sql = "SELECT * FROM posts";
	$result = mysqli_query($con, $sql);
	mysqli_close($con);
	if(!$result){
		echo mysqli_error();
	}
	return result2Arr($result);
}

/*
@param $id ident. of curent if
@param return row with post
*/
function viewPost($id){
	global $con;
	$sql = "SELECT * FROM posts WHERE id = $id";
	$result = mysqli_query($con, $sql);
	if(!$result){
		echo mysqli_error();
	}
	return mysqli_fetch_array($result);
}	

/*
@param return true/false
*/
 function addNewPost($title, $short, $full, $author, $datatime){
 }
/*
	@param $pid = post ID
	@param return true/false
*/
/*
	@param return array of comments
*/
function getAllComments($pid){
	global $con;
	$sql = "SELECT * FROM comments WHERE pid = $pid ORDER BY id DESC";
	$result = mysqli_query($con, $sql);
	if(!$result){
		echo mysqli_error();
	}
	return result2Arr($result);
}
function addComment($pid, $text, $author){

}

 ?>

