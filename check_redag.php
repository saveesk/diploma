<?php


	require_once"connectbd.php";

	 $Id_K = $_POST['id'];

	 $name = $_POST ['name'];

	 $surname = $_POST ['surname'];

	 $pobat = $_POST ['pobat'];

	 $phone = $_POST ['phone'];

	 $dozvil_red = $_POST ['dozvil'];

	 


 	 mysqli_query($connect, "UPDATE `registr_kor` SET `name`='$name',`surname`='$surname',`pobat`='$pobat',`phone`='$phone',`dozvil_red`='$dozvil_red' WHERE `registr_kor`.`Id_K` = '$Id_K'");



 	 

 	 header('Location: all_korust.php');

?> 	 