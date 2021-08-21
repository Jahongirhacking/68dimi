<?php
    session_start();
    
    
    
    $dbServerName="fdb30.awardspace.net";
    $dbUserName="3717817_jahongirhacking";
    $dbPassword="Jahongir18052004";
    $dbName="3717817_jahongirhacking";
    
    
    //Sessiyalardan ma'lumot olish
    $user_ism=$_SESSION['ism'];
    $user_familiya=$_SESSION['familiya'];
    $login=$_SESSION['login'];
    $code=$_SESSION['code'];
    
    
    $conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
    
    $result_set=mysqli_query($conn,"SELECT * FROM forma WHERE (Login='$login') AND (Parol='$code') AND (isTest=1) AND (isKirish=1);");
    $resultCheck=mysqli_num_rows($result_set);
    
    
    
    

?>        
     

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
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

     
     
<?php    
    
    if($resultCheck==1){
        //Test yechish
        
        if($login!="jahongir001" || $code!="Jahon18052004"){
        $result_testKirma=mysqli_query($conn,"UPDATE `forma` SET `isTest`=0  WHERE (Login = \"$login\") AND (Parol=\"$code\");");
        };
        $result_online=mysqli_query($conn,"UPDATE `forma` SET `isOnline`=1  WHERE (Login = \"$login\") AND (Parol=\"$code\");");
        
        $result_test=mysqli_query($conn,"SELECT savol,javob_a,javob_b,javob_c,javob_d,correct_num FROM test;");
        for($test_array=[]; $row=mysqli_fetch_assoc($result_test); $test_array[]=$row);
        
        echo "<nav><div><i class=\"fa fa-graduation-cap\" aria-hidden=\"true\"></i>68-DIMI</div
        <div>Test ishlashingiz mumkin, <span id=\"ism\">$user_ism!</span></div></nav>
        <div class=\"container\"> 
        
        <div id=\"left-time\">30 : 00</div>
        ";
        
        $sana=0;
        $correct_str="";
        
        for($i=0; $i<mysqli_num_rows($result_test);$i++){
        
        $correct_str.=$test_array[$i]["correct_num"].", ";
        
        
        
        $test_view.="
        
        <div class=\"card\" id=\"c".($i+1)."\">
            <div class=\"card-nav\"><span class=\"gold\">"
                .($i+1)."</span> / 20 - Savol
            </div>
            <div class=\"card-test\">
                <p>".$test_array[$i]["savol"]."</p>
                <div>
                    <input type=\"checkbox\" class=\"check\" name=\"A\" value=\"A\" onclick=\"check(".$sana.");\">
                    <label for=\"A\">".$test_array[$i]["javob_a"]."</label>
                </div>
                <div>
                    <input type=\"checkbox\" class=\"check\" name=\"B\" value=\"B\" onclick=\"check(".($sana+1).");\">
                    <label for=\"B\">".$test_array[$i]["javob_b"]."</label>
                </div>
                <div>
                    <input type=\"checkbox\" class=\"check\" name=\"C\" value=\"C\" onclick=\"check(".($sana+2).");\">
                    <label for=\"C\">".$test_array[$i]["javob_c"]."</label>
                </div>
                <div>
                    <input type=\"checkbox\" class=\"check\" name=\"D\" value=\"D\" onclick=\"check(".($sana+3).");\">
                    <label for=\"D\">".$test_array[$i]["javob_d"]."</label>
                </div>
            </div>
        </div>
        
        
        ";
        
        $sana+=4;
        
        
        }
        
        
        echo $test_view;
        
        
        echo "
        <form id=\"form\">
            <input id=\"correct\" type=\"text\" value=\"".$correct_str."\">
        
        </form>
        
        
        <!--Button-->
        
        <span id=\"test-button-container\"><button id=\"answer\" onclick=\"answer();\">Tekshirish</button></span>
        
        
        
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
        ";
        
        
        
        
        
        
        
        
    }else{
        //To'g'rima to'g'ri kirish xatolik
        echo "<div class=\"wrong-container\">
                <i class=\"fa fa-recycle\" aria-hidden=\"true\"></i>
                <p>Siz oldinroq testda qatnashdingiz yoki ma'lumotingiz topilmadi!</p>
                <a href=\"../users/\">Kabinetga O'tish</a>
             </div>";
    }
    

?>




        
    </div>

<script src="./script/app.js"></script>

<script>
// Store
//sessionStorage.setItem("lastname", "Smith");
// Retrieve
//document.write(sessionStorage.getItem("lastname"));
</script>
</body>
</html>



