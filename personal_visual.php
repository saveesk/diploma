<?php
      require_once 'connectbd.php';
      require_once 'funcs.php';
      $id = $_GET['id']; 
      $idd = $id;
      $name_depart = $_GET ['name_depart'];  

      $query = "SELECT `proektant`, COUNT(`ID`) AS count_pr FROM `reestr` WHERE DATE_FORMAT(`data`,'%m-%Y') = DATE_FORMAT(NOW(),'%m-%Y') GROUP BY `proektant` ";
      $result = mysqli_query($connect, $query);

      $test = array();
      $count = 0;
      $result1 = mysqli_query($connect, "SELECT `proektant`, SUM(`zarpl_proektant`) AS sum_pr FROM `reestr` WHERE DATE_FORMAT(`data`,'%m-%Y') = DATE_FORMAT(NOW(),'%m-%Y') GROUP BY `proektant`");

      
      while($row = mysqli_fetch_array($result1))
      {
        $test[$count]["label"] = $row["proektant"];
        $test[$count]["y"] = $row["sum_pr"];
        $count = $count+1;
      }
    

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
       
                      
                      
                     
        <div id="piechart" style="width: 900px; height: 500px;"></div>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        
        
                         
     
   
       
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
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          
          <?php 
            while($chart = mysqli_fetch_assoc($result))
            {
                echo "['".$chart['proektant']."',".$chart['count_pr']."],";
            }
          ?>
        ]);

        var options = {
          title: 'Кількість розроблених проєктів в цьому місяці'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      </script>
   

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "Виплати за розроблені проєкти в цьому місяці"
	},
	axisY: {
		title: "Гривні"
	},
	data: [{
		type: "column",
		yValueFormatString: "# ##0.## гривень",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>


<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</body>
</html>