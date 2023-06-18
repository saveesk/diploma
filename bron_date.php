<?php
    require_once 'connectbd.php';
    $Id_Ser=$_POST['Id_Ser'];
    $Id_Em=$_POST['Id_Em'];
    $date=$_POST['data'];
    echo "$Id_Em";
    echo "$Id_Ser";
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


  
<section class="bron_date">
  <div class="employees">
      <div class="container">
            <div class="row">
                <center>     

                 <?php
            //Вивід послуги та спеціаліста з бази даних
            
            $employees = mysqli_query($connect, "SELECT employees.name,employees.surname,employees.profession, services.name FROM `employees` INNER JOIN services ON Id_Ser=$Id_Ser WHERE `Id_Em`= '$Id_Em'");
            $employees = mysqli_fetch_all($employees);
            foreach ($employees as $employee) {
        ?>
            <div>
                <h1><?= $employee[0] ?> <?= $employee[1] ?> - <?= $employee[2] ?> (<?= $employee[3] ?>)</h1>
            </div>
                     




<?php
            error_reporting();
            $user = $_COOKIE['user'];


                

                    $id = mysqli_query($connect, "SELECT Id_K FROM `registr_kor`WHERE `name` = '$user' ");

                    $id = mysqli_fetch_assoc($id); 

                     foreach ($id as $id_U) {

                        if (mb_strlen($id_U) < 1 )
                  { 
                        ?>
                                    
                            <form class="form" action="bron_info.php" method="post" style="box-shadow: 0 4px 16px #ccc; margin:50px;width:700px;padding: 45px; border-radius: 10px; background-color: #fff;">   
                                <input type="hidden" name="id" value="<?= $id_U[0] ?>">
                            <?php
                        }
                            else{
                                 ?>

                                <form class="form" action="zabron.php" method="post" style="box-shadow: 0 4px 16px #ccc; margin:50px;width:700px;padding: 45px; border-radius: 10px; background-color: #fff;"> 
                                    <input type="hidden" name="id" value="<?= $id_U[0] ?>">
                                      <?php
                                }
                            }


                            ?>








                 <form class="form" action="bron_info.php" method="post" style="box-shadow: 0 4px 16px #ccc; margin:50px;width:700px;padding: 45px; border-radius: 10px; background-color: #fff;">   
                <input type="hidden" name = "Id_Em" value = "<?php echo $Id_Em ?>">
                 <input type="hidden" name = "Id_Ser" value = "<?php echo $Id_Ser ?>">
                 <input type="hidden" name = "date" value = "<?php echo $date ?>">
                <h2>Оберіть зручний для вас час:</h2>
               




            

        <?php

            }
          
            //Вивід сеансів з бази даних
            
            $times = mysqli_query($connect, "SELECT `seans` FROM `seans` WHERE NOT EXISTS (SELECT `timee` FROM `bron` WHERE Id_Em='$Id_Em' AND  bron.timee=seans.seans AND `dataa`= '$date')" );
            $times = mysqli_fetch_all($times);
             foreach ($times as $time) {
        ?>
            <div>

                <input type="radio" id="rBT<?php echo $time[0] ?>" name="time" value="<?= $time[0] ?>" checked>
                <label for="rBT<?php echo $time[0] ?>"><?= $time[0] ?>  </label>

            </div>

        <?php

            }

        ?>


                <br>
            <button type="submit" class="btn btn-itd btn-lg text-uppercase">Продовжити</button>
           
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