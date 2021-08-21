<?php

session_start();
    
    
    $dbServerName="fdb29.awardspace.net";
    $dbUserName="3753470_telegram";
    $dbPassword="Jahongir18052004";
    $dbName="3753470_telegram";
    
    
    
    //User jo'natgan xabar
    $lengthMessage=$_POST["lengthMessage"];
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
    
      //Xabarlarni yozish kodi
            //tableName
            $users_messages=mysqli_query($conn,"SELECT * FROM `$tableName` ORDER BY `right_time` ASC;");
            $new_legthMessage=mysqli_num_rows($users_messages);
    
    if($lengthMessage != $new_legthMessage){
    
            //O'qilgan qilish
            mysqli_query($conn,"UPDATE `$tableName` SET isSeen=1 WHERE user_id='$another_user_id';");
                  
            //Har bir Xabar uchun ID
            $messageId=1;
            $data="";
              
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
                
                $data .= "
                <div class=\"messages $whoseMessage-message\" id=\"$messageId\">
                    <p>$message_text</p>
                    <div class=\"chat-data\">
                        <span class=\"message-time\">$message_time</span>"; //Vaqtgacha qo'ydik
                        
                        //Ko'rdi yoki ko'rmadi
                        if($message_user_id==$user_id and $message_isSeen==0){
                            $data .= "<i class='fa fa-eye-slash'></i>";
                        }elseif($message_user_id==$user_id and $message_isSeen==1){
                            $data .= "<i class='fa fa-eye'></i>";
                        }
                    
                    
                    $data .= "
                    </div>
                </div>";
                //Xabarlar
                $messageId++;
            };
    
    
    
    
        echo $data;
        //JavaScriptga xabarlarni yuborish
    }else{
        echo 0;
    }

?>