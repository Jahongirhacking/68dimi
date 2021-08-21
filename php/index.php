<?php

    echo "<!DOCTYPE html>
    <html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Ma'lumot kiritish</title>
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
        <link rel=\"stylesheet\" href=\"../style/style_reg.css\">
        <link rel=\"icon\" href=\"https://www.onlygfx.com/wp-content/uploads/2020/07/blank-post-it-note-1.png\">
    </head>
    <body>
    <nav>
        <span id=\"level\">
        <span>1-Bosqich</span>
        <progress max=\"3\" value=\"1\"></progress>
        </span>
    </nav>
    ";
        
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $date = $_POST["date"];
    //$phone = $_POST["phone"];
    $school = $_POST["school"];
    $class = $_POST["class"];
    $login = strtolower($_POST["login"]);
    $code = $_POST["code"];


    $dbServerName="fdb30.awardspace.net";
    $dbUserName="3717817_jahongirhacking";
    $dbPassword="Jahongir18052004";
    $dbName="3717817_jahongirhacking";
    
    $conn=new mysqli($dbServerName,$dbUserName,$dbPassword,$dbName) or die("Ulanib bo'lmadi!");
    if($conn){
        $sql="INSERT INTO forma(Ism, Familiya, Tugilgan_sana, Maktab, Sinf, Login, Parol) VALUES (\"$firstname\",\"$lastname\",\"$date\",\"$school\",\"$class\",\"$login\",\"$code\");";
        
        $sql_login="SELECT * FROM forma;";
        $result_login=mysqli_query($conn, $sql_login);
        
        $resultCheck_login=mysqli_num_rows($result_login);
            if($resultCheck_login>0){
                while($row_login=mysqli_fetch_assoc($result_login)){
                    $logins_list[]=$row_login["Login"];
                }
            }
            

        //Tekshirish

        if(in_array($login,$logins_list)){
            echo "
            <div id=\"warning-alert\">
            <p>Bu kalit so'z ( $login ) oldin ro'yxatdan o'tgan agar admin siz rostan ham shu maktabda o'qishingizni tasdiqlagan bo'lsa unda kabenitingizga o'tishingiz mumkin!</p>
            <a href=\"../sign_in/\" class=\"button\" id=\"button\">Kabinetga O'tish <i class=\"fa fa-user-circle-o in-button\" aria-hidden=\"true\"></i></a>
            ";
        }

        elseif ($conn->query($sql) === TRUE) {
            echo "<div id=\"succes-alert\"><p>Sizning ma'lumotingiz muvaffaqiyatli yuborildi, Ma'lumotingiz admin tomonidan tasdiqlangandan so'ng kabinetingizga o'tishingiz mumkin!<br>
                <b>Eslab qoling va pastdagi tugmachani bosing! &#128071;</b></p>
                <table border=\"1px\" cellpadding=\"7px\" cellspacing=\"0\">
                <tr><th>Kalit so'z</th><th>Parolingiz</th></tr>
                <tr><td>$login</td><td id=\"code\" onclick=\"copyElem('copy');\">$code</td></tr>
                </table>
                <a href=\"http://68dimi.atwebpages.com/sign_in/\" onmouseover='myFunction()'  class=\"button\" id=\"button\">Xabardor qilish <i class=\"fa fa-user-circle-o in-button\" aria-hidden=\"true\"></i></a>
                <input type=\"text\" readonly value=\"$code\" id=\"copy\">
                ";
                
                
                
            $myObj=[];
            $myObj[] = "1";
            $myObj[] = $firstname;
            $myObj[] = $lastname;
            $myObj[] = $date;
            //$myObj[] = $phone;
            $myObj[] = $school;
            $myObj[] = $class;
            $myObj[] = $login;

            $myJSON = json_encode($myObj);

            $fp = fopen('data.json', 'w');
            fwrite($fp, json_encode($myJSON));
            fclose($fp);
               

            


        } else {
            echo "
            <div id=\"red-alert\">
            <p>Xatolik: Siz mumkin bo'lmagan belgilardan foydalangan bo'lishingiz mumkin.<br>
            <b>Masalan: #, $, &, \", ~ ... </b><br>
            Iltimos, Qayta ro'yxatdan o'tyotganingizda iloji boricha bunday belgilardan foydalanmang!</p>
            <a href=\"https://botga.netlify.app/\"  class=\"button\" id=\"button\">Xabardor qilish <i class=\"fa fa-refresh in-button\" aria-hidden=\"true\"></i></a>
            ";
            
            

            $myObj=[];
            $myObj[] = "0";
            $myObj[] = $firstname;
            $myObj[] = $lastname;
            $myObj[] = $date;
            //$myObj[] = $phone;
            $myObj[] = $school;
            $myObj[] = $class;
            $myObj[] = $login;

            $myJSON = json_encode($myObj);

            $fp = fopen('data.json', 'w');
            fwrite($fp, json_encode($myJSON));
            fclose($fp);
            
            
            
            
        }
        
        
    }

    echo "
    <i class=\"fa fa-id-card\" aria-hidden=\"true\"></i>
    </div>
    <script src=\"../script/copy.js\"></script>
    <script>
    function myFunction() {
        }
    </script>
    
    </body></html>"
?>