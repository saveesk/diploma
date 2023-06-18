<?php
    require_once 'connectbd.php';
    
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
    <title>Saveesk - Салон краси</title>
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
                    <h2 class="text-center text-uppercase color2 mb-5">Найкращі працівники</h2>
                </div>
            </div>
            <div class="row">
                <?php
            //Вивід працівників з бази даних
            
            $employees = mysqli_query($connect, "SELECT registr_kor.name, registr_kor.job_title, img FROM `best_employeer` INNER JOIN registr_kor ON registr_kor.Id_K = best_employeer.Id_Kor  ");
            $employees = mysqli_fetch_all($employees);
            foreach ($employees as $employee) {
        ?>
                <div class="emp col-xl-3 col-md-5 col-sm-12">
                    <br>
                    <div class="text-center"><img class="emp_img" src="<?= $employee[2] ?>" alt=""></div>
                     <br>
                    <h5 class="text-center"><b><?= $employee[0] ?>  </b><br> <?= $employee[1] ?></h5>
                    
                </div>
                
                
                    
           

                <?php

                    }

                ?>
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