<?php


	require_once"connectbd.php";

	$id_News = $_GET['id'];

	mysqli_query($connect, "DELETE FROM `lastnews` WHERE `lastnews`.`id_News` = '$id_News'");

	header('Location: news.php');

?>	