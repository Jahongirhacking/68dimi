<?php

session_start();
        
$user_id=$_SESSION['user_id'];
$user_sinf=$_SESSION['sinf'];
$user_ism=$_SESSION['ism'];
$user_familiya=$_SESSION['familiya'];
$login=$_SESSION['login'];
$code=$_SESSION['code'];

//2-Ma'lumotlar bazasi bilan bog'lash Bunda chatlar
        $dbServerName="fdb29.awardspace.net";
        $dbUserName="3753470_telegram";
        $dbPassword="Jahongir18052004";
        $dbName="3753470_telegram";
        $conn_telegram_chat=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
        

$dbServerName="fdb30.awardspace.net";
$dbUserName="3717817_jahongirhacking";
$dbPassword="Jahongir18052004";
$dbName="3717817_jahongirhacking";
    
$conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
$result_ochko=mysqli_query($conn,"SELECT ochko FROM forma WHERE (Login=\"$login\") AND (Parol=\"$code\");");
$user_ochko_array=mysqli_fetch_assoc($result_ochko);
$user_ochko=$user_ochko_array["ochko"];
$_SESSION['ochko']=$user_ochko;



                
echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Kabinetga O'tish</title>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
    <link rel=\"icon\" href=\"../images/kuz.png\">
    <link rel=\"stylesheet\" href=\"./style/style_user.css\">
     <link rel=\"stylesheet\" href=\"https://unpkg.com/aos@next/dist/aos.css\" />
    
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
    
    
                
                <script>
                //User onlinemi?
                function updateUserStatus()
                {
                	jQuery.ajax({
                		url:'./php/close.php',
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
<body id=\"body\">";

//Online yoki yo'qligi

$time=time();
$result_online=mysqli_query($conn,"UPDATE `forma` SET `isOnline`=1  WHERE last_time>=$time AND isKirish=1;");
$result_offline=mysqli_query($conn,"UPDATE `forma` SET `isOnline`=0  WHERE last_time<$time AND isKirish=1;");

$result_online_user=mysqli_query($conn,"UPDATE `forma` SET `isOnline`=1  WHERE (Login='$login') AND (Parol='$code') AND (isKirish=1);");
        


$result_set=mysqli_query($conn,"SELECT * FROM forma WHERE (Login='$login') AND (Parol='$code') AND (isKirish=1);");
$resultCheck=mysqli_num_rows($result_set);


//User yoki mehmon kirish
    
if($resultCheck==1 || $_SESSION["isMehmon"]==true){
        
        
        
        //Leaderlar ma'lumotlari
        $result_leader=mysqli_query($conn,"SELECT user_id,Ism,Familiya,Sinf,ochko,isOnline FROM forma WHERE (isKirish=1 AND Sinf!=\"o'qituvchi\") ORDER BY ochko DESC;");
        //INSERT INTO `post`(`image`, `title`, `text`, `name`, `sana`) VALUES ("../../images/post_image/start.jpg", "Hello World", "Salom mening ismim Jahongir. Shu sayt yaratuvchisiman bu saytda maktabdagi o'rningizni bilib olishingiz mumkin!", "Hayitov Jahongir 10-E", "21-Yanvar")
                        
        //##### Mehmon uchun kabinetga o'tish
        
        
        if($_SESSION['isMehmon']){
            echo "<a href='../sign_in/' class='mehmon-chiqish' ><i class=\"fa fa-times-circle-o\" aria-hidden=\"true\"></i></a>";
        };

                        
        //
                        
        echo "
        
        <div class=\"container\">
        
        
        <a class=\"coders\" target=\"_blank\" href=\"https://uzbekcoders.uz\"><img id=\"coders\" src=\"../images/million.png\"></a>
        <div id=\"weather\">
        <img id=\"weather-img\" src=\"https://i.pinimg.com/originals/77/0b/80/770b805d5c99c7931366c2e84e88f251.png\">
        <span id=\"degree\">°C</span>
        </div>
        
       <a id=\"stats\" href=\"../stats/\"><i class=\"fa fa-bar-chart\" aria-hidden=\"true\"></i></a>
                        
                        
                <nav>
                <i class=\"fa fa-trophy\" aria-hidden=\"true\" onclick=\"animated();\"></i>
                <div class=\"header\">
                <span id=\"nav-logo\"><i class=\"fa fa-graduation-cap\" aria-hidden=\"true\"></i><span class=\"black\">68-DIMI <span id=\"beta\">beta-sayt test rejimda ishlamoqda</span></span></span>
                <div id=\"nav-tools\">$user_ism $user_familiya -  &nbsp;<span class=\"gold\">$user_ochko XP</span><i class=\"fa fa-user\" aria-hidden=\"true\"></i> <div id=\"kuz-div\"><img id=\"kuzmunchoq\" src=\"../images/kuz.png\"></div></div>
            </div>
        </nav>
        
                        <section id=\"main-data\">";
        
                        //Postni chiqarish
                        //Post ma'lumotlari
                        
                        
        
                        $result_post=mysqli_query($conn,"SELECT * FROM post ORDER BY urin ASC;");
                        for($data_post=[]; $row_post=mysqli_fetch_assoc($result_post);$data_post[]=$row_post);
        
                        $main_data="";
                        for($i=count($data_post)-1;$i>=0;$i--){
        
                            $post_image=$data_post[$i]["image"];
                            $post_title=$data_post[$i]["title"];
                            $post_text=$data_post[$i]["text"];
                            $post_name=$data_post[$i]["name"];
                            $post_orientation=$data_post[$i]["orientation"];
                            $post_sana=$data_post[$i]["sana"];
                            
                            
                            //Post uchun aos animatsiya ishlatish
        
        
                            $main_data = $main_data."<div class=\"card\" data-aos=\"fade-up\">
                                <h1>$post_title</h1>
                                <div>
                                    <img class=\"$post_orientation\" src=\"$post_image\" alt=\"Rasm\">
                                    <p class=\"post-text\">$post_text</p>
                                    <p class=\"post-admin\"><i class=\"fa fa-check-circle-o blue\" aria-hidden=\"true\"></i> $post_name ($post_sana)</p>
                                </div>
                            </div>";
                        };
        
                        //Post tugadi huuuuuu        
                        echo "$main_data</section><!--Videos-->
                        
                        
        <div id=\"leader-shadow\"></div>
        
        <section id=\"leaderboard\" onmouseover=\"footerOff()\" onmouseout=\"footerOn()\">
            
            <table cellpadding=5px>
                <p id=\"lead\">Leaderboard <span id=\"trophy\"><i class=\"fa fa-trophy gold\" aria-hidden=\"true\"></i></span></p>
                                <tr class=\"table-head\"><th>O'rin</th><th>Sinf</th><th>Ism</th><th>Familiya</th><th>Ochko</th><th>Line</th></tr>";
                        
                        //Leaderboard jadvali
                        for($data_leader=[]; $row_leader=mysqli_fetch_assoc($result_leader);$data_leader[]=$row_leader);
                        for($i=0;$i<count($data_leader);$i++){
                            $another_users_id=$data_leader[$i]["user_id"];
                            
                            //Jadval nomi kichik-katta usuli
                                if($user_id>$another_users_id){
                                    $tableName=$another_users_id.":".$user_id;
                                }else{
                                    $tableName=$user_id.":".$another_users_id;
                                }
                                
                                
                                //echo "<script>console.log('$user_id'+' $another_users_id'+' $tableName')</script>"; //To'g'rimi yo'qmi tekshir
                            
                            //Yozishmalar uchun
                            
                            $telegram_circle=""; //Agar xabar kelsa qizil oldin yozishgan bo'lsa yashil
                            
                            //Aghar mehmon bo'lsa
                            if($_SESSION["isMehmon"]!=true){
                            
                                    //##########################################################################
                                        $isYozishgan=true; //yozishgan bo'lsa yoki bo'lmaganini aniqlash
                                        //Agar oldin yozishmagan bo'lsa
                                        
                                        if (!$conn_telegram_chat -> query("SELECT * FROM `$tableName`;") and $user_id!=$another_user_id) {
                                            $isYozishgan=false;
                                        } elseif($isYozishgan){
                                            $chat_data=mysqli_query($conn_telegram_chat,"SELECT * FROM `$tableName` WHERE isSeen=0;");
                                            
                                            if(isset($chat_data)){
                                                    
                                                    $isSeen_circle=mysqli_num_rows(mysqli_query($conn_telegram_chat,"SELECT * FROM `$tableName` WHERE isSeen=0 AND user_id=$another_users_id;")); 
                                                    
                                                    //Agar o'qilmaga xabarlar bo'lsa qizil dumaloqcha
                                                    if($isSeen_circle>0){
                                                        $telegram_circle="<span class='redCircle'></span>";
                                                    }else{
                                                    
                                                    $isSeen_circle=mysqli_num_rows(mysqli_query($conn_telegram_chat,"SELECT * FROM `$tableName` WHERE isSeen=0 AND user_id=$user_id;")); 
                                                    if($isSeen_circle>0){
                                                        $telegram_circle="<span class='orangeCircle'></span>";
                                                    }else{
                                                    
                                                        $isSeen_circle=mysqli_num_rows(mysqli_query($conn_telegram_chat,"SELECT * FROM `$tableName`;"));
                                                        if($isSeen_circle>0){
                                                            $telegram_circle="<span class='greenCircle'></span>";
                                                        }
                                                        
                                                    }
                                                   }
                                            }
                                        };
                                }
                                
                                                    
                            
                            $sinf=strtoupper($data_leader[$i]["Sinf"]);
                            $ism=$data_leader[$i]["Ism"];
                            $familiya=$data_leader[$i]["Familiya"];
                            $ochko=$data_leader[$i]["ochko"];
                            if($data_leader[$i]["isOnline"]==1){
                                $isOnline="<i class='fa fa-circle online-green' aria-hidden='true'></i>";
                            }else{
                                $isOnline="<i class='fa fa-circle offline-white' aria-hidden='true'></i>";
                            }
                            echo "<tr id=\"tr".($i+1)."\" class=\"table-row\"><td>".($i+1)."</td><td>$sinf</td><td>$ism</td><td>$familiya</td><td>$ochko XP</td><td>$isOnline</td><td><div><i onclick=telegram($another_users_id) class='fa fa-telegram' aria-hidden='true'>$telegram_circle</i></div></td></tr>";
                            //onclick=telegram($another_users_id)
                        };
                                
                        echo "</table>
                        </section><!--menu-->
        
                        <footer id=\"footer\">
                            <p>&copy; Copyright Jahongir Hayitov (Bulalar TM) 2020-<script>
                                let d=new Date();
                                document.write(d.getFullYear());
                            </script>
                            
                            </p>
                        </footer>
                    </div>
                    
                    
                    
        
        
                        
                        
                </div>
                <img id=\"bula\" src=\"../../images/Bula.jpg\" alt=\"Bula\">
                <script src=\"./script/app.js\"></script>
                
                <script src=\"https://unpkg.com/aos@next/dist/aos.js\"></script>
          <script>
            AOS.init();
          </script>
                
                </body>
                
                
                </html>";




}else{
echo "
   <div class=\"direct-error\">
   <i class=\"fa fa-map-signs\" aria-hidden=\"true\"></i>
   <p>Sizning ma'lumotingiz topilmadi, agar ro'yxatdan o'tgan bo'lsangiz kabinetingizga qaytadan kirishga urinib ko'ring!</p>
   <a href=\"../\" class=\"direct-button\">Ro'yxatdan O'tish</a>
   <a href=\"../sign_in\" class=\"direct-button\">Kabinetga O'tish</a>
   </div>
        
   ";
   
}


?>