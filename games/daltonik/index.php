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

$result_online=mysqli_query($conn,"UPDATE `forma` SET `isOnline`=1  WHERE (Login = \"$login\") AND (Parol=\"$code\");");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rang Tanla</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
                
                <script>
                //User onlinemi?
                function updateUserStatus()
                {
                	jQuery.ajax({
                		url:'../../users/php/close.php',
                		success:function()
                		{
                			//code...
                		}
                	});
                }

                setInterval(updateUserStatus,40000);
                updateUserStatus();

                </script>
    
</head>
<body>
    <nav>
    
        <a href="../../users/" id="exit"><i class="fa fa-reply" aria-hidden="true"></i> Kabinetga qaytish</a>
        
        <div class="vaqtContainer">
            <div id="vaqt"></div>
        </div>
    </nav>
    <div class="container">
        <h1>
        <span class="RangniTop">R</span><span class="RangniTop">a</span><span class="RangniTop">n</span><span class="RangniTop">g</span><span class="RangniTop">n</span><span class="RangniTop">i</span> <span class="RangniTop">T</span><span class="RangniTop">o</span><span class="RangniTop">p</span> <span class="RangniTop">O'</span><span class="RangniTop">y</span><span class="RangniTop">i</span><span class="RangniTop">n</span><span class="RangniTop">i</span></h1><div class="info">
        <p>Katakchalar Ichidagi Ortiqcha Ajralib Turgan <span>Rangni </span>Toping</p>

        </div>
    <table id="gameZone" cellspacing="0">
        
    </table>
    <p id="score">0</p>
    
    <div id="refresh" onclick="yangila()">Yana urinish <i class="fa fa-gift" aria-hidden="true"></i></div>
    
    <span id="score-hide">0</span>
    
    </div>
    <script src="./script/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
