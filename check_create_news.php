<?php


 $title = $_POST ['title'];

 $news = $_POST ['news'];

 //$img = $_POST ['img'];

  



 


 if (mb_strlen($title) < 1 )
  {
   echo "Введіть заголовок новини";
   exit();
  }

 elseif (mb_strlen($news) < 1 ) 
  {
   echo "Введіть саму новину";
   exit();
  } 


  


//підключення до бази даних 

 $mysql = new mysqli('localhost', 'root', '1220','chernivtsigas');





 $mysql -> query("SET NAMES utf8");

 $result = $mysql->query("SELECT * FROM lastnews WHERE title = '$title'");


 $film = $result->fetch_assoc();
 if (count($film) != 0) 
  {
   echo "Така новина вже існує";
   
   exit();
  } 


//запис в базу даних 

  $mysql->query("INSERT INTO `lastnews`(`title`, `news`) VALUES('$title', '$news')");

//вихід з бази даних 

  $mysql->close();


 header('Location: news.php');

?>