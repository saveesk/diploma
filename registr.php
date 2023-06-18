

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
    <title>Чернівцігаз - Реєстрація</title>
</head>
<body>
 <!--МЕНЮ-->
  <?php
    require_once"connectbd.php";
    require_once "blocks/header.php";
    
  ?>

<section class="bron_info">
  <div class="employees">
      <div class="container">
            <div class="row">

            
           
            
        <center>
    <form class="form" action="check_reg.php" method="post">
    	<br>
        <span><h1>Реєстрація</h1></span>

    <div class="form_group">
      <input type="text" class="input" name="name" id="name" placeholder=" " >
      <label class="label"> ПІБ </label>
      <br>
    </div>
    
    <div class="form_group">
      <select name="name_depart" style = "width: 300px;"> 
            
            <?php
            //Вивід віддів з бази даних
            
            $employees = mysqli_query($connect, "SELECT N_department FROM `departments`");
            $employees = mysqli_fetch_all($employees);
            foreach ($employees as $employee) {
        ?>
            <div class="article">
            <option><?= $employee[0] ?> </option>
                
            </div>

        <?php

            }

        ?>
        </select>
      <br>
    </div>
    
   
    <div class="form_group">  
      <input type="text" class="input" name="job_title" id="job_title" placeholder=" ">
      <label class="label"> Посада </label>
      <br>
    </div>
      
    <div class="form_group">  
      <input type="text" class="input" name="phone" id="phone" placeholder=" ">
      <label class="label"> Номер телефону </label>
      <br>
    </div>  

    <div class="form_group">  
      <input type="email" class="input" name="mail" id="mail" placeholder=" ">
      <label class="label"> Корпоративна пошта </label>
      <br>
    </div>

    <div class="form_group">  
      <input type="date" class="input" name="birthday" id="birthday" placeholder=" ">
      <label class="label"> Дата народження </label>
      <br>
    </div> 

    <div class="form_group">  
      <input type="text" class="input" name="room" id="room" placeholder=" ">
      <label class="label"> Номер кабінету </label>
      <br>
    </div> 

    <div class="form_group">  
      <input type="text" class="input" name="login" id="login" placeholder=" ">
      <label class="label"> Логін </label>
      <br>
    </div> 

    <div class="form_group">  
      <input type="password" class="input" name="pass" id="pass" placeholder=" ">
      <label class="label"> Пароль </label>
      <br>
    </div> 
    

			<br>

			<button class="btn btn-itd btn-lg text-uppercase" id="myBtn" type="submit">Зареєструватись</button>
      

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