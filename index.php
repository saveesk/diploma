
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
    <title>Чернівцігаз</title>
</head>
<body>

    <!--МЕНЮ-->
  <?php
    require_once "blocks/header.php";
  ?>




  <div class="saveesk">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center text-white">Всі відділи</h1>
                    <a href="taryf.php?year=2022" class="btn btn-itd btn-lg text-uppercase">Переглянути</a>
                </div>
            </div>
        </div>
      </div>


<!--ПОСЛУГИ-->

    <section class="services">
        <form class="form" action="profil_empl.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <a id = "services"> </a>
                    <h2 class="text-center text-uppercase color1 mb-5">Іменинники в цьому місяці</h2>
                </div>
            </div>
            <div class="row">

            <?php
       
          $birthday = mysqli_query($connect, "SELECT * FROM `registr_kor` WHERE DATE_FORMAT(`birthday`,'%m') = DATE_FORMAT(NOW(),'%m') ");
          $birthday = mysqli_fetch_all($birthday); 

           foreach ($birthday as $birthdayy) {
            
            ?>
              <div class="col-xl-3 col-md-5 col-sm-12">
                    <div class="itd_circle text-center"><img class="itdd_circle" src="img/user_BD.jpeg" alt=""></div>
                    <button style="border: none; display: block; margin: 0 auto " name="id_Emp" type="submit" class="link-dark" value="<?= $birthdayy[0] ?>"><h5 class="text-center"><?= $birthdayy[1] ?></h5></button>
                    <div class="line"></div>
                </div>
           
              <?php
              
                }

              ?>
           


                
                
               
            </div> 
        </div>
    </form>
    </section>


<!--ОСТАННІ НОВИНИ-->


    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <a id = "lastnews"> </a>
                    <h2 class="text-center text-uppercase color2 mb-5">Останні новини</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-7 col-lg-12">
                <?php
                    //Вивід новин з бази даних
                    
                    $news = mysqli_query($connect, "SELECT * FROM `lastnews` ORDER BY id_News DESC LIMIT 1");
                    $news = mysqli_fetch_all($news);
                    foreach ($news as $new) {
                  ?>
                   

                  
                    <p><br><br><br></p>
                    <p><b><?= $new[1] ?><br></b><br>
                    <?= $new[2] ?>
                        </p>
                    <p><br><br><br></p>
                    <a href="lastnews.php" class="btn btn-lg text-uppercase btn-itd">Детальніше</a>
                </div>
                <div class="col-xl-5 col-lg-12 text-center">
                    <img src="<?= $new[3] ?>" alt="saveesk" class="img-fluid itd_img">
                </div>
                <?php

                    }

                  ?>
            </div>
        </div>
    </section>


