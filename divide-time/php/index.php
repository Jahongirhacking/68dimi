<?php
   
   $dbServerName="fdb30.awardspace.net";
   $dbUserName="3717817_jahongirhacking";
   $dbPassword="Jahongir18052004";
   $dbName="3717817_jahongirhacking";
    
   
$conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");


$all=mysqli_query($conn,"SELECT Login,ochko FROM forma WHERE isKirish=1");

for($i=0; $i<mysqli_num_rows($all); $i++){
    $tanla=mysqli_fetch_assoc($all);
    $login=$tanla["Login"];
    $ochko=$tanla["ochko"];
    //Kamaytirish
    $result=mysqli_query($conn,"UPDATE `forma` SET `ochko` = ".ceil($ochko/2)." WHERE Login = \"$login\";");
}

//UPDATE `forma` SET `ochko` = '8' WHERE `forma`.`user_id` = 2;

?>


