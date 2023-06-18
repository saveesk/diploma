<nav class="navbar fixed-top navbar-expand-lg navbar-light">
  <div class="container">
  <b><a href="index.php"  class="navbar-brand">Чернівцігаз</a></b>
    <button class="navbar-toggler" type="button"data-bs-toggle="collapse" data-bs-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>  
      </button>

      <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2">
          <li class="nav-item">
            <a href="taryf.php?year=2022" class="nav-link text-uppercase">Постанови тарифів</a>
          </li>

          <li class="nav-item">
            <a href="lastnews.php" class="nav-link text-uppercase">Останні новини</a>
          </li>

          <li class="nav-item">
            <a href="index.php#ask" class="nav-link text-uppercase">Питання</a>
          </li>
          <li class="nav-item">
            <a href="employees.php" class="nav-link text-uppercase">Найкращі працівники</a>
          </li>
        </ul>
      </div>
      <div id="registr_autor">

        

    <?php
    error_reporting(0);
      if ($_COOKIE['user'] == ''):

    ?>

    
      <a href="autoruz.php" class="btn btn-itd btn-lg text-uppercase" style=" display: inline;">Вхід</a>
      <a href="registr.php" class="btn btn-itd btn-lg text-uppercase"style=" display: inline;">Реєстрація</a>
        
    

  <?php else: ?>

    <?php
   require_once 'connectbd.php';
      error_reporting();
      $user = $_COOKIE['user'];
     

    

          $id_k = mysqli_query($connect, "SELECT Id_K FROM `registr_kor` WHERE `name` = '$user' ");

          $id_k = mysqli_fetch_all($id_k); 

           foreach ($id_k as $id_U) {
            
            ?>

    <span id="cookie" style=" display: inline;">

       <form class="form3" action="personal.php" method="post">
       Привіт, <a href="personal.php?id= <?= $id_U[0] ?>" style="border: none; display: inline; margin: 0 auto" type="submit"> <?=$_COOKIE['user']?> </a>
       <label></label>
      <a  href="exit.php" class="btn btn-itd btn-lg text-uppercase" style=" display: inline;">Вийти</a>
       
    </span>
    <?php
                }

              ?>

  <?php endif; ?>

  </div>


              
              <input type="hidden" name="id" value="<?= $id_U[0] ?>">
              
             
</form>




</nav>