<?php

	$login = filter_var(trim($_POST ['login']), FILTER_SANITIZE_STRING);

	$pass = filter_var(trim($_POST ['pass']), FILTER_SANITIZE_STRING);


	$pass = md5($pass."ghhjbhjv6fg5rv7");


//підключення до бази даних 

	$mysql = new mysqli('localhost', 'root', '1220','chernivtsigas');	

 $mysql -> query("SET NAMES utf8");






//запис в базу даних 


	$result = $mysql->query("SELECT * FROM `registr_kor` WHERE `login` = '$login' AND `pass` = '$pass'");

	$user = $result->fetch_assoc();
	if (count($user) == 0) 
		{
			
				echo "<script language='javascript' type='text/javascript'>alert('Ви не зареєстровані');  
      					</script>";
 				echo "<meta http-equiv='refresh' content='1; URL=avtoruz.php'>";
			
			exit();
		}


	$admin = $mysql->query("SELECT `admin` FROM `registr_kor` WHERE `login` = '$login' AND `pass` = '$pass'");
	$admin = mysqli_fetch_all($admin);
	foreach ($admin as $adminn) {
	if ($adminn[0] == 1) 
		{
			header('Location: /A_index.php');
		}
	else{
		header('Location: /index.php');
	}}




	setcookie('user', $user['name'], time() + 3600, "/");
	
		

//вихід з бази даних 

	$mysql->close();

	
	////header('Location: /index.php');

?>
