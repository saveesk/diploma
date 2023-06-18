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
    <title>Saveesk - Салон краси</title>
</head>
<body>

  <?php
    require_once"connectbd.php";
  ?>
    <!--МЕНЮ-->
  <?php
    require_once "blocks/header.php";
  ?>


<section class="bron_employees">
  <div class="employees">
      <div class="container">
            <div class="row">
                <center>   
                <h1>Оберіть послугу</h1>            
                 <form class="form1" action="bron_employees2.php" method="post" style="box-shadow: 0 4px 16px #ccc; margin: 110px;width: 700px;padding: 35px; border-radius: 10px; background-color: #fff;">  
                
                <?php
            //Вивід працівників з бази даних
            
            $services = mysqli_query($connect, "SELECT * FROM `services`");
            $services = mysqli_fetch_all($services);
            foreach ($services as $service) {
        ?>
            <div class="article">
                <input type="radio" id="rB<?php echo $service[0] ?>" name="rB" value="<?= $service[0] ?>" checked>
                <label for="rB<?php echo $service[0] ?>"><?= $service[1] ?> - <?= $service[3] ?> грн</label>
                
            </div>

        <?php

            }

        ?>


                <br>
              <button type="submit" class="btn btn-itd btn-lg text-uppercase">Продовжити</button> 
            </div>
            
            </form>
        </center>
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