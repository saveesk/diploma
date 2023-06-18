<?php


	require_once"connectbd.php";

	$Id_Bron = $_GET['id'];

	mysqli_query($connect, "DELETE FROM `bron` WHERE `bron`.`Id_Bron` = '$Id_Bron'");

	

	header('Location: index.php');

?>	