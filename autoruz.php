

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"> <!--іконка сайту-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Чернівцігаз</title>
</head>
<body>
 <!--МЕНЮ-->
  <?php
    require_once "blocks/header.php";
  ?>

<section class="bron_info">
  <div class="employees">
      <div class="container">
            <div class="row">



        <center>
    <form class="form" action="check_avt.php" method="post">
    	<br>
        <h1>Авторизація</h1>
        <br>
		

		<div class="form_group">	
			<input type="text" class="input" name="login" id="login" placeholder=" ">
			<label class="label"> Введіть логін </label>
			<br>
		</div>
			
		<div class="form_group">	
			<input type="password" class="input" name="pass" id="pass" placeholder=" ">
			<label class="label"> Введіть пароль </label>
			<br>
		</div>	

			<br>

			<button class="btn btn-itd btn-lg text-uppercase" id="myBtn" type="submit">Авторизуватись</button>

            

                

    </form>

        </center>


    </div>
</div>
</div>
</section>
     <!--ФУТЕР-->
  <?php
    require_once "blocks/footer.php";
  ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>