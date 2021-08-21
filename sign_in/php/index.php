<?php

session_start();

echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Kabinetga O'tish</title>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
    <link rel=\"icon\" href=\"https://www.onlygfx.com/wp-content/uploads/2020/07/blank-post-it-note-1.png\">
    <link rel=\"stylesheet\" href=\"../style/sign_in.css\">
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
</head>
<body>";

    //Form dan kelgan malumot
    $login=strtolower($_POST["login"]);
    $code=$_POST["code"];

    $dbServerName="fdb30.awardspace.net";
    $dbUserName="3717817_jahongirhacking";
    $dbPassword="Jahongir18052004";
    $dbName="3717817_jahongirhacking";
    
    
    $conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
    if($conn){

        //Admin bazani ulash
        $sql_admin="SELECT * FROM admin;";
        $result_admin=mysqli_query($conn,$sql_admin);
        $resultCheck_admin=mysqli_num_rows($result_admin);

        //Userlar bazasini ulash
        $sql_user="SELECT * FROM forma;";
        $result_user=mysqli_query($conn,$sql_user);
        $resultCheck_user=mysqli_num_rows($result_user);
        
        //Adminlar massivini yaratish
        $arr_admin_list=[];
        $arr_admin_names=[];
        $arr_user_list=[];
        $arr_user_names=[];

        //admin va userlar ma'limotini tug'irlash
        if($resultCheck_admin>0){
            while($row=mysqli_fetch_assoc($result_admin)){
                $arr_admin_list[$row["login"]]=$row["parol"];
                array_push($arr_admin_names,$row["Ism"]);
            }
        }
        if($resultCheck_user>0){
            while($row=mysqli_fetch_assoc($result_user)){
                $arr_user_list[$row["Login"]]=$row["Parol"];
                array_push($arr_user_names, $row["Ism"]);
                $kirish_arr[]=$row["isKirish"];
            }
        }
        
        ///Online uchun yozish kodi
        
        $result_online=mysqli_query($conn,"SELECT isOnline FROM forma WHERE Login='$login' AND Parol='$code';");
        $row=mysqli_fetch_assoc($result_online);
        $isOnline=$row["isOnline"];



        //Taqqoslash
        $isUserOrAdmin=False;
        $count=0; //Ismni bilish uchun

        /////////////    Link uchun    /////////////////
        $link_url="";

        //Agar admin bo'lsa

        foreach($arr_admin_list as $key=>$value){
            if($key==$login && $value==$code && !$isUserOrAdmin){
                $isUserOrAdmin=True;
                
                echo "
                <div id=\"admin-alert\">
                    <p>Marhamat $arr_admin_names[$count], ma'lumotlar bazasi sizga muntazir!!!</p>
                    <a class=\"button\" href=\"../../admins/\">Ma'lumotlarni Ko'rish <i class=\"fa fa-eye in-button\" aria-hidden=\"true\"></i></a>
                    
                    ";
                break;
            }else{
                $count+=1;
            }
        } 
        
        $count=0;
        
        //Agar Userlar ichida bulsa yoki bulmasa
        $result_online_num=mysqli_num_rows(mysqli_query($conn,"SELECT isOnline FROM `forma`;"));
        
        foreach($arr_user_list as $key=>$value){
            if($key==$login && $value==$code && !$isUserOrAdmin && $kirish_arr[$count] && ($isOnline!=1 || $result_online_num==1)){
            
                $isUserOrAdmin=True;

                //User ma'lumotlari
                $result_user=mysqli_query($conn,"SELECT user_id, Ism,Familiya,Sinf,ochko FROM forma WHERE Login=\"$login\";");
                for($data_user=[]; $row_user=mysqli_fetch_assoc($result_user);$data_user[]=$row_user);
                
                $user_id=$data_user[0]["user_id"];
                $user_sinf=strtoupper($data_user[0]["Sinf"]);
                $user_ism=$data_user[0]["Ism"];
                $user_familiya=$data_user[0]["Familiya"];
                $user_ochko=$data_user[0]["ochko"];

                
                $_SESSION['user_id']=$user_id;
                $_SESSION['sinf']=$user_sinf;
                $_SESSION['ism']=$user_ism;
                $_SESSION['familiya']=$user_familiya;
                $_SESSION['ochko']=$user_ochko;
                $_SESSION['login']=$login;
                $_SESSION['code']=$code;
                
                $_SESSION['isMehmon']=false;
                
                echo "
                    <div id=\"user-alert\">
                    <p>Assalomu alaykum $user_ism, Kabinetingizga kirib yangiliklardan xabardor bo'lishingiz mumkin!</p>
                    <a class=\"button\" href=\"../../users/\">Yangiliklarni Ko'rish <i class=\"fa fa-eye in-button\" aria-hidden=\"true\"></i></a>
                    ";

                
            echo $user_interface;
                break;
            }else{
                $count+=1;
            }
            
            
            
            
        }

        // Agar User ham bulmasa
        if(!$isUserOrAdmin){
            $isUserOrAdmin=True;
            
            echo "
            <div id=\"none-alert\">
                <p>Kechirasiz, siz bergan ma'lumot bizda topilmadi <i id=\"xafa\" class=\"fa fa-frown-o\" aria-hidden=\"true\"></i>, Agar ma'lumotlaringiz to'g'riligiga ishonchingiz komil bo'lsa admin tasdiqlashini kuting, agar parol esingizdan chiqqan bo'lsa adminga murojaat qiling! umuman ro'yxatdan o'tmagan bo'lsangiz pastdagi tugmani bosing</p>
                <a class=\"button\" href=\"../../\">Ro'yxatdan O'tish <i class=\"fa fa-refresh in-button\" aria-hidden=\"true\"></i></a>
                <a onclick=\"mehmon('./mehmon.php','../../users/');\" class=\"button\">Mehmon bo'lib Kirish <i class=\"fa fa fa-suitcase in-button\" aria-hidden=\"true\"></i></a>
                
                    ";
            }
        
    } else{
        echo "Bazani ulashda xatolik";
    }

    
            
            
            echo "
            <i class=\"fa fa-android\" aria-hidden=\"true\"></i>
            <i class=\"fa fa-apple\" aria-hidden=\"true\"></i>
            <i class=\"fa fa-windows\" aria-hidden=\"true\"></i>
            <i class=\"fa fa-linux\" aria-hidden=\"true\"></i>
        </div>
        </body>
        <script src=\"../script/app.js\"></script>
        </html>";
?>