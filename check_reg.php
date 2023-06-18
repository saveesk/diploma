<?php

	$name = filter_var(trim($_POST ['name']), FILTER_SANITIZE_STRING);

	$name_depart = filter_var(trim($_POST ['name_depart']), FILTER_SANITIZE_STRING);

	$job_title = filter_var(trim($_POST ['job_title']), FILTER_SANITIZE_STRING);

	$phone = filter_var(trim($_POST ['phone']), FILTER_SANITIZE_STRING);

	$mail = filter_var(trim($_POST ['mail']), FILTER_SANITIZE_STRING);

	$birthday = filter_var(trim($_POST ['birthday']), FILTER_SANITIZE_STRING);

	$room = filter_var(trim($_POST ['room']), FILTER_SANITIZE_STRING);

	$login = filter_var(trim($_POST ['login']), FILTER_SANITIZE_STRING);

	$pass = filter_var(trim($_POST ['pass']), FILTER_SANITIZE_STRING);

	header('Location: index.php');
	

	if (mb_strlen($login) < 4 || mb_strlen($login) > 20) 
		{
			echo "Недопустима довжина логіну";
			exit();
		}	

	elseif (mb_strlen($pass) < 6 || mb_strlen($pass) > 20) 
		{
			echo "Недопустима довжина паролю";
			exit();
		}	



		$pass = md5($pass."ghhjbhjv6fg5rv7");



//підключення до бази даних 

	$mysql = new mysqli('localhost', 'root', '1220','chernivtsigas');	
 	$mysql -> query("SET NAMES utf8");


	$result = $mysql->query("SELECT * FROM `registr_kor` WHERE `login` = '$login' AND `pass` = '$pass'");


	$user = $result->fetch_assoc();
	if (count($user) != 0) 
		{
		
			echo "<script language='javascript' type='text/javascript'>alert('Ви вже зареєстровані');  
      					</script>";
						  		echo "<meta http-equiv='refresh' content='1; URL=registr.php'>";
		exit();
		}	
		
		
//запис в базу даних 

	$mysql->query("INSERT INTO `registr_kor` (`name`, `name_depart`, `job_title`, `phone`, `mail`, `birthday`, `room`, `login`, `pass`) 
				   VALUES('$name', '$name_depart', '$job_title', '$phone', '$mail', '$birthday', '$room', '$login', '$pass')");

//вихід з бази даних 

	$mysql->close();


?>	

