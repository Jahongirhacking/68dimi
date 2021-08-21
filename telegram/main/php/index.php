<?php

session_start();
    
    
    $dbServerName="fdb29.awardspace.net";
    $dbUserName="3753470_telegram";
    $dbPassword="Jahongir18052004";
    $dbName="3753470_telegram";
    
    
    
    //User jo'natgan xabar
    $message_text=$_POST["message"];
    $message_time=date("H:i",time()+5*3600);//GMT-5 vaqti
    $rightTime=time(); //Hozirgi vaqt tekislash uchun
    $user_id=$_SESSION['user_id'];
    $another_user_id=$_SESSION['another_user_id'];
    
    //Jadval nomi kichik-katta usuli
    if($user_id>$another_user_id){
        $tableName=$another_user_id.":".$user_id;
    }else{
        $tableName=$user_id.":".$another_user_id;
    }
    
    
    //Bazaga jo'natish
    
    $conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
    $result_ochko=mysqli_query($conn,"INSERT INTO `$tableName`(message,user_id,time,right_time) VALUES ('".$message_text."','".$user_id."','".$message_time."','".$rightTime."');");        
    
    echo "$user_id $another_user_id";

?>