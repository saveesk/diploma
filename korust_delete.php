<?php


	require_once"connectbd.php";

	$Id_K = $_GET['id'];

	mysqli_query($connect, "DELETE FROM `registr_kor` WHERE `registr_kor`.`Id_K` = '$Id_K'");

	header('Location: all_korust.php');

?>	