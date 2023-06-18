<?php
    require_once 'connectbd.php';
    $value=$_POST['ser'];
     echo "$value";
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
    <link rel="stylesheet" href="css/style.css">
    <title>Чернівцігаз</title>
</head>
<body>

 <!--МЕНЮ-->
  <?php
    require_once "blocks/header.php";
  ?>


   <section class="services_price">
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <a id = "about"> </a>
                    <h2 class="text-center text-uppercase color2 mb-5">Останні новини</h2>
                </div>
            </div>
            <div class="row">
                <div >
                    	<!--Статья-->
		<?php
			//Вивід новин з бази даних
			
			$news = mysqli_query($connect, "SELECT * FROM `lastnews` ORDER BY id_News DESC");
			$news = mysqli_fetch_all($news);
			foreach ($news as $new) {
		?>
			<div class="article">
				<img src="<?= $new[3] ?>" alt="" title="">
				<span id="heading"> <?= $new[1] ?> </span>
				<span> <?= $new[2] ?> </span>
			</div>

		<?php

			}

		?>

                
           
                
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