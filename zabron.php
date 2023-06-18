<?php
    require_once 'connectbd.php';
    $Id_K = $_POST['id'];
    $Id_Em=$_POST['Id_Em'];
    $Id_Ser=$_POST['Id_Ser'];
    $time=$_POST['time'];
    $date=$_POST['date'];
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $pobat=$_POST['pobat'];
    $phone=$_POST['phone'];
echo "$Id_K";
echo "$Id_Em";
echo "$Id_Ser";
echo "$time";
echo "$date";

  if (mb_strlen($Id_K) >= 1 ){
    mysqli_query($connect, "INSERT INTO bron (`Id_Em`,`Id_Ser`, `timee`, `dataa`, `Id_K`) VALUES ('$Id_Em', '$Id_Ser', '$time', '$date', '$Id_K')");
  }

 if (mb_strlen($Id_K) < 1 ){
    mysqli_query($connect, "INSERT INTO `registr_kor`(`name`, `surname`, `pobat`, `phone`) VALUES ('$name', '$surname', '$pobat', '$phone')");

    $id = mysqli_query($connect, "SELECT Id_K FROM `registr_kor`WHERE `name` = '$name' AND `surname`='$surname' AND `pobat`='$pobat' ");

                    $id = mysqli_fetch_assoc($id); 

                     foreach ($id as $id_U) {
                      mysqli_query($connect, "INSERT INTO bron (`Id_Em`,`Id_Ser`, `timee`, `dataa`, `Id_K`) VALUES ('$Id_Em', '$Id_Ser', '$time', '$date', '$id_U')");
  }}



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

  
<section class="bron_zabron">
  <div class="zabron">
      <div class="container">
            <div class="row">
               <center><h1>Дякуємо за запис! Чекаємо вас в салоні.</h1></center>

            <a href="index.php" class="btn btn-itd btn-lg text-uppercase">На головну сторінку</a>
           
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