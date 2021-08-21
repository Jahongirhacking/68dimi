<?php

session_start();
    
    if($_SESSION['isMehmon']!=true && $_POST["ochko"]!=0){
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
    
    if($xp>=45){
        $xp=3;
    }elseif($xp>=35){
        $xp=2;
    }elseif($xp>=25){
        $xp=1;
    }else{
        $xp=0;
    }
    
    $_SESSION['ochko']+=$xp;
    
    
    $conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
    $result_ochko=mysqli_query($conn,"UPDATE `forma` SET `ochko`=".$_SESSION['ochko']." WHERE (Login = \"$login\") AND (Parol=\"$code\");");

    echo $xp;
    } else{
        echo "mehmonsiz shuning uchun 0";
    }
?>