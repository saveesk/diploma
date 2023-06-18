<?php

$data = $_POST['data'];

$zamovnyk = $_POST ['zamovnyk'];

$misto = $_POST ['misto'];

$vulytsia = $_POST ['vulytsia'];

$budynok = $_POST ['budynok'];

$kvartyra = $_POST ['kvartyra'];

$IPN = $_POST ['IPN'];

$dohovir = $_POST ['dohovir'];
                 
$name_id = $_POST ['name_id'];

$proektant  = $_POST ['proektant'];

$oplata = $_POST ['oplata'];



	



//підключення до бази даних 

	$mysql = new mysqli('localhost', 'root', '1220','chernivtsigas');	
 	$mysql -> query("SET NAMES utf8");


	
   require_once 'connectbd.php';
      error_reporting();
      $user = $_COOKIE['user'];
     

    

          $id_k = mysqli_query($connect, "SELECT Id_K FROM `registr_kor` WHERE `name` = '$user' ");

          $id_k = mysqli_fetch_all($id_k); 

           foreach ($id_k as $id_U) {
            
            $id =$id_U[0];}

    if($oplata=='3685.96' && $kvartyra!=''){$zarpl_proektant='766'; $zarpl_gip='183';}
    elseif($oplata=='3685.96' && $kvartyra==''){$zarpl_proektant='751'; $zarpl_gip='181';}
    elseif($oplata=='5841.77'){$zarpl_proektant='1214.6'; $zarpl_gip='291.6';}
    elseif($oplata=='1774.80' && $misto!='Чернівці'){$zarpl_proektant='624'; $zarpl_gip='150';}
    elseif($oplata=='1774.80' && $misto=='Чернівці'){$zarpl_proektant='561'; $zarpl_gip='135';}
    elseif($oplata=='4473.8' ){$zarpl_proektant='865.2'; $zarpl_gip='207.2';}
    elseif($oplata=='6277.24' ){$zarpl_proektant='1965'; $zarpl_gip='472';}
    elseif($oplata=='9736.29' ){$zarpl_proektant='2154'; $zarpl_gip='517';}
    elseif($oplata=='844.80' ){$zarpl_proektant='670.5';}
		
		
//запис в базу даних 

	$mysql->query("INSERT INTO `reestr`(`data`, `zamovnyk`, `misto`, `vulytsia`, `budynok`, `kvartyra`, `IPN`, `dohovir`, `ID`, `proektant`,`oplata`, `zarpl_proektant`, `zarpl_gip`) 
				   VALUES('$data', '$zamovnyk', '$misto', '$vulytsia', '$budynok', '$kvartyra', '$IPN', '$dohovir', '$name_id', '$proektant', '$oplata', '$zarpl_proektant', '$zarpl_gip')");

//вихід з бази даних 

	$mysql->close();
    
    
    header('Location: /personal_reestr.php?id=20');
?>	