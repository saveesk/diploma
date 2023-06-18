<?php
    require_once 'connectbd.php';
    $Id_Em=$_POST['Id_Em'];
    $Id_Ser=$_POST['Id_Ser'];
    $time=$_POST['time'];
    $date=$_POST['date'];
    
    echo "$Id_Em";
    echo "$Id_Ser";
    echo "$time";
     echo "$date";
    

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
    <title>Saveesk - Салон краси</title>
</head>
<body>
 <!--МЕНЮ-->
  <?php
    require_once "blocks/header.php";
  ?>

<section class="bron_info">
  <div class="employees">
      <div class="container">
            <div class="row">



        <center>
    <form class="form" action="zabron.php" method="post">
        <input type="hidden" name = "Id_Em" value = "<?php echo $Id_Em ?>">
        <input type="hidden" name = "Id_Ser" value = "<?php echo $Id_Ser ?>">
        <input type="hidden" name = "time" value = "<?php echo $time ?>">
         <input type="hidden" name = "date" value = "<?php echo $date ?>">

        <h2>Заповніть поля:</h2>
        

        <div class="form_group">    
            <input type="text" class="input" name="name" id="name" placeholder=" " required>
            <label class="label"> Ім'я </label>
            <br>
        </div>
            
        <div class="form_group">    
            <input type="text" class="input" name="surname" id="surname" placeholder=" " required>
            <label class="label"> Прізвище </label>
            <br>
        </div>  

        <div class="form_group">    
            <input type="text" class="input" name="pobat" id="pobat" placeholder=" " required>
            <label class="label"> По батькові </label>
            <br>
        </div> 

        <div class="form_group">    
            <input type="text" class="input" name="phone" id="phone" placeholder=" " required>
            <label class="label"> Номер телефону </label>
            <br>
        </div> 

            

            <button class="btn btn-itd btn-lg text-uppercase" id="myBtn" type="submit">Далі</button>

                

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