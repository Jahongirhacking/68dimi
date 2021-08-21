<?php

session_start();
        
$user_sinf=$_SESSION['sinf'];
$user_ism=$_SESSION['ism'];
$user_familiya=$_SESSION['familiya'];
$login=$_SESSION['login'];
$code=$_SESSION['code'];



$dbServerName="fdb30.awardspace.net";
$dbUserName="3717817_jahongirhacking";
$dbPassword="Jahongir18052004";
$dbName="3717817_jahongirhacking";
    
$conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");

$time=time()+41;

$updateOnline=mysqli_query($conn,"UPDATE `forma` SET `last_time`=$time  WHERE Login=\"$login\" AND Parol=\"$code\"");

//echo "$user_ism";

?>