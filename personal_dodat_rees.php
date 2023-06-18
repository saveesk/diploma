<?php
      require_once 'connectbd.php';
      require_once 'funcs.php';
      $id = $_GET['id']; 
      $idd = $id;
      $name_depart = $_GET ['name_depart'];  

      $query = "SELECT `proektant`, COUNT(`ID`) AS count_pr FROM `reestr` WHERE DATE_FORMAT(`data`,'%m') = DATE_FORMAT(NOW(),'%m') GROUP BY `proektant` ";
      $result = mysqli_query($connect, $query);

      $query1 = "SELECT `proektant`, SUM(`zarpl_proektant`) AS sum_pr FROM `reestr` WHERE DATE_FORMAT(`data`,'%m') = DATE_FORMAT(NOW(),'%m') GROUP BY `proektant`";
      $result1 = mysqli_query($connect, $query1);

      

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
        <div class="vmist2"><br>
        
       
        <form class="form_dod" action="progn.php" method="post">
        <center><h4>Додати ПКД в реєстр</h4></center>
    	<br>

      
      <input type="hidden" class="dinput" name="idd" id="idd" placeholder=" " value="<?= $idd?>">
        <label class="dlabel"> Дата </label><br>
        <input type="date" class="dinput" name="data" id="data" placeholder=" ">
        <br><br>
      

      
        <label class="dlabel"> Замовник </label><br>
        <input type="text" class="dinput" name="zamovnyk" id="zamovnyk" placeholder=" " >  
        <br><br>
      
      
        <label class="dlabel"> Населений пункт &emsp;&emsp;&emsp;&emsp;&emsp; &emsp; &emsp; &emsp; Вулиця &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;  Будинок &emsp; &emsp; Квартира </label><br>
        <input type="text" class="dinput" name="misto" id="misto" placeholder=" " > &emsp; 
        
        <input type="text" class="dinput" name="vulytsia" id="vulytsia" placeholder=" " >  &emsp;

        <input type="text" class="dbinput" name="budynok" id="budynok" placeholder=" " >  &emsp;
      
        <input type="text" class="dbinput" name="kvartyra" id="kvartyra" placeholder=" " >  
        <br><br>
      
      
        <label class="dlabel"> ІПН  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Номер договору &emsp;  &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; ID</label><br>
        <input type="text" class="diinput" name="IPN" id="IPN" placeholder=" " >  &emsp;&emsp;
        
        <input type="text" class="dinput" name="dohovir" id="dohovir" placeholder=" " > &emsp;&emsp;
      
        <select name="name_id" style = "width: 100px;"> 
            
            <?php
            //Вивід віддів з бази даних
            
            $ID = mysqli_query($connect, "SELECT `ID` FROM `id_robota`");
            $ID = mysqli_fetch_all($ID);
            foreach ($ID as $IDr) {
        ?>
            <div class="article">
            <option><?= $IDr[0] ?> </option>
                
            </div>

        <?php

            }
           

        ?>
        </select>
        <br><br>
      <label class="dlabel"> Проєктант </label><br>
      <select name="proektant" style = "width: 250px;"> 
            
            <?php
            //Вивід віддів з бази даних
            
            $name = mysqli_query($connect, "SELECT `name` FROM `registr_kor` WHERE `job_title`= 'Інженер-проектувальник'");
            $name = mysqli_fetch_all($name);
            foreach ($name as $namer) {
        ?>
            <div class="article">
            <option><?= $namer[0] ?> </option>
                
            </div>

        <?php

            }

        ?>
        </select>
        <button class="btn btn-itd btn-lg text-uppercase" style="position: left;" id="myBtn" type="submit">Спрогнозувати вартість</button>
        
        
         
               
                     
        
                         
     
   
              </form>
       </div>
</div>
</div>
</section>

    

     <!--ФУТЕР-->
  <?php
    require_once "blocks/footer.php";
  ?>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 
</body>
</html>