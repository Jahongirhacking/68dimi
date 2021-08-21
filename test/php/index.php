<?php

session_start();
    
    
    $dbServerName="fdb30.awardspace.net";
    $dbUserName="3717817_jahongirhacking";
    $dbPassword="Jahongir18052004";
    $dbName="3717817_jahongirhacking";
    
    
    
    //Sessiyalardan ma'lumot olish
    $user_ism=$_SESSION['ism'];
    $user_familiya=$_SESSION['familiya'];
    $login=$_SESSION['login'];
    $code=$_SESSION['code'];
    $ochko=$_POST["ochko"];
    $_SESSION['ochko']=$_SESSION['ochko']+$ochko*10;
    
    //Maksimal Topish

    if ($ochko<=20){
    
    $conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
    $result_ochko=mysqli_query($conn,"UPDATE `forma` SET `ochko`=".$_SESSION['ochko']." WHERE (Login = \"$login\") AND (Parol=\"$code\");");
    if($login!="jahongir001" || $code!="Jahon18052004"){
        $result_testKirma=mysqli_query($conn,"UPDATE `forma` SET `isTest`=0  WHERE (Login = \"$login\") AND (Parol=\"$code\");");
    };
    
        
    
    echo "
    
    <!DOCTYPE html>
    <html lang=\"en\">
    <head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Test</title>
    <link rel=\"stylesheet\" href=\"./style/style.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
    
    </head>
    <body>
    <div id=\"container\">
    <i class=\"fa fa-gift\" aria-hidden=\"true\"></i>
    <p>Testni yakunlaganingiz va XP olganligingizni tasdiqlash uchun ushbu tugmachani bosing!</p>
    <a href=\"../users/\" id=\"kabinet\">Kabinetga O'tish</a>
    </a>
    </body>
    </html>
    
    ";
    }else{
        echo "Sizda javoblar soni 20 tadan ko'p chiqdi (qiziq :| )";
    }


?>