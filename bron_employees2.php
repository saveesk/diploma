<?php
    require_once 'connectbd.php';
    $Id_Ser=$_POST['rB'];
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


  
<section class="bron_poslyga2">
  <div class="employees">
      <div class="container">
            <div class="row">
                <center> 
                <h1>Оберіть спеціаліста та зручну для вас дату</h1>                
                 <form class="form" action="bron_date.php" method="post" style="box-shadow: 0 4px 16px #ccc; margin: 110px;width:700px;padding: 45px; border-radius: 10px; background-color: #fff;">   
                <input type="hidden" name = "Id_Ser" value = "<?php echo $Id_Ser ?>">
               
                <?php
            //Вивід послуг з бази даних
            
            $employees = mysqli_query($connect, "SELECT * FROM `employees` WHERE `profession`= (SELECT `type_serv` FROM `services` WHERE `Id_Ser`='$Id_Ser')");
            $employees = mysqli_fetch_all($employees);
            foreach ($employees as $employee) {
        ?>
            <div class="article">
                <input type="radio" id="rBS<?php echo $employee[0] ?>" name="Id_Em" value="<?= $employee[0] ?>" checked>
                <label for="rBS<?php echo $employee[0] ?>"><?= $employee[1] ?> <?= $employee[2] ?> - <?= $employee[3] ?></label>
                
            </div>

        <?php

            }

        ?>
        <br>
        <h2>Дата:</h2>
        <input type="date" name="data" min="<?php echo date ('Y-m-d')?>" value="<?php echo date ('Y-m-d')?>" max="2024-06-30">
<script>
document.getElementById('data').valueAsDate = new Date();
</script>


 <br>
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