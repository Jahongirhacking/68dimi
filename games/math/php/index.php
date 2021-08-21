<?php

session_start();
    
    if($_SESSION['isMehmon']!=true){
    $dbServerName="fdb30.awardspace.net";
    $dbUserName="3717817_jahongirhacking";
    $dbPassword="Jahongir18052004";
    $dbName="3717817_jahongirhacking";
    
    
    
    //Sessiyalardan ma'lumot olish
    $user_ism=$_SESSION['ism'];
    $user_familiya=$_SESSION['familiya'];
    $login=$_SESSION['login'];
    $code=$_SESSION['code'];
    $xp=$_POST["ochko"];
    
    
    
    if((($login=="jasmina7711") && ($code=="Tjdigg4165") && ($xp>0)) || (($login=="algebra") && ($code=="687DAzizbek") && ($xp>0))){
        $_SESSION['ochko']+=0;
        $conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
        $result_ochko=mysqli_query($conn,"UPDATE `forma` SET `ochko`=".$_SESSION['ochko']." WHERE (Login = \"$login\") AND (Parol=\"$code\");");
    
        echo "lekin sizda nosozliklar yuzaga kelmoqda menimcha sizning akkountingizdan ko'p kishi foydalanmoqda! Hozircha 0";  
    }else{
    
        $_SESSION['ochko']+=$xp;
        $conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
        $result_ochko=mysqli_query($conn,"UPDATE `forma` SET `ochko`=".$_SESSION['ochko']." WHERE (Login = \"$login\") AND (Parol=\"$code\");");
        echo $xp;
        }
    }else{
        echo "lekin mehmonsiz shuning uchun 0";
    }
?>