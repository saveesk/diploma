<?php
    require_once 'connectbd.php';
    $id=$_POST['id_Emp'];
     
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
             <h2>Профіль</h2>
             <img src="\img\user1.png" width="60%" height=""alt="" title="">
            
          

        <?php
       
          $employeer = mysqli_query($connect, "SELECT *, DATE_FORMAT(birthday, '%d.%m.%Y') FROM `registr_kor` WHERE `Id_K`= '$id'");
          $employeer = mysqli_fetch_all($employeer); 

           foreach ($employeer as $employee) {
            
            ?>
              
              <h5><?= $employee[1] ?></h5>
             <label>Кабінет <?= $employee[7] ?>  </label><br>
             <label><?= $employee[2] ?>  </label><br>
             <label><?= $employee[4] ?>  </label><br>
             <label><?= $employee[12] ?> </label><br>
             <a href="mailto:<?= $employee[5] ?>?subject=Питання&body=Добрий день, <?= $employee[1] ?>,"><?= $employee[5] ?> </a>
              
              
              
              
             


            

</div>




       </form> 
       <div class="vmist">
        <br>
        <center><h4><?= $employee[2] ?></h4></center><br>
        </div>
        <!--<div class="vmist2">
        
       
                      
                      
        <br>
                        <table>
                        <thead>
                          <tr>
                            <th>Номер телефону</th>
                            <th>Дата народження</th>
                            <th>Номер телефону</th>
                          </tr>
                        </thead>

       

                          <tr>
                            <td><?= $departmentt[0] ?></td>
                            <td><?= $departmentt[1] ?></td>
                            <td><?= $departmentt[3] ?></td>
                            
                          </tr>
                          <?php

                    }

                  ?>
                  
                  </div>
                  </table>
                         
     
   
       
       </div>-->
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