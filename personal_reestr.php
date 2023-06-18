<?php
      require_once 'connectbd.php';
      $id = $_GET['id']; 
      $idd = $id;
      $name_depart = $_GET ['name_depart'];  
      
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
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Чернівцігаз</title>
</head>
<body>
<!--МЕНЮ-->
  <?php
    
    require_once "blocks/header.php";
    
  ?>
 

<section class="personal_page">
  <div class="employees">
      <div class="container">
            <div class="roww">
            <form class="form1">
            <div class="form_group">
             <h2>Мій профіль</h2>
             <img src="\img\user1.png" width="60%" height=""alt="" title="">
            
          

        <?php
       
          $employeer = mysqli_query($connect, "SELECT `name`,`name_depart`,`job_title`,`phone`,`mail` FROM `registr_kor` WHERE `Id_K`= '$idd'");
          $employeer = mysqli_fetch_all($employeer); 

           foreach ($employeer as $employee) {
            
            ?>
              
              <h5><?= $employee[0] ?></h5>
             <label><?= $employee[1] ?>  </label>
             <label><?= $employee[2] ?>  </label>
             <a href="mailto:<?= $employee[4] ?>?subject=Питання&body=Добрий день, <?= $employee[0] ?>,"><?= $employee[4] ?> </a>
              <?php
              
              
                }

              ?>
              
              
              
             


            

</div>




       </form> 
       <div class="vmist">
        <br>
        <a href="personal.php?name_depart= <?= $employee[1] ?>&id= <?=$idd?>" class="btn btn-itd btn-lg text-uppercase" style=" display: inline-block; margin: 0px 10px 20px 20px;">Мій відділ</a>
        <a href="personal_reestr.php?name_depart= <?= $employee[1] ?>&id= <?=$idd?>" class="btn btn-itd btn-lg text-uppercase" style=" display: inline-block; margin: 0px 10px 20px 20px;">Реєстр</a>
        <a href="personal_dodat_rees.php?name_depart= <?= $employee[1] ?>&id= <?=$idd?>" class="btn btn-itd btn-lg text-uppercase" style=" display: inline-block; margin: 0px 10px 20px 20px;">Додати ПКД в реєстр</a>

        <a href="personal_visual.php?name_depart= <?= $employee[1] ?>&id= <?=$idd?>" class="btn btn-itd btn-lg text-uppercase" style=" display: inline-block; margin: 0px 10px 20px 20px;">Графіки</a>
         
    </div>
        <div class="vmist2">
        <center><h4><?= $employee[1] ?></h4></center>
       
                      
                      
                     
                        <table class="tablereestr">
                        <thead>
                          <tr>
                            <th>Місяць</th>
                            <th>Замовник</th>
                            <th>Адреса</th>
                            <th>ІПН</th>
                            <th>Договір</th>
                            <th>ID</th>
                            <th>Бюдж проект</th>
                            <th>Оплата</th>
                            <th>Зарплата проєктанта</th>
                            <th>Зарплата ГІП</th>
                            <th>Виконавець</th>
                           
                          </tr>
                        </thead>

        <?php
              $department = mysqli_query($connect, "SELECT *, DATE_FORMAT(data,'%m.%Y') FROM `reestr` WHERE DATE_FORMAT(`data`,'%m-%Y') = DATE_FORMAT(NOW(),'%m-%Y') ORDER BY Id_Reestr DESC");
                      $department = mysqli_fetch_all($department);
                      foreach ($department as $departmentt) {
                    ?>

                          <tr>
                            <td><?= $departmentt[15] ?></td>
                            <td><?= $departmentt[2] ?></td>
                            <td><?= $departmentt[3] ?>, <?= $departmentt[4] ?>, буд.<?= $departmentt[5] ?>, кв.<?= $departmentt[6] ?></td>
                            <td><?= $departmentt[7] ?></td>
                            <td><?= $departmentt[8] ?></td>
                            <td><?= $departmentt[9] ?></td>
                            <td><?= $departmentt[10] ?></td>
                            <td><?= $departmentt[11] ?></td>
                            <td><?= $departmentt[12] ?></td>
                            <td><?= $departmentt[13] ?></td>
                            <td><?= $departmentt[14] ?></td>
                          </tr>
                          <?php

                    }

                  ?>
                  
                  </div>
                  </table>
                         
     
   
       
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