<?php
    require_once 'connectbd.php';
    $yearr = $_GET ['year'];
   // $value=$_POST['ser'];<form class="form" action="bron_date.php" method="post" style="box-shadow: 0 4px 16px #ccc; margin: 110px;width: 1050px;padding: 45px; border-radius: 10px; background-color: #fff;">  
    echo $yearr;
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
    <title>Чернівцігаз - Постанови тарифів</title>
</head>
<body>

    <!--МЕНЮ-->
  <?php
    require_once "blocks/header.php";
  ?>

<section class="bron">
  <div class="employees">
      <div class="container">
            <div class="row">
            
                <div> 
                <center>
                <h1>Постанови тарифів</h1> 
                <span></span>
                </center>         
                
                 <?php
                      //Вивід з бази даних
                   
                      $year = mysqli_query($connect, "SELECT `year` FROM `taryf`ORDER BY id_taryf  DESC LIMIT 14");
                      $year = mysqli_fetch_all($year);
                      foreach ($year as $years) {
                    ?>
                      
                      <a class="ayears" href="taryf.php?year= <?= $years[0] ?>" id="heading"> 
                          <div ><center>
                            <span><?= $years[0] ?>
                            </span>
                          </center></div>
                      </a>
                      

                  <?php

                    }

                  ?>
                  <br><br><br>

<?php
              $taryf = mysqli_query($connect, "SELECT * FROM `taryf` WHERE `year`= '$yearr'");
                      $taryf = mysqli_fetch_all($taryf);
                      foreach ($taryf as $taryff) {
                    ?>

                      <div >
                      
                        <center><h2>Структура тарифу за <?= $taryff[1] ?></h2></center><br>
                     
                        <table>
                        <thead>
                          <tr>
                            <th>№</th>
                            <th>Елементи витрат планової річної тарифної виручки</th>
                            <th>Одиниці виміру</th>
                            <th>Значення показників</th>
                          </tr>
                        </thead>

                          <tr>
                            <td>1</td>
                            <td>Тариф на послуги розподілу природного газу</td>
                            <td>грн за 1 м куб. на місяць<br> (без ПДВ)</td>
                            <td><?= $taryff[2] ?></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Планова річна тарифна виручка, усього</td>
                            <td>тис. грн</td>
                            <td>601626.1</td>
                          </tr>
                          <tr>
                            <td>2.1</td>
                            <td>Повна планова собівартість, усього</td>
                            <td>тис. грн</td>
                            <td>569145.3</td>
                          </tr>
                          <tr>
                            <td>2.1.1</td>
                            <td>Матеріальні витрати, усього</td>
                            <td>тис. грн</td>
                            <td>291232.3</td>
                          </tr>
                          <tr>
                            <td>2.1.1.1</td>
                            <td>у т.ч.: вартість газу на нормативні та виробничо-технологічні втрати/витрати природнього газу та власні потреби</td>
                            <td>тис. грн</td>
                            <td><?= $taryff[3] ?></td>
                          </tr>
                          <tr>
                            <td>2.1.1.2</td>
                            <td>Вартість матеріалів (паливо, електроенергія, витрати на ремонт)</td>
                            <td>тис. грн</td>
                            <td><?= $taryff[4] ?></td>
                          </tr>
                          <tr>
                            <td>2.1.2</td>
                            <td>Витрати на оплату праці</td>
                            <td>тис. грн</td>
                            <td><?= $taryff[5] ?></td>
                          </tr>
                          <tr>
                            <td>2.1.3</td>
                            <td>Амортизаційні відрахування</td>
                            <td>тис. грн</td>
                            <td><?= $taryff[6] ?></td>
                          </tr>
                          <tr>
                            <td>2.1.4</td>
                            <td>Інші витрати, усього</td>
                            <td>тис. грн</td>
                            <td>82949.0</td>
                          </tr>
                          <tr>
                            <td>2.1.4.1</td>
                            <td>у т.ч.: єдиний внесок на загальнообов'язкове державне соціальне страхування</td>
                            <td>тис. грн</td>
                            <td><?= $taryff[7] ?></td>
                          </tr>
                          <tr>
                            <td>2.1.4.2</td>
                            <td>повірка та ремонт лічильників</td>
                            <td>тис. грн</td>
                            <td><?= $taryff[8] ?></td>
                          </tr>
                          <tr>
                            <td>2.1.4.3</td>
                            <td>витрати на заміну лічильників та/або створення обмінного фонду лічильників</td>
                            <td>тис. грн</td>
                            <td><?= $taryff[9] ?></td>
                          </tr>
                          <tr>
                            <td>2.1.4.4</td>
                            <td>витрати на встановлення індивідуальних лічильників газу населенню</td>
                            <td>тис. грн</td>
                            <td><?= $taryff[10] ?></td>
                          </tr>
                          <tr>
                            <td>2.1.4.5</td>
                            <td>інші витрати</td>
                            <td>тис. грн</td>
                            <td><?= $taryff[11] ?></td>
                          </tr>
                          <tr>
                            <td>2.2.1</td>
                            <td>Плановий прибуток</td>
                            <td>тис. грн</td>
                            <td><?= $taryff[12] ?></td>
                          </tr>
                          <tr>
                            <td>2.2.2</td>
                            <td>у т.ч.: виробничі інвестиції</td>
                            <td>тис. грн</td>
                            <td><?= $taryff[13] ?></td>
                          </tr>
                          <tr>
                            <td>2.3</td>
                            <td>Коригування планової річної тарифної виручки</td>
                            <td>тис. грн</td>
                            <td><?= $taryff[14] ?></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Планова річна замовлена потужність розподілу природного газу, усього</td>
                            <td>1000 м куб. на рік</td>
                            <td><?= $taryff[15] ?></td>
                          </tr>
                      </table>




                   
                      </div>

                  <?php

                    }

                  ?>
            
        </div>
       
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