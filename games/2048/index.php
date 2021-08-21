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
<html>
<head>
  <meta charset="utf-8">
  <title>2048</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="style/main.css" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="apple-touch-icon" href="meta/apple-touch-icon.png">
  <link rel="stylesheet" type="text/css" href="..\Menu\style\appy.css">
  <link rel="apple-touch-startup-image" href="meta/apple-touch-startup-image-640x1096.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)"> <!-- iPhone 5+ -->
  <link rel="apple-touch-startup-image" href="meta/apple-touch-startup-image-640x920.png"  media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)"> <!-- iPhone, retina -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0, maximum-scale=1, user-scalable=no, minimal-ui">
  
  
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
  <a id="quit" href="../../users/"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i><p>Kabinetga</p></a>

	<div>
		   <div id="container">
     <div>
    <div class="nav-toggle">
  <div class="nav-toggle-bar"></div>
</div>

  </div>
  <div class="container">
    <div class="heading">
      <h1 class="title">2048</h1>
      <div class="scores-container">
        <div class="score-container" id="score">0</div>
        <div class="best-container">0</div>
      </div>
    </div>

    <div class="above-game">
      <p class="game-intro">Raqamlarni qo'shing</p>
      <a class="restart-button">Yangi o`yin</a>
    </div>

    <div class="game-container">
      <div class="game-message">
        <p></p>
        <div class="lower">
	        <a class="keep-playing-button">Davom etish</a>
          <a class="retry-button">Yana urunish!</a>
        </div>
      </div>

      <div class="grid-container">
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
      </div>

      <div class="tile-container">

      </div>
    </div>

  </div>
  </div>

  <script src="js/bind_polyfill.js"></script>
  <script src="js/classlist_polyfill.js"></script>
  <script src="js/animframe_polyfill.js"></script>
  <script src="js/keyboard_input_manager.js"></script>
  <script src="js/html_actuator.js"></script>
  <script src="js/grid.js"></script>
  <script src="js/tile.js"></script>
  <script src="js/local_storage_manager.js"></script>
  <script src="js/game_manager.js"></script>
  <script src="js/application.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
