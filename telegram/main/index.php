<?php
    
session_start();

if($_SESSION["isMehmon"]==0 && isset($_SESSION["isMehmon"])){

         //Mening ya'ni telegramdagi ID
        $user_id=$_SESSION['user_id'];
         //Abdullayev Furqat ######################
        $another_user_id=$_SESSION['another_user_id']; 
        
        //Jadval nomi kichik-katta usuli
        if($user_id>$another_user_id){
            $tableName=$another_user_id.":".$user_id;
        }else{
            $tableName=$user_id.":".$another_user_id;
        }
        
        //2-Ma'lumotlar bazasi bilan bog'lash Bunda chatlar
        $dbServerName="fdb29.awardspace.net";
        $dbUserName="3753470_telegram";
        $dbPassword="Jahongir18052004";
        $dbName="3753470_telegram";
        $conn_telegram_chat=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
        
        
        
        //##########################################################################
        $isYozishgan=true; //yozishgan bo'lsa yoki bo'lmaganini aniqlash
        //Agar oldin yozishmagan bo'lsa
        
        if (!$conn_telegram_chat -> query("SELECT * FROM `$tableName`;") and $user_id!=$another_user_id) {
            $isYozishgan=false;
            mysqli_query($conn_telegram_chat,"CREATE TABLE `$tableName` (`message` longtext COLLATE utf8_general_ci,`user_id` int NOT NULL,`time` varchar(5),`isSeen` boolean DEFAULT false, `right_time` int NOT NULL);");
        } elseif($user_id==$another_user_id){
            echo "<script>alert('O`zingiz bilan yozisha olmaysiz!'); location.href='../../users/'</script>";
        }
        
        //Yangi Table yaratish
        /*
        COLLATE utf8_general_ci
        CREATE TABLE Test (`message` longtext,`user_id` int NOT NULL,`time` varchar(5),`isSeen` boolean DEFAULT false);
        SHOW TABLES LIKE "1:3"; 
        */
        
        //#########################################################################
        
        ///// Ma'lumotlar bazasini bog'lash //////

        $dbServerName="fdb30.awardspace.net";
        $dbUserName="3717817_jahongirhacking";
        $dbPassword="Jahongir18052004";
        $dbName="3717817_jahongirhacking";
        
        //1-ma'lumotlar ba'zasi bilan bog'la Bunda User ma'lumotlari    
        $conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
        
       
        //Seniki ID
        //$another_user_id=$_SESSION['another_user_id'];
       
        $another_user=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Ism,Familiya,isOnline FROM forma WHERE (user_id=\"$another_user_id\");"));
        $another_user_ism= $another_user["Ism"];
        $another_user_familiya= $another_user["Familiya"];
        $another_user_isOnline= $another_user["isOnline"];
        
        
        
        //User kirganidan Xabarlarni o'qilgan qilish
        
        mysqli_query($conn_telegram_chat,"UPDATE `$tableName` SET isSeen=1 WHERE user_id='$another_user_id';");
        
        
        
        
//Agar Mehmon bo'lsa
} else{
   echo "<script>location.href='../../users/';</script>";
};

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <link rel="icon" href="https://www.freepngimg.com/thumb/logo/75348-computer-icons-telegram-scalable-vector-graphics-logo-thumb.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./style/style.css">
</head>
<body id="body" class="night" onload="loadScript()">

            <div class="animation-container">
                <div class="plane-zone"></div>
                <i class="fab fa-telegram-plane"></i>
                <p>BulaGram</p>
            </div>

    <div class="container">
        <!--Navigatsiya Qismi-->
        <nav id="nav">
            <a href="../../users/" class="kabinetga-link"><i class="fa fa-arrow-left"></i></a>
            <div class="user-data">
                <div class="user-image">
                <?php
                     //User rasmi uchun
                     echo strtoupper($another_user_ism[0]).strtoupper($another_user_familiya[0]);
                ?>
                </div>
                <div class="user-name">
                    <h1 id="user-fullname">
                    
                    <?php
                         //User Ismi va Familiyasi
                         echo $another_user_ism." ".$another_user_familiya;   
                    ?>
                    
                    </h1>
                    <p id="isOnline">
                    
                    <?php
                         //Onlayn yoki yo'qligi
                         if($another_user_isOnline==0){
                             echo "yaqinda onlayn edi";
                         }else{
                             echo "onlayn";
                         }
                    ?>
                    
                    </p>
                </div>
            </div>
            <div class="light-dark-mode" onclick="tunKun()">
                <i class="fa fa-sun"></i>
                <!--i class="fa fa-moon"></-->
            </div>
        </nav>

        <!--Yozishmalar Qismi-->
        <div id="chat-section">
        
        <?php
             
            //Xabarlarni yozish kodi
            //tableName
            $users_messages=mysqli_query($conn_telegram_chat,"SELECT * FROM `$tableName` ORDER BY `right_time` ASC;"); 
                  
            //Har bir Xabar uchun ID
            $messageId=1;      
              
            while($every_message=mysqli_fetch_assoc($users_messages)){
                
                $message_user_id=$every_message['user_id'];
                $message_text=$every_message['message'];
                $message_time=$every_message['time'];
                $message_isSeen=$every_message['isSeen'];
                
                if($user_id==$every_message["user_id"]){
                    //Meni xabarim yoki seniki
                    $whoseMessage="my";
                }else{
                    $whoseMessage="your";
                }
                
                echo "
                <div class=\"messages $whoseMessage-message\" id=\"$messageId\">
                    <p>$message_text</p>
                    <div class=\"chat-data\">
                        <span class=\"message-time\">$message_time</span>"; //Vaqtgacha qo'ydik
                        
                        //Ko'rdi yoki ko'rmadi
                        if($message_user_id==$user_id and $message_isSeen==0){
                            echo "<i class='fa fa-eye-slash'></i>";
                        }elseif($message_user_id==$user_id and $message_isSeen==1){
                            echo "<i class='fa fa-eye'></i>";
                        }
                    
                    
                    echo "
                    </div>
                </div>";
                //Xabarlar
                $messageId++;
            };
            
            
            
        
        ?>
            


        </div> 
        <!--Chat Section Tugadi-->

        <!--Xabar jo'natish qismi-->
        <div id="send-section">
            <input type="text" onkeyup="keyPressed(event)" name="sending-message" id="sending-message" placeholder="Xabar">
            <i class="fa fa-smile"></i>
            <i onclick="send()" id="send-button" class="fab fa-telegram-plane"></i>
        </div>

        <!--Smile  😂😉😜😎💪🥳👌👍😍😡🇺🇿  -->

    </div>

    <div id="forStyle"></div>
    
    <script>
            function keyPressed(event){
            var x=event.key;
            if(x=="\"" || x=="'"){    
                var answer=document.getElementById("sending-message");
                let error=answer.value;
                let err_arr=error.split("");
                err_arr.pop();
                let correct=err_arr.join("");
                answer.value=correct;
            }
        }
    </script>
    
<script src="./script/app.js"></script>
</body>
</html>