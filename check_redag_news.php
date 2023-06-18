<?php


	require_once"connectbd.php";

	 $id_News = $_POST['id'];

	 $title = $_POST ['title'];

	 $news = $_POST ['news'];

	 


 	 mysqli_query($connect, "UPDATE `lastnews` SET `title`='$title',`news`='$news' WHERE `lastnews`.`id_News` = '$id_News'");



 	 

 	 header('Location: news.php');

?> 	 