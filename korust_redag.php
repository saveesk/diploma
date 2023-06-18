<?php

	require_once"connectbd.php";
	$korust_id = $_GET ['id'];
	$korust = mysqli_query($connect, "SELECT * FROM `registr_kor` WHERE `Id_K` = '$korust_id'");
	$korust = mysqli_fetch_assoc($korust);
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"> <!--іконка сайту-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <!--<link rel="stylesheet" href="css/info.css">-->
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="check.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <title>Чернівцігаз - Адмін панель</title>
</head>
<body>
     <!--ХІДЕР----------------------------------------------------------------------------------------------------------------------------->
     <nav class="navbar fixed-top navbar-expand-lg navbar-light">
  <div class="container">
  <b><a href="A_index.php"  class="navbar-brand">Чернівцігаз<br>Адмін панель</a></b>
    <button class="navbar-toggler" type="button"data-bs-toggle="collapse" data-bs-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>  
      </button>

      <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2">
          <li class="nav-item">
            <a href="all_korust.php" class="nav-link text-uppercase">Зареєстровані користувачі</a>
          </li>

          <li class="nav-item">
            <a href="news.php" class="nav-link text-uppercase">Оновлення новин</a>
          </li>

          <li class="nav-item">
            <a href="index.php#ask" class="nav-link text-uppercase">Питання</a>
          </li>
          <li class="nav-item">
            <a href="employees.php" class="nav-link text-uppercase">Найкращі працівники</a>
          </li>
        </ul>
      </div>
      <div id="registr_autor">

        

    <?php
    error_reporting(0);
      if ($_COOKIE['user'] == ''):

    ?>

    
      <a href="autoruz.php" class="btn btn-itd btn-lg text-uppercase" style=" display: inline;">Вхід</a>
      <a href="registr.php" class="btn btn-itd btn-lg text-uppercase"style=" display: inline;">Реєстрація</a>
        
    

  <?php else: ?>

    <span id="cookie" style=" display: inline;">
       <form class="form3" action="personal.php" method="post">
       Привіт, <button style="border: none; display: inline; margin: 0 auto" type="submit"> <?=$_COOKIE['user']?> </button>
       <label></label>
      <a  href="exit.php" class="btn btn-itd btn-lg text-uppercase" style=" display: inline;">Вийти</a>
       
    </span>

  <?php endif; ?>

  </div>

<?php
   require_once 'connectbd.php';
      error_reporting();
      $user = $_COOKIE['user'];
     

    

          $id_k = mysqli_query($connect, "SELECT Id_K FROM `registr_kor` WHERE `name` = '$user' ");

          $id_k = mysqli_fetch_assoc($id_k); 

           foreach ($id_k as $id_U) {
            ?>
              
              <input type="hidden" name="id" value="<?= $id_U[0] ?>">
              <?php
                }

              ?>
</form>




</nav>

<section class="bron_info">
  <div class="employees">
      <div class="container">
            <div class="row">



        <center>
    <form class="formm" action="check_redag.php" method="post">
        <input type="hidden" name="id" value="<?= $korust[Id_K] ?>">
    	<br>
        <h1>Редагування інформації</h1>
        <br>
		

		<div class="formm_group">	
            <label class="labell" > Ім'я </label>
			<input type="text" class="inputt" name="name" id="name" placeholder=" " value="<?= $korust[name] ?>">
			<br>
		</div>
			
		<div class="formm_group">	
            <label class="labell" > Прізвище </label>
			<input type="text" class="inputt" name="surname" id="surname" placeholder=" " value="<?= $korust[surname] ?>">
			<br>
		</div>	

        <div class="formm_group">	
            <label class="labell" > По батькові </label>
			<input type="text" class="inputt" name="pobat" id="pobat" placeholder=" " value="<?= $korust[pobat] ?>">
			<br>
		</div>

        <div class="formm_group">	
            <label class="labell" > Номер телефону </label>
			<input type="text" class="inputt" name="phone" id="phone" placeholder=" " value="<?= $korust[phone] ?>">
			<br>
		</div>
    <label class="labell" > Доступ до редагування тарифу </label>

    <?php
    
    
	if ($korust[dozvil_red] == 1):?> 
		<label class="checkbox-green">	
	<input type="checkbox" class="checkbox" name="checkbox" checked onClick="set()">
	<span class="checkbox-green-switch" data-label-on="On" data-label-off="Off"></span>
  <input type="hidden" name="dozvil" id="dozvil" value="<?= $korust[dozvil_red] ?>">
</label>
<?php else: ?>
  <label class="checkbox-green">	
	<input type="checkbox" class="checkbox" name="checkbox" onClick="set()">
	<span class="checkbox-green-switch" data-label-on="On" data-label-off="Off"></span>
  <input type="hidden" name="dozvil" id="dozvil" value="<?= $korust[dozvil_red] ?>">
</label>
<?php endif; ?>





   
<br>
			<br>

			<button class="btn btn-itd btn-lg text-uppercase" id="myBtn" type="submit">Зберегти</button>

            

                

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
<script type="text/javascript" src="check.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>