<!--ПИТАННЯ-->


    <section class="ask">
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <a id = "ask"> </a>
                    <h2 class="text-center text-uppercase color2 mb-5">Питання</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">

                    <div class="accordion accordion-flush" id="accordion1">

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="ask1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapseOne">
                              Що таке тариф на розподіл газу і як відбувається його доставка до споживачів?
                            </button>
                          </h2>
                          <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="ask1" data-bs-parent="#accordion1">
                            <div class="accordion-body fst-italic">«Чернівцігаз» надає споживачам послугу з доставки природного газу. 
                            З магістральних газопроводів, де газ перебуває під високим тиском, він потрапляє в розподільні газопроводи. 
                            Тут тиск понижується за допомогою спеціального обладнання, адже побутові газові прилади працюють на низькому тиску. 
                            Цей тиск має бути стабільним, щоб газ надійно надходив до домівок клієнтів. Саме цим і займаються фахівці «Чернівцігазу». 
                            Вони проводять технічне обслуговування 14 тисяч кілометрів мереж та підтримують у робочому стані десятки тисяч одиниць обладнання,
                            встановленого на розподільних газопроводах. До структури тарифу на розподіл газу входять виробничі витрати, витрати природного газу, 
                            необхідні для його доставки мережами, оплата праці всіх фахівців, які забезпечують діяльність з розподілу, та інвестиції в мережі. 
                            Газопроводи в Україні належать багатьом власникам: державі, громадам, приватним компаніям. Але всі споживачі сплачують за доставку газу, 
                            який доходить до них газогонами різних власників.</div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="ask2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapseTwo">
                            
                            Як змінилось споживання газу в Україні за минулий газовий рік?
                            </button>
                          </h2>
                          <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="ask2" data-bs-parent="#accordion1">
                            <div class="accordion-body fst-italic">Ні, ми працюємо тільки в салоні. Є низка причин, чому ми вирішили працювати без виїзду. У салоні кожен майстер має своє робоче місце, 
                                з розкладеними інструментами та засобами і хорошим освітленням, що дуже важливо для роботи. А ось вдома у клієнток не завжди знайдеться зручне місце, і дуже часто бувають проблеми 
                                з достатнім освітленням. Окрім цього, клієнтку у помешканні можуть відволікати домашніми або іншими родинними справами, тоді як в салоні й майстер, і клієнт можуть спокійно зосередитися на зачісці або макіяжі. 
                                Загалом, робота в салоні більш вигідна та спокійна для обох сторін, і займає менше часу.</div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="ask3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapseThree">
                            Чому газовий рік триває до 1 жовтня, а перерахунок платежів відбувається тільки з 1 січня?
                            </button>
                          </h2>
                          <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="ask3" data-bs-parent="#accordion1">
                            <div class="accordion-body fst-italic">Стандартно ми працюємо з 9 ранку і до 8 вечора.</div>
                          </div>

                        </div>
                      </div>
                </div>

                <!--Кінець першого акордеону-->

                <div class="col-md-6 col-sm-12">

                    <div class="accordion accordion-flush" id="accordion2">

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            «Чому я сплачую за минулий рік? Я вже платив раніше» та «Чому я не можу сплачувати за поточні обсяги споживання?»
                            </button>
                          </h2>
                          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordion2">
                            <div class="accordion-body">Ні, у такому випадку макіяж не зіпсується. У процесі миття волосся або укладання перукар не зачіпає вашого обличчя, тому ризику зіпсувати 
                                щойно зроблений макіяж немає. Зверніть увагу на те, що ми не робимо макіяж і зачіску одночасно.</div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Що таке мінімальна плата за розподіл газу?
                            </button>
                          </h2>
                          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordion2">
                            <div class="accordion-body">Ціна роботи з волоссям залежить від декількох чинників – перш за все, від довжини, кількості витрачених матеріалів 
                                (наприклад, у процесі фарбування волосся) і складності самої роботи. Всього фахівці класифікують 7 довжин волосся: 1 довжина – 
                                це коротке волосся (зачіски чоловічого типу), 2 довжина – волосся до середини шиї (наприклад, каре, волосся до 25 см), 
                                3 довжина – від середини шиї до плечей (до 35 см), 4 довжина – до лопаток (від 35 до 40 см), 5 довжина – довге волосся нижче 
                                лопаток (до 55 см), 6 довжина – до 60 см і 7 довжина – понад 60 см. Чим довше ваше волосся – тим дорожча робота.</div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            За чий рахунок повинна проводитися періодична повірка побутових лічильників газу та ремонт, пов'язаний з такою повіркою?
                            </button>
                          </h2>
                          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordion2">
                            <div class="accordion-body">Для візажу ми використовуємо тільки професійну косметику. Загалом, це продукція італійського виробника 
                                Cinecitta, і французька косметика Atelier. Окрім цих «основних» засобів, використовуємо й інші продукти – наприклад, 
                                від Wycon і Make Up For Ever. Усю косметику, яку ми використовуємо в роботі, можна придбати в нашому салоні.</div>
                          </div>

                        </div>
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