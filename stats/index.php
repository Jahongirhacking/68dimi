<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistika</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav>Statistika Bo'limi</nav>

<div id="quit" onclick="orqaga()"><i class="fa fa-reply" aria-hidden="true"></i><p>Orqaga</p></div>


<?php

$dbServerName="fdb30.awardspace.net";
$dbUserName="3717817_jahongirhacking";
$dbPassword="Jahongir18052004";
$dbName="3717817_jahongirhacking";
    
$conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");

$num_all=mysqli_num_rows(mysqli_query($conn,"SELECT Sinf FROM forma WHERE isKirish=1"));
$num_7=mysqli_num_rows(mysqli_query($conn,"SELECT Sinf FROM forma WHERE isKirish=1 AND Sinf LIKE '7%'"));
$num_8=mysqli_num_rows(mysqli_query($conn,"SELECT Sinf FROM forma WHERE isKirish=1 AND Sinf LIKE '8%'"));
$num_9=mysqli_num_rows(mysqli_query($conn,"SELECT Sinf FROM forma WHERE isKirish=1 AND Sinf LIKE '9%'"));
$num_10=mysqli_num_rows(mysqli_query($conn,"SELECT Sinf FROM forma WHERE isKirish=1 AND Sinf LIKE '10%'"));
$num_11=mysqli_num_rows(mysqli_query($conn,"SELECT Sinf FROM forma WHERE isKirish=1 AND Sinf LIKE '11%'"));
$num_uqit=mysqli_num_rows(mysqli_query($conn,"SELECT Sinf FROM forma WHERE isKirish=1 AND Sinf LIKE \"o'qit%\""));

//Jami ochko
$data_7=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ochko) FROM forma WHERE isKirish='1' AND Sinf LIKE '7%'"))["SUM(ochko)"];
$data_8=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ochko) FROM forma WHERE isKirish='1' AND Sinf LIKE '8%'"))["SUM(ochko)"];
$data_9=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ochko) FROM forma WHERE isKirish='1' AND Sinf LIKE '9%'"))["SUM(ochko)"];
$data_10=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ochko) FROM forma WHERE isKirish='1' AND Sinf LIKE '10%'"))["SUM(ochko)"];
$data_11=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ochko) FROM forma WHERE isKirish='1' AND Sinf LIKE '11%'"))["SUM(ochko)"];

//Leaderlar
$i=7;
$result_leader=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Ism,Familiya FROM forma WHERE (isKirish=1 AND Sinf LIKE \"".$i."%\") ORDER BY ochko DESC LIMIT 1;"));
$leader_7=$result_leader["Ism"]." ".$result_leader["Familiya"];

$result_leader=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Ism,Familiya FROM forma WHERE (isKirish=1 AND Sinf LIKE \"".(++$i)."%\") ORDER BY ochko DESC LIMIT 1;"));
$leader_8=$result_leader["Ism"]." ".$result_leader["Familiya"];

$result_leader=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Ism,Familiya FROM forma WHERE (isKirish=1 AND Sinf LIKE \"".(++$i)."%\") ORDER BY ochko DESC LIMIT 1;"));
$leader_9=$result_leader["Ism"]." ".$result_leader["Familiya"];

$result_leader=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Ism,Familiya FROM forma WHERE (isKirish=1 AND Sinf LIKE \"".(++$i)."%\") ORDER BY ochko DESC LIMIT 1;"));
$leader_10=$result_leader["Ism"]." ".$result_leader["Familiya"];

$result_leader=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Ism,Familiya FROM forma WHERE (isKirish=1 AND Sinf LIKE \"".(++$i)."%\") ORDER BY ochko DESC LIMIT 1;"));
$leader_11=$result_leader["Ism"]." ".$result_leader["Familiya"];

echo "
        <div class=\"container\">
             <h1>Foydalanuvchilar soni sinflar kesimi bo'yicha</h1>

             <div class=\"card\"><h1>7-sinflar</h1>
             <div><div class=\"foiz\">".$num_7."ta (".intdiv($num_7*100,$num_all)."%)"."</div><progress max=\"".$num_all."\" value=\"".$num_7."\">
             </progress><div>Jami : ".$data_7." XP</div></div>
             <div class=\"leader\">Leader : ".$leader_7."</div>
             </div>

             <div class=\"card\"><h1>8-sinflar</h1>
             <div><div class=\"foiz\">".$num_8."ta (".intdiv($num_8*100,$num_all)."%)"."</div><progress max=\"".$num_all."\" value=\"".$num_8."\">
             </progress><div>Jami : ".$data_8." XP</div></div>
             <div class=\"leader\">Leader : ".$leader_8."</div>
             </div>

             <div class=\"card\"><h1>9-sinflar</h1>
             <div><div class=\"foiz\">".$num_9."ta (".intdiv($num_9*100,$num_all)."%)"."</div><progress max=\"".$num_all."\" value=\"".$num_9."\">
             </progress><div>Jami : ".$data_9." XP</div></div>
             <div class=\"leader\">Leader : ".$leader_9."</div>
             </div>

             <div class=\"card\"><h1>10-sinflar</h1>
             <div><div class=\"foiz\">".$num_10."ta (".intdiv($num_10*100,$num_all)."%)"."</div><progress max=\"".$num_all."\" value=\"".$num_10."\">
             </progress><div>Jami : ".$data_10." XP</div></div>
             <div class=\"leader\">Leader : ".$leader_10."</div>
             </div>

             <div class=\"card\"><h1>11-sinflar</h1>
             <div><div class=\"foiz\">".$num_11."ta (".intdiv($num_11*100,$num_all)."%)"."</div><progress max=\"".$num_all."\" value=\"".$num_11."\">
             </progress><div>Jami : ".$data_11." XP</div></div>
             <div class=\"leader\">Leader : ".$leader_11."</div>
             </div>

             <div class=\"card\"><h1>O'qituvchilar soni</h1>
             <div><div class=\"foiz\">".$num_uqit."ta (".intdiv($num_uqit*100,$num_all)."%)"."</div><progress max=\"".$num_all."\" value=\"".$num_uqit."\">
             </progress></div>
             </div>
            

             <span id=\"jami\">Saytdan jami ".$num_all." kishi ro'yxatdan o'tgan</span>
        </div>


";    

?>

<script>

function orqaga(){
    location.href="../users/"
}

</script>

</body>
</html